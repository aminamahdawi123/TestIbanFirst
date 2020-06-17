<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Handler\AuthentificationApiHandler;
use App\Handler\DatasHandler;

/**
 * class WalletController
 * 
 * @Route("/api/wallet")
 */
class WalletController extends BaseController {

    /**
     *
     * @var AuthentificationApiHandler
     */
    private $authentificationApi;

    /**
     *
     * @var DatasHandler
     */
    private $dataHandler;

   public function __construct(AuthentificationApiHandler $authentificationApi, DatasHandler $dataHandler)
   {
       $this->authentificationApi = $authentificationApi;
       $this->dataHandler = $dataHandler;
   }

    /**
     * function to get all wallets
     * 
     * @Rest\Get(
     *     path = "/",
     *     name = "app.wallet.all"
     * )
     *
     * @return void
     */
    public function all(){

        $nonce="oooooooooooooooooo";
        $nonce64="";
        $date="";
        $digest="";
        $header ="";
        $postParams = [];
        $method 	= "GET";
        $header = $this->authentificationApi->authentificate($nonce, $this->getParameter('username'), $this->getParameter('password'))['header'];
        $datas = $this->dataHandler->getAllWalls($method, $postParams, $this->getParameter('url'), $header)['datas'];

        return new JsonResponse(explode("\r\n\r\n",$datas)[1], 200);
    }

}