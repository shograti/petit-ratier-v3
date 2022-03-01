<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegisterationController extends AbstractController

{
    public function __construct(EntityManagerInterface $manager, VerifyEmailHelperInterface $helper, MailerInterface $mailer, UserRepository $userRepository){
        $this->manager = $manager;
        $this->verifyEmailHelper = $helper;
        $this->mailer = $mailer;
        $this->userRepository = $userRepository;
    }

    #[Route('api/register', name: 'register')]
    public function register(Request $request,UserPasswordHasherInterface $passwordHasher): Response
    {
        $content = json_decode($request->getContent());
        $user= new User();
        $user->setPseudoUser($content->pseudo);
        $user->setEmailUser($content->email);
        $user->setNameUser($content->lastName);
        $user->setFirstnameUser($content->firstName);
        $user->setBirthDateUser(new DateTime($content->birthdate));
        $user->setUrlImgUser($content->profilePic);

       
        $hashedpassword = $passwordHasher->hashPassword($user, $content->password);
        $user->setPasswordUser($hashedpassword);
        

        $user->setRegisterDateUser(new DateTime());
        $user->setDistanceUser(0);
        $user->setPosxUser(0);
        $user->setPosyUser(0);
        $user->setRatingUser(0);
        $user->setRoleUser("ROLE_USER");
        $this->manager->persist($user);

        if ($this->userRepository->findOneBy(array('emailUser' => $user->getEmailUser())) == null) {
            $this->manager->flush();
            $signatureComponents = $this->verifyEmailHelper->generateSignature(
                'registration_confirmation_route',
                $user->getEmailUser(),
                (string)$user->getIdUser(),
                ['id' => $user->getIdUser()]
            );
            $email = new TemplatedEmail();
            $email->from('send@example.com');
            $email->to($user->getEmailUser());
            $email->htmlTemplate('register/index.html.twig');
            $email->context(['signedUrl' => $signatureComponents->getSignedUrl()]);
            $this->mailer->send($email);
        } else {
            $this->addflash("error", "The Email allready exist");
            throw $this->createNotFoundException('The Email allready exists');
        }
    
        $response = new Response(
            'response',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
            
        );
        return $response;
        
    }



#[Route('/verifier', name: 'registration_confirmation_route')]
public function verifyUserEmail(Request $request): Response
{
    $id = $request->get('id');
    // Verify the user id exists and is not null
    if (null === $id) {
        // User do not exist

        return $this->redirectToRoute('index');
    }
    $user = $this->userRepository->find($id);
    // Ensure the user exists in persistence
    if (null === $user) {
        return $this->redirectToRoute('index');
    }
    try {
        $this->verifyEmailHelper->validateEmailConfirmation($request->getUri(), $user->getIdUser(), $user->getEmailUser());
    } catch (VerifyEmailExceptionInterface $e) {
        $this->addFlash('verify_email_error', $e->getReason());
    }
    $user->setRoleUser("ROLE_AUTHORIZED_USER");
    $this->addFlash('success', 'Your e-mail address has been verified.');
    $this->manager->persist($user);
    $this->manager->flush();
    return $this->redirectToRoute('index');
}










    /*     $this->manager->flush();
        $response = new Response(
            'response',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
            
        );
        return $response;
        
    } */
}
