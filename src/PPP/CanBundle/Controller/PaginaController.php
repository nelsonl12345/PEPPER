<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaginaController extends Controller
{
    public function indexAction()
    {
        return $this->render('PPPCanBundle:Pagina:index.html.twig');
    }

    public function secretariaAction()
    {
        return $this->render('PPPCanBundle:Pagina:secretaria.html.twig');
    }

    
	public function perrosAction()
    {
        return $this->render('PPPCanBundle:Pagina:perros.html.twig');
    }
public function leyAction()
    {
        return $this->render('PPPCanBundle:Pagina:ley.html.twig');
    }
}
