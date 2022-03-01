<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LogOutController extends AbstractController {

    #[Route('/logout', name: 'app_logout' )]

        public function logout(): void
        {
            throw new \Exception('Don\'t forget to activate logout in security.yaml');
            
        }
        
}