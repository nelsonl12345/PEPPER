<?php
namespace PPP\CanBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PPP\CanBundle\Entity\Usuario;


class DqlController extends Controller
{


	//SELECT * FROM articles
	//en DQL sería:
	//select a from MDWDemoBundle:Articles a
	public function dqlAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u";
        $usuarios = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $usuarios, $request->query->getInt('page', 1),
            5    
        );
return $this->render('PPPCanBundle:Usuario:dql.html.twig', array('pagination' => $pagination));
    }

	
	//También es posible pedir solo algunos campos y no un SELECT * poniendo los nombres de las propiedades del objeto usando el alias: select a.id, a.title, c.author from MDWDemoBundle:Articles a
	public function dql1Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u.nombres, u.identificacion FROM PPPCanBundle:Usuario u";
        $usuarios = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $usuarios, $request->query->getInt('page', 1),
            5    
        );
return $this->render('PPPCanBundle:Usuario:dql1.html.twig', array('pagination' => $pagination));
    }

	
	public function dql2Action(Request $request)
    {
    	//En caso de necesitar pasar filtros para el WHERE, podemos hacerlo usando el método setParameter() del objeto Doctrine_Query de la siguiente manera:
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u WHERE u.identificacion=:identificacion";
        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter('identificacion', '10459495594');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $usuarios, $request->query->getInt('page', 1),
            5    
        );
return $this->render('PPPCanBundle:Usuario:dql2.html.twig', array('pagination' => $pagination));
    }

	public function dql3Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$dql = "SELECT m FROM PPPCanBundle:Mascota m JOIN m.propietario p WHERE p.id=:id";

        $dql = "SELECT m.id, p.id, m.nombresm, p.apellidos, p.nombres, r.dtalleraza, m.edadm,
        			   m.generom

        		FROM PPPCanBundle:Mascota m  

        		JOIN  m.propietario p
        		JOIN  m.raza r

        		WHERE p.id=:id

        ";

        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter('id', '16');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $usuarios, $request->query->getInt('page', 1),
            5    
        );
return $this->render('PPPCanBundle:Usuario:dql3.html.twig', array('pagination' => $pagination));
    }


}