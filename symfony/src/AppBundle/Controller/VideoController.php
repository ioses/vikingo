<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\Video;
use BackendBundle\Entity\User;


class VideoController extends Controller{
    
    public function pruebasAction(){
        echo "Hola controlador video";
        die();
    }
    
    
}