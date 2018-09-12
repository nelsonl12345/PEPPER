<?php
namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class IngresoController extends Controller
{
	    public function loginAction()
	    {
        return $this->render('PPPCanBundle:Security:login.html.twig');
    	}

}