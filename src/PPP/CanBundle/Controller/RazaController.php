<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use PPP\CanBundle\Entity\Raza;
use PPP\CanBundle\Form\RazaType;


class RazaController extends Controller
{

//Pagina index donde se listan los registros	
    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Raza u ORDER BY u.id DESC";
        $razas = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $razas, $request->query->getInt('page', 1),
            10   
        );
        
    $deleteFormAjax = $this->createCustomForm(':USER_ID', 'DELETE', 'ppp_raza_delete');                

return $this->render('PPPCanBundle:Raza:index.html.twig', array('pagination' => $pagination, 'delete_form_ajax'=> $deleteFormAjax->createView() ));
    }

    private function createCustomForm($id, $method, $route)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($route, array('id'=>$id)))
            ->setMethod($method)
            ->getForm();
    }


//pagina formulario donde se registran los registros
public function addAction()
    {
        
        $raza=new Raza();
        $form=$this->createCreateForm($raza);

        return $this->render('PPPCanBundle:Raza:add.html.twig', array('form'=>$form->createView()));
    }

    private function createCreateForm(Raza $entity)
    {
    	$form = $this->createForm(new RazaType(), $entity, array(     		
    			'action' => $this->generateUrl('ppp_raza_create'),
    			'method' => 'POST'
    		));
    	return $form;
    }

    public function createAction(Request $request)
    {
        $raza = new Raza();
        $form = $this->createCreateForm($raza);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {    
       	    $em = $this->getDoctrine()->getManager();
            $em->persist($raza);
            $em->flush();

            $this->addFlash('mensaje','El registro ha sido creado.');

            return $this->redirectToRoute('ppp_raza_index');  
		}  //termina if               
    
        return $this->render('PPPCanBundle:Raza:add.html.twig', array('form'=>$form->createView()));
    }


//Controlador Editar registros

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $raza = $em->getRepository('PPPCanBundle:Raza')->find($id);
        
        if(!$raza)
        {
            throw $this->createNotFoundException('Registro no encontrado.');
        }
        
        $form = $this->createEditForm($raza);
        
        return $this->render('PPPCanBundle:Raza:edit.html.twig', array('raza' => $raza, 'form' => $form->createView()));        
    }
    
    private function createEditForm(Raza $entity)
    {
        $form = $this->createForm(new RazaType(), $entity, array('action' => $this->generateUrl('ppp_raza_update', array('id' => $entity->getId())), 'method' => 'PUT'));        
        return $form;
    }


public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $raza = $em->getRepository('PPPCanBundle:Raza')->find($id);

        if(!$raza)
        {
            throw $this->createNotFoundException('Raza No encontrada');
        }
        
        $form = $this->createEditForm($raza);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            
            $em->flush();
            
            $this->addFlash('mensaje', 'Registro modificado correctamente');
            return $this->redirectToRoute('ppp_raza_index', array('id' => $raza->getId()));
        }
        return $this->render('PPPCanBundle:Raza:edit.html.twig', array('raza' => $raza, 'form' => $form->createView()));
    }


    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PPPCanBundle:Raza')->find($id);
        if(!$user)
        {
            throw $this->createNotFoundException('Raza No encontrado');
        }

        $allUsers = $em->getRepository('PPPCanBundle:Raza')->findAll();
        $countUsers = count($allUsers);
        //$form = $this->createDeleteForm($user);
        $form = $this->createCustomForm($user->getId(), 'DELETE', 'ppp_raza_delete');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            if ($request->isXMLHttpRequest()) 
            {
                $res = $this->deleteUser($user->getId(), $em, $user);   

                return new Response(
                    json_encode(array('removed' => $res['removed'], 'message' => $res['message'], 'countUsers' => $countUsers)),
                    200,
                    array('Content-Type' => 'application/json')
                );            
            }            

            $res = $this->deleteUser($user->getId(), $em, $user);

            $this->addFlash($res['alert'], $res['message']);
            return $this->redirectToRoute('ppp_raza_index');
        }
    }

    private function deleteUser($id, $em, $user)
    {
            $em->remove($user);
            $em->flush();

            //$message = $this->addFlash('mensaje', 'El Usuario ha sido eliminado correctamente');     
            $message = $this->get('translator')->trans('El Registro ha sido eliminado.');       
            $removed = 1;
            $alert = 'mensaje';
      
        return array('removed' => $removed, 'message' => $message, 'alert' => $alert);
    }



}
