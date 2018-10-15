<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;



class userAuth {
    private $user = array(
        "id" => 768,
        "email" => "example@gmail.com",
        "password" => "amw@12345"
      );
    private $id;
    private $key = "secretSignKey";


    private function validUser($email, $password) {
        if ($email == $this->user['email'] && $password == $this->user['password']) {
          $this->id = $this->user['id'];
          $this->email = $this->user['email'];
          return true;
        } else {
          return false;
        }
    }
    private function genJWT() {
        $payload = array(
          "id" => $this->id,
          "email" => $this->email,
          "exp" => time() + (1800)
        );
        return JWT::encode($payload, $this->key);
    }

    public function mailUser($email, $password) {
       
        if ($this->validUser($email, $password)) {
          $token = $this->genJWT();
          echo $message = 'http://localhost/php-jwt-example/index.php?token='.$token;   
      }
    }

    private function validJWT($token) {
        $res = array(false, '');
        
        try {
        
          $decoded = JWT::decode($token, $this->key, array('HS256'));
        } catch (Exception $e) {
          return $res;
        }
        $res['0'] = true;
        $res['1'] = (array) $decoded;
     
        return $res;
      }
     
     
      public function validMail($token) {
        $tokenVal = $this->validJWT($token);
        if ($tokenVal['0']) {
          return "Everything went well, time to serve you what you need.";
        } else {
          return "There was an error validating your email. Send another link";
        }
      }

}



?>