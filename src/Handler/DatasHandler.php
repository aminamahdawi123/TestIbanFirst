<?php

namespace App\Handler;

class DatasHandler
{
    /**
     * function to get list all walls
     *
     * @param string $method
     * @param array $postParams
     * @param string $url
     * @param string $header
     * @return array
     */
    public function getAllWalls($method, $postParams, $url, $header){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $this->typeMethod($method, $ch, $postParams);
        curl_setopt($ch, CURLOPT_URL, $url."/wallets/"); 
        curl_setopt($ch,CURLOPT_HTTPHEADER, array($header,'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        $time_start = microtime(true);
        $res = curl_exec($ch);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        curl_close($ch);
        

        return [
            'datas' => $res
        ];

    }

    /**
     * function to return type method of request
     *
     * @param string $method
     * @param string $ch
     * @param string $postParams
     * @return void
     */
    private function typeMethod($method, $ch, $postParams){
        switch($method){
            case 'GET':
                return curl_setopt($ch, CURLOPT_HTTPGET, 1);
            break;
            case 'POST':
                return curl_setopt($ch, CURLOPT_POST, 1); curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
            break;
            case 'DELETE': 
                return curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
            case 'PUT': 
                return curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        }
    }
}