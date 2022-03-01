<?php

namespace App\Controller;


use App\Repository\ShopRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/shops', name: 'shops')]
class ShopController extends AbstractController
{

    public function __construct(ShopRepository $shop_repo, SerializerInterface $serializer){
        $this->shop_repo = $shop_repo;
        $this->serializer = $serializer;

    }


    #[Route('/get', name: 'get-shops')]
    public function getOffers(Request $request): Response
    {
        $shops = $this->shop_repo->findOneLike($request->query->get('q'));
        $json = $this->serializer->serialize($shops,'json');
        $response = new JsonResponse($json,200,[],true);
       
        return $response;
            
    }
}