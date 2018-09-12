<?php

namespace PPP\CanBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PPP\CanBundle\Entity\Checklist;
use PPP\CanBundle\Form\ChecklistType;


class ChecklistcooController extends Controller
{

//Pagina index donde se listan los registros
    public function indexcooAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$dql = "SELECT u FROM PPPCanBundle:Radicado u ORDER BY u.id DESC";
        $dql = "SELECT r.id, r.archivo1, m.nombresm, p.nombres, r.createdAtradi, r.updatedAtradi,
                       r.estado

            FROM PPPCanBundle:Radicado r

            JOIN r.mascota m
            JOIN m.usuario p

            WHERE r.estado = 'Radicado'
        ";


        $radicados = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $radicados,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('PPPCanBundle:Checklist:indexcoo.html.twig', array('pagination' => $pagination));
    }


  
private function createCreateForm(Checklist $entity)
	{
		$form = $this->createForm(new ChecklistType(), $entity, array(
			'action' => $this->generateUrl('ppp_checklistcoo_createcoo'),
			'method' => 'POST'
			));
		return $form;
	}

    public function createcooAction(Request $request)
    {
        $checklist = new Checklist();
        $form = $this->createCreateForm($checklist);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
         {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($checklist);
            $em->flush();

            $this->addFlash('mensaje', 'Registro enviado correctamente');
            return $this->redirectToRoute('ppp_checklistcoo_indexcoo');
         }

        return $this->render('PPPCanBundle:Checklist:addcoo.html.twig', array(
            'form' => $form
            ->createView()
            ));
    
    }

    public function addcooAction($id)
    {

		$checklist = new Checklist();
		$form = $this->createCreateForm($checklist);

			$radicado = $this->getDoctrine()
            ->getRepository('PPPCanBundle:radicado')
            ->find($id);

		$mascota = $radicado->getMascota();
        $usuario = $mascota->getUsuario();


        if (!$radicado) {
            throw $this->createNotFoundException('Registro no encontrado.');
        }

        return $this->render('PPPCanBundle:Checklist:addcoo.html.twig', array(
            'radicado' => $radicado,
            'mascota' => $mascota,
            'usuario' => $usuario,
            'form' => $form
            ->createView()
            ));
    }


}