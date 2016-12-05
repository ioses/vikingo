<?php

namespace AppBundle\Services;

use Firebase\JWT\JWT;

class JwtAuth {
    
    public $manager;
    public $key;
    
    public function __construct($manager){
        $this->manager=$manager;
        $this->key ="clave-secreta";
    }
    
    public function signup($email, $password, $getHash = NULL){
        $key="clave-secreta";
        
        //SELECT * FROM users WHERE email = $email AND password = $password
        
        $user = $this->manager->getRepository('BackendBundle:User')->findOneBy(
            array(
                "email"=>$email,
                "password"=>$password
                )
            );
            
        $signup=false;    
        if(is_object($user)){
           
            
            $signup= true;
        }    
        
        if($signup == true){
            
             $token=array(
                "sub"=>$user->getId(),
                "email"=>$user->getEmail(),
                "name"=>$user->getName(),
                "surname"=>$user->getSurname(),
                "password"=>$user->getPassword(),
                "image"=>$user->getImage(),
                "iat"=>time(),
                "exp"=>time() + (7*24*60*60)
                );
                
                $jwt= JWT::encode($token,$key,'HS256');
                $decode=JWT::decode($jwt,$key,array('HS256'));
                
                if($getHash!= NULL){
                    return $jwt;
                }else{
                    return $decode;
                } 
        }else{
            return array("status"=>"error", "data"=>"Login failed !!");
        }
    }
    
    
    public function checkToken($jwt, $getIdentity = false){
        $key="clave-secreta";
        $auth = false;
        

        
        try{
            $decode=JWT::decode($jwt,$key,array('HS256'));
        }catch(\UnexpectedValueException $e){
            $auth = false;
        }catch(\DomainException $e){
            $auth = false;
        }
        //sub es el id de usuario. Se podria comprobar cualquier otro campo
        if(isset($decode->sub)){
            $auth = true;
        }else{
            $auth = false;
        }
        
        if($getIdentity == true){
            return $decode; 
        }else{
            return $auth;
        }
        
        
    }
    
}