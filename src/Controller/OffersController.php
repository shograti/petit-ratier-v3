<?php

namespace App\Controller;

use DateTime;
use App\Entity\Offer;
use Cocur\Slugify\Slugify;
use App\Repository\ShopRepository;
use App\Repository\UserRepository;
use App\Repository\OfferRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/api/offers', name: 'offers')]
class OffersController extends AbstractController
{
    public function __construct(
        OfferRepository $offer_repo,
        CategoryRepository $category_repo,
        UserRepository $user_repo,
        SerializerInterface $serializer,
        EntityManagerInterface $manager,
        ShopRepository $shop_repo
          ){

        $this->manager = $manager;
        $this->shop_repo = $shop_repo;
        $this->category_repo = $category_repo;
        $this->user_repo = $user_repo;
        $this->offer_repo = $offer_repo;
        $this->serializer = $serializer;
    }

    #[Route('/get', name: 'get-offers')]
    public function getOffers(): Response
    {
        $offers = $this->offer_repo->findAll();
        $json = $this->serializer->serialize($offers,'json',['groups'=>'offer:read']);
        $response = new JsonResponse($json,200,[],true);
       
        return $response;
            
    }

    #[Route('/set', name: 'set-offers')]
    public function setOffers(Request $request/* , UserInterface $user */): Response
    {   
        $content = json_decode($request->getContent());

        $slugify = new Slugify();
        $newOffer = new Offer();

        $newOffer->setNameOffer($content->name);
        $newOffer->setPictureOffer($content->picture);
        $newOffer->setDescriptionOffer($content->description);
        $newOffer->setQuantityOffer($content->quantity);
        $newOffer->setSlugOffer($slugify->slugify($newOffer->getNameOffer()));
        $newOffer->setStartOffer(new DateTime($content->startOffer));
        $newOffer->setEndOffer(new DateTime($content->endOffer));
        $newOffer->setInitialPrice($content->initialPrice);
        $newOffer->setSoldedPrice($content->soldedPrice);
        $newOffer->setPostDate(new DateTime());

        $placeholderCategory = $this->category_repo->find($content->category->idType);
        $placeholderShop = $this->shop_repo->find($content->shop->idShop);

        $newOffer->setIdType($placeholderCategory);
        $newOffer->setIdShop($placeholderShop);

        $placeholderUser = $this->user_repo->find(2);
        $newOffer->setIdUser($placeholderUser);

        $newOffer->setIsvalideOffer(true);
        $this->manager->persist($newOffer);
        $this->manager->flush();

        
        
        $response = new Response(
            'response',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
            
        );
        return $response;
        
    }
}