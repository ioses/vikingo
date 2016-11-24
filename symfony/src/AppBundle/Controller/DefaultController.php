<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
     public function loginAction(Request $request){
          //Se busca cualquier servicio que exista (esta definido en services.yml (app/config)
        $helpers = $this->get("app.helpers");
        $jwt_auth = $this->get("app.jwt_auth");
        
        //Recibir json por POST
        //Recoge el parametro json que llega por POST y decodificarla
        
        $json=$request->get("json", null);
        
        if($json!= null){
            $params=json_decode($json);
           
            $email = (isset($params->email)) ? $params->email : null;
            $password = (isset($params->password)) ? $params->password : null;
            $getHash = (isset($params->getHash)) ? $params->getHash : null;

            
            $emailConstraint= new Assert\Email();
            $emailConstraint->message = "El email no es valido";
            
            $validate_email = $this->get("validator")->validate($email, $emailConstraint);
            
            //Cifrar password
            $pwd = hash('SHA256',$password);
            
            if (count($validate_email)== 0 && $password != null){
                
                if($getHash == null){
                    $signup = $jwt_auth->signup($email, $pwd);

                }else{
                    $signup = $jwt_auth->signup($email, $pwd, true);
                    
                }
                return new JsonResponse($signup);
            }else{
                return $helpers->json(array(
                    "status"=>"error",
                    "data"=>"login not valid"
                    ));
            }
            
        }else{
            return $helpers->json(array(
                    "status"=>"error",
                    "data"=>"Send json with Post"
                    ));
        }
        die();
    }

    

    public function pruebasAction(Request $request)
    {
        //Se busca cualquier servicio que exista (esta definido en services.yml (app/config)
        $helpers = $this->get("app.helpers");
       // $jwt_auth = $this->get("app.jwt_auth");
        /*
        $em=$this->getDoctrine()->getManager();
        $users= $em->getRepository('BackendBundle:User')->findAll();
        */
        
        $hash = $request->get("authorization", null);
        
        $check = $helpers->authCheck($hash, true);
        
        var_dump($check);
        die(); 
        
       /*
        var_dump($users);
        die();
        */
        //Respuesta en json con la funcion creada
        //$helpers es la variable creada para el servicio
       // $helpers -> hola();
        
        return $helpers->json($users);
    }
    

    
}
