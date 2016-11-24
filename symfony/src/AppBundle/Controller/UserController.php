<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\User;


class UserController extends Controller{
    
    public function newAction(Request $request){
        $helpers = $this->get("app.helpers");
        
        $json = $request->get("json",null);
        $params=json_decode($json);
        $data = array();
        
        if($json != null){
            $createdAT = new \Datetime("now");
            $image = null;
            $role = "user";
            
            $email = (isset($params->email)) ? $params->email : null;
            $name = (isset($params->name) && ctype_alpha($params->name)) ? $params->name : null;
            $surname = (isset($params->surname) && ctype_alpha($params->surname)) ? $params->surname : null;
            $password = (isset($params->password)) ? $params->password : null;
            
            $emailConstraint= new Assert\Email();
            $emailConstraint->message = "El email no es valido";
            
            $validate_email = $this->get("validator")->validate($email, $emailConstraint);
            
            if($email!=null && count($validate_email) ==0 && $password != null && $name != null && $surname != null){
                
                $user = new User();
                
                $user->setCreatedAt($createdAT);
                $user->setEmail($email);
                $user->setImage($image);
                $user->setRole($role);
                $user->setName($name);
                $user->setSurname($surname);
                
                //Cifrar la password
                $pwd= hash('SHA256',$password);
                
                $user->setPassword($pwd);
                
                $em=$this->getDoctrine()->getManager();
                $isset_user=$em->getRepository("BackendBundle:User")->findBy(
                    array(
                        "email"=>$email 
                        ));
                        
                //Si no existe ningun usuario en la BBDD con ese email, persiste el objeto (lo guarda)
                //Con flush, se mete el registro a la BBDD
                        
                    if(count($isset_user) == 0){
                        $em->persist($user);
                        $em->flush();
                        
                        $data["status"] = 'success';
                        $data["code"] = 200;
                        $data["msg"] = 'New User created!!';
                    }else{
                         $data =array(
                            "status"=>"error",
                            "code"=> 400,
                            "msg"=> "User not created, duplicated"
                        );
                    }
                    
                }else{
                    $data =array(
                        "status"=>"error",
                        "code"=> 400,
                        "msg"=> "User not created, data wrong"
                        );
                }
                    
                

        }else{
            $data =array(
                "status"=>"error",
                "code"=> 400,
                "msg"=> "User not created"
                );
        }
        
        return $helpers->json($data);
        
   }
   
   
   
   
   public function editAction(Request $request){
        $helpers = $this->get("app.helpers");
        
        $hash = $request ->get("authorization", null);
        
        $authCheck = $helpers->authCheck($hash);
        
        if($authCheck == true){
            
            $identity = $helpers -> authCheck($hash, true);
            
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository("BackendBundle:User")->findOneBy(
                array(
                    "id" => $identity->sub 
                    )
                );
            
        $json = $request->get("json",null);
        $params=json_decode($json);
        $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "User not created"
            );
        
        if($json != null){
            $createdAT = new \Datetime("now");
            $image = null;
            $role = "user";
            
            $email = (isset($params->email)) ? $params->email : null;
            $name = (isset($params->name) && ctype_alpha($params->name)) ? $params->name : null;
            $surname = (isset($params->surname) && ctype_alpha($params->surname)) ? $params->surname : null;
            $password = (isset($params->password)) ? $params->password : null;
            
            $emailConstraint= new Assert\Email();
            $emailConstraint->message = "El email no es valido";
            
            $validate_email = $this->get("validator")->validate($email, $emailConstraint);
            
            if($email!=null && count($validate_email) ==0 && $name != null && $surname != null){
                
                
                $user->setCreatedAt($createdAT);
                $user->setEmail($email);
                $user->setImage($image);
                $user->setRole($role);
                $user->setName($name);
                $user->setSurname($surname);
                
                if($password != null){
                    //Cifrar la password
                    $pwd= hash('SHA256',$password);
                    $user->setPassword($pwd);
                 }
                 
                $em=$this->getDoctrine()->getManager();
                $isset_user=$em->getRepository("BackendBundle:User")->findBy(
                    array(
                        "email"=>$email 
                        ));
                        
                //Si no existe ningun usuario en la BBDD con ese email, persiste el objeto (lo guarda)
                //Con flush, se mete el registro a la BBDD
                        
                    if(count($isset_user) == 0 || $identity->email == $email){
                        $em->persist($user);
                        $em->flush();
                        
                        $data["status"] = 'success';
                        $data["code"] = 200;
                        $data["msg"] = 'User updated!!';
                    }else{
                         $data =array(
                            "status"=>"error",
                            "code"=> 400,
                            "msg"=> "User not updated, duplicated"
                        );
                    }
                    
                }
            }else{
                $data = array (
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Authorization not valid"
                    );
            }

        }
        
        return $helpers->json($data);
        
   }
    
    
    public function uploadImageAction(Request $request){
        
        $helpers = $this->get("app.helpers");
        
        $hash = $request->get("authorization", null);
        $authCheck = $helpers->authCheck($hash);
        
        if($authCheck){
            $identity = $helpers->authCheck($hash, true);
            
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository("BackendBundle:User")->findOneBy(
                array(
                    "id"=>$identity->sub
                    ));
                    
                    //upload file
            $file= $request->files->get("image");
            
            if(!empty($file) && $file != null){
                $ext = $file->guessExtension();
                
                if($ext == "jpeg" || $ext == "jpg" || $ext == "png" || $ext == "gif"){
                
                $file_name = time().".".$ext;
                $file->move("uploads/users",$file_name);
                
                $user->setImage($file_name);
                $em->persist($user);
                $em->flush();
                
                $data = array(
                    "status"=>"success",
                    "code"=>200,
                    "msg"=>"Image for user upload success!"
                    );
                    
            }else{
                 $data = array(
                    "status"=>"error",
                    "code"=>400,
                    "msg"=>"File not valid"
                    );
                    
                }        
        }else{
                $data = array(
                    "status"=>"error",
                    "code"=>400,
                    "msg"=>"Image not uploaded"
                    );
        }
           
        }else{
             $data = array(
                "status"=>"error",
                "code"=>400,
                "msg"=>"Authorization not valid"
                );
            
        }
        
        return $helpers->json($data);
        
    }
    
    
}
