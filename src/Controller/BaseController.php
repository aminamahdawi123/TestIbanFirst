<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;

class BaseController extends AbstractFOSRestController{

    /**
     * function to get entity manager
     *
     * @return void
     */
    public function getEntityManager(){
        return $this->getDoctrine()->getManager();
    }


    /**
     * function to return data to front end
     * 
     * @param $data
     * @param int $statusCode
     * @param string $msg
     *
     * @return array
     */
    protected function returnApiResponse($data, $statusCode , $msg = "ok")
    {
        $response = array(
            'code' => $statusCode,
            'message' => $msg,
            'data' => $data,
        );
        return ($response);
    }

}