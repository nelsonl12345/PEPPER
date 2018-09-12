<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PPP\CanBundle\Entity\Mascota;
use PPP\CanBundle\Form\MascotaType; 
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class MascotaController extends Controller
{

//funciones para el listado de las mascotas
    public function indexAction(Request $request, $idUsuario)
    {
    	
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m.id, m.nombresm, p.apellidos, p.nombres, r.dtalleraza, m.aniom, m.mesm, 
                       m.diam, m.generom

                FROM PPPCanBundle:Mascota m  

                JOIN  m.usuario p
                JOIN  m.raza r 
                WHERE p.id = $idUsuario";

        $mascotas = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $mascotas, $request->query->getInt('page', 1),
            5    
        );

        
    $deleteFormAjax = $this->createCustomForm(':USER_ID', 'DELETE', 'ppp_mascota_delete');                

return $this->render('PPPCanBundle:Mascota:index.html.twig', array('pagination' => $pagination,'delete_form_ajax'=> $deleteFormAjax->createView()));
    }


    public function index1Action(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m.id, m.nombresm, p.apellidos, p.nombres, r.dtalleraza, m.aniom, m.mesm, 
                       m.diam, m.generom

                FROM PPPCanBundle:Mascota m  

                JOIN  m.usuario p
                JOIN  m.raza r 
                ";

        $mascotas = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $mascotas, $request->query->getInt('page', 1),
            5    
        );

        
    $deleteFormAjax = $this->createCustomForm(':USER_ID', 'DELETE', 'ppp_mascota_delete');                

return $this->render('PPPCanBundle:Mascota:index1.html.twig', array('pagination' => $pagination,'delete_form_ajax'=> $deleteFormAjax->createView()));
    }


    private function createCustomForm($id, $method, $route)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($route, array('id'=>$id)))
            ->setMethod($method)
            ->getForm();
    }


//Funciones para crear el formulario y enviar a guardar los datos a la base de datos

	public function addAction()
	{
		$mascota = new Mascota();
		$form = $this->createCreateForm($mascota);
		return $this->render('PPPCanBundle:Mascota:add.html.twig', array('form' => $form->createView()));
	}

	private function createCreateForm(Mascota $entity)
	{
		$form = $this->createForm(new MascotaType(), $entity, array(
			'action' => $this->generateUrl('ppp_mascota_create'),
			'method' => 'POST'
			));
		return $form;
	}

	public function createAction(Request $request)
	{
		$mascota = new mascota();
		$form = $this->createCreateForm($mascota);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		 {
		 	$foto1m = $form->get('foto1m')->getData();
            if (!empty($foto1m))
            {                		 	
		 	//start upload file
            $file1 = $mascota->getFoto1m();
            $ext1 = $file1->guessExtension();
            $file_name1 = rand(1, 999999).".".$ext1;
            $file1->move("uploads/mascotas",$file_name1);
            $mascota->setFoto1m($file_name1);
            //end upload file
        	}
            else{
                $foto1m = NULL;
            }


		 	$foto2m = $form->get('foto2m')->getData();
		 	//start upload file
            if (!empty($foto2m))
            {                		 			 	
            $file2 = $mascota->getFoto2m();
            $ext2 = $file2->guessExtension();
            $file_name2 = rand(1, 999999).".".$ext2;
            $file2->move("uploads/mascotas",$file_name2);
            $mascota->setFoto2m($file_name2);
            //end upload file
        	}
            else{
                $foto2m = NULL;
            }


		 	$foto3m = $form->get('foto3m')->getData();
		 	//start upload file
            if (!empty($foto3m))
            {                		 			 			 	
            $file3 = $mascota->getFoto3m();
            $ext3 = $file3->guessExtension();
            $file_name3 = rand(1, 999999).".".$ext3;
            $file3->move("uploads/mascotas",$file_name3);
            $mascota->setFoto3m($file_name3);
            //end upload file
        	}
            else{
                $foto3m = NULL;
            }


			$em = $this->getDoctrine()->getManager();
			$em->persist($mascota);
			$em->flush();

			$this->addFlash('mensaje', 'Mascota creada correctamente');
			return $this->redirectToRoute('ppp_mascota_add');
		 }

		return $this->render('PPPCanBundle:Mascota:add.html.twig', array('form' => $form->createView()));
	}


//funciones para mostrar los datod view

public function viewAction($id)
    {
        $mascota = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Mascota')
            ->find($id);
        
        $usuario = $mascota->getUsuario();
        $raza = $mascota->getRaza();
 
        if(!$mascota)
        {
            throw $this->createNotFoundException('Mascota no encontrada.');
        }
 
        return $this->render('PPPCanBundle:Mascota:view.html.twig', array('mascota' => $mascota,
            'usuario' => $usuario, 'raza'=> $raza));
    }

//funciones para editar datos de las mascotas

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $mascota = $em->getRepository('PPPCanBundle:Mascota')->find($id);
        
        if(!$mascota)
        {
            throw $this->createNotFoundException('Mascota no encontrada.');
        }
        
        $form = $this->createEditForm($mascota);
        
        return $this->render('PPPCanBundle:Mascota:edit.html.twig', array('mascota' => $mascota, 'form' => $form->createView()));        
    }
    
    private function createEditForm(Mascota $entity)
    {
        $form = $this->createForm(new MascotaType(), $entity, array('action' => $this->generateUrl('ppp_mascota_update', array('id' => $entity->getId())), 'method' => 'PUT'));        
        return $form;
    }


public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $mascota = $em->getRepository('PPPCanBundle:Mascota')->find($id);

        if(!$mascota)
        {
            throw $this->createNotFoundException('Mascota No encontrada');
        }
        
        $form = $this->createEditForm($mascota);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            
            $foto1m = $form->get('foto1m')->getData();
            if (!empty($foto1m))
            {                
            //start upload file
            $file1 = $mascota->getFoto1m();
            $ext1 = $file1->guessExtension();
            $file_name1 = rand(1, 999999).".".$ext1;
            $file1->move("uploads/mascotas",$file_name1);
            $mascota->setFoto1m($file_name1);
            //end upload file
            }
            else{
                $recoverFoto1 = $this->recoverFoto1($id);
                $mascota->setFoto1m($recoverFoto1[0]['foto1m']);
            }


			$foto2m = $form->get('foto2m')->getData();
            if (!empty($foto2m))
            {                
            //start upload file
            $file2 = $mascota->getFoto2m();
            $ext2 = $file2->guessExtension();
            $file_name2 = rand(1, 999999).".".$ext2;
            $file2->move("uploads/mascotas",$file_name2);
            $mascota->setFoto2m($file_name2);
            //end upload file
            }
            else{
                $recoverFoto2 = $this->recoverFoto2($id);
                $mascota->setFoto2m($recoverFoto2[0]['foto2m']);
            }            
            

			$foto3m = $form->get('foto3m')->getData();
            if (!empty($foto3m))
            {                
            //start upload file
            $file3 = $mascota->getFoto3m();
            $ext3 = $file3->guessExtension();
            $file_name3 = rand(1, 999999).".".$ext3;
            $file3->move("uploads/mascotas",$file_name3);
            $mascota->setFoto3m($file_name3);
            //end upload file
            }
            else{
                $recoverFoto3 = $this->recoverFoto3($id);
                $mascota->setFoto3m($recoverFoto3[0]['foto3m']);
            }                  

            $em->flush();
            
            $this->addFlash('mensaje', 'Mascota modificada correctamente');
            return $this->redirectToRoute('ppp_mascota_index', array('id' => $mascota->getId()));
        }
        return $this->render('PPPCanBundle:Mascota:edit.html.twig', array('mascota' => $mascota, 'form' => $form->createView()));
    }

    private function recoverFoto1($id)    
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u.foto1m
             FROM PPPCanBundle:Mascota u
             WHERE u.id = :id'
            )
        ->setParameter ('id', $id);

        $currentFoto = $query->getResult();
        return $currentFoto;
    }

    private function recoverFoto2($id)    
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u.foto2m
             FROM PPPCanBundle:Mascota u
             WHERE u.id = :id'
            )
        ->setParameter ('id', $id);

        $currentFoto = $query->getResult();
        return $currentFoto;
    }    

    private function recoverFoto3($id)    
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u.foto3m
             FROM PPPCanBundle:Mascota u
             WHERE u.id = :id'
            )
        ->setParameter ('id', $id);

        $currentFoto = $query->getResult();
        return $currentFoto;
    }

//funciones para eliminar mascota

    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PPPCanBundle:Mascota')->find($id);
        if(!$user)
        {
            throw $this->createNotFoundException('Mascota No encontrado');
        }

        $allUsers = $em->getRepository('PPPCanBundle:Mascota')->findAll();
        $countUsers = count($allUsers);
        //$form = $this->createDeleteForm($user);
        $form = $this->createCustomForm($user->getId(), 'DELETE', 'ppp_mascota_delete');
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
            return $this->redirectToRoute('ppp_mascota_index');
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
