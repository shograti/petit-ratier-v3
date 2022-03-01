<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/categories', name: 'categories')]
class CategoryController extends AbstractController
{

    public function __construct(CategoryRepository $category_repo, SerializerInterface $serializer){
        $this->category_repo = $category_repo;
        $this->serializer = $serializer;

    }


    #[Route('/get', name: 'get-categories')]
    public function getOffers(): Response
    {
        $categories = $this->category_repo->findAll();
        $json = $this->serializer->serialize($categories,'json',['groups'=>'offer:read']);
        $response = new JsonResponse($json,200,[],true);
       
        return $response;
            
    }
}
