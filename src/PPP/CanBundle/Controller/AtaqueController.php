<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;
use PPP\CanBundle\Entity\Ataque;
use PPP\CanBundle\Form\AtaqueType; 


class AtaqueController extends Controller
{

public function addAction()
	{
		$ataque = new Ataque();
		$form = $this->createCreateForm($ataque);
		return $this->render('PPPCanBundle:Ataque:add.html.twig', array('form' => $form->createView()));
	}

	private function createCreateForm(Ataque $entity)
	{
		$form = $this->createForm(new AtaqueType(), $entity, array(
			'action' => $this->generateUrl('ppp_ataque_create'),
			'method' => 'POST'
			));
		return $form;
	}

	public function createAction(Request $request)
	{
		$ataque = new ataque();
		$form = $this->createCreateForm($ataque);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		 {
		    $hclinica = $form->get('hclinica')->getData();
            //start upload file
            $file1 = $ataque->getHclinica();
            $ext1 = $file1->guessExtension();
            $file_name1 = rand(1, 999999).".".$ext1;
            $file1->move("uploads/ataques", $file_name1);
            $ataque->setHclinica($file_name1);
            //end upload file

		 	$em = $this->getDoctrine()->getManager();
			$em->persist($ataque);
			$em->flush();

			$this->addFlash('mensaje', 'Mascota creada correctamente');
			return $this->redirectToRoute('ppp_ataque_index');
		 }

		 //var_dump($form->getErrorsAsString());die;

		return $this->render('PPPCanBundle:Ataque:add.html.twig', array('form' => $form->createView()));
	}


    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

        $dql = "SELECT u FROM PPPCanBundle:Ataque u ORDER BY u.id DESC";
        $ataques = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $ataques, $request->query->getInt('page', 1),
            10    
        );

    return $this->render('PPPCanBundle:Ataque:index.html.twig', array('pagination' => $pagination));
    }


public function viewAction($id)
    {
    	$repository = $this->getDoctrine()->getRepository('PPPCanBundle:Ataque');
    	$ataque=$repository->find($id);
        if(!$ataque)
        {
            throw $this->createNotFoundException('Registro no encontrado.');
        }

        return $this->render('PPPCanBundle:Ataque:view.html.twig', array('ataque' => $ataque));
    }



}	
