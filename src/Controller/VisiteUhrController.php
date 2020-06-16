<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * @Route("/amina")
 */
class VisiteUhrController extends BaseController
{



    /**
     * @Route("/hello", name="adresse_uhr")
     */
    public function indexAction()
    {
        $response = new Response(
        'bonjour la vie',
        Response::HTTP_OK,
        ['content-type' => 'text/html']
    );  return $response;

    }


}
