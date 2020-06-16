<?php

namespace App\Handler;

/**
 * class to authentificate to api
 */
class AuthentificationApiHandler
{

    /**
     * function to authentificate to api
     *
     * @param string $nonce
     * @param string $username
     * @param string $password
     * @return array
     */
    public function authentificate($nonce, $username, $password){
        $chars = "1123456789abcdef";
        for ($i = 0; $i < 32; $i++) { $nonce .= $chars[rand(0, 15)]; }
        $nonce64 = base64_encode($nonce) ;
        $date = gmdate('c');
        $date = substr($date,0,19)."Z" ;
        $digest = base64_encode(sha1($nonce.$date.$password, true));
        $header = sprintf('X-WSSE: UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',
        $username, $digest, $nonce64, $date);
        return [
            'header' => $header
        ];
    }
}