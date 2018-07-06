<?php

namespace PPP\CanBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PPP\CanBundle\Entity\Checklist;
use PPP\CanBundle\Form\ChecklistType;

class ChecklistController extends Controller
{

//Pagina index donde se listan los registros	
    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        //$dql = "SELECT u FROM PPPCanBundle:Radicado u ORDER BY u.id DESC";
        $dql = "SELECT r.id, r.archivo1, m.nombresm, p.nombres, r.createdAtradi, r.updatedAtradi, 
                       r.estado

         		FROM PPPCanBundle:Radicado r

         		JOIN r.mascota m
         		JOIN m.usuario p

        ";


        $radicados = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $radicados, $request->query->getInt('page', 1),
            5    
        );
                            
return $this->render('PPPCanBundle:Checklist:index.html.twig', array('pagination' => $pagination));
    }



	/**public function addAction()
	{
		$checklist = new Checklist();
		$form = $this->createCreateForm($checklist);
		return $this->render('PPPCanBundle:Checklist:add.html.twig', array('form' => $form->createView()));
	}
    **/

	private function createCreateForm(Checklist $entity)
	{
		$form = $this->createForm(new ChecklistType(), $entity, array(
			'action' => $this->generateUrl('ppp_checklist_create'),
			'method' => 'POST'
			));
		return $form;
	}

    public function createAction(Request $request)
    {
        $checklist = new checklist();
        $form = $this->createCreateForm($checklist);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
         {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($checklist);
            $em->flush();

            $this->addFlash('mensaje', 'Registro enviado correctamente');
            return $this->redirectToRoute('ppp_checklist_view');
         }

        return $this->render('PPPCanBundle:Checklist:view.html.twig', array('form' => $form->createView()));
    }


public function viewAction($id)
    {


        $radicado = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Radicado')
            ->find($id);
        
        $mascota = $radicado->getMascota();
        $usuario = $mascota->getUsuario();
        
 
        if(!$mascota)
        {
            throw $this->createNotFoundException('Registro no encontrado.');
        }
 
        $checklist = new Checklist();
        $form = $this->createCreateForm($checklist);

        return $this->render('PPPCanBundle:Checklist:view.html.twig', array('radicado' => $radicado, 'mascota' => $mascota, 'usuario' => $usuario, 'form' => $form->createView()));
    }         


}
