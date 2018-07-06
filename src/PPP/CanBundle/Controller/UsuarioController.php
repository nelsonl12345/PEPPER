<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PPP\CanBundle\Entity\Usuario;
use PPP\CanBundle\Form\UsuarioType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;


class UsuarioController extends Controller
{

    public function homeAction()
    {
        return $this->render('PPPCanBundle:Usuario:home.html.twig');
    }


    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u WHERE u.role != :name ORDER BY u.id DESC";
        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter(':name', 'ROLE_PROPIETARIO');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usuarios, $request->query->getInt('page', 1),
            10    
        );

        $deleteFormAjax = $this->createCustomForm(':USER_ID', 'DELETE', 'ppp_usuario_delete');        

return $this->render('PPPCanBundle:Usuario:index.html.twig', array('pagination' => $pagination, 'delete_form_ajax'=> $deleteFormAjax->createView()));
 	}


    public function addAction()
    {
        $usuario=new Usuario();
        $form=$this->createCreateForm($usuario);
        return $this->render('PPPCanBundle:Usuario:add.html.twig', array('form'=>$form->createView()));
    }

    private function createCreateForm(Usuario $entity)
    {
    	$form = $this->createForm(new UsuarioType(), $entity, array(     		
    			'action' => $this->generateUrl('ppp_usuario_create'),
    			'method' => 'POST'
    		));
    	return $form;
    }

    public function createAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createCreateForm($usuario);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {    
            
            $foto = $form->get('foto')->getData();
            if (!empty($foto))
            {                

            //start upload file
            $file = $usuario->getFoto();
            $ext = $file->guessExtension();
            $file_name = rand(1, 999999).".".$ext;
            $file->move("uploads/usuarios",$file_name);
            $usuario->setFoto($file_name);
            //end upload file
            }
            else{
                $foto = NULL;
            }


        	$contrasena = $form->get('contrasena')->getData();
            
            $passwordConstraint = new Assert\NotBlank();
            $errorList = $this->get('validator')->validate($contrasena, $passwordConstraint);
            if(count($errorList)==0)
            {
        	$encoder = $this->container->get('security.password_encoder');
        	$encoded = $encoder->encodePassword($usuario, $contrasena);
			$usuario->setContrasena($encoded);         
            
    
       	    $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            $this->addFlash('mensaje','El usuario ha sido creado.');

            return $this->redirectToRoute('ppp_usuario_index');  
			}  //termina if    
            else{
                $errorMessage = new FormError($errorList[0]->getMessage());
                $form->get('contrasena')->addError($errorMessage);
            }       


        }

        return $this->render('PPPCanBundle:Usuario:add.html.twig', array('form'=>$form->createView()));
    }


    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('PPPCanBundle:Usuario')->find($id);
        
        if(!$usuario)
        {
            throw $this->createNotFoundException('Usuario no encontrado.');
        }
        
        $form = $this->createEditForm($usuario);
        
        return $this->render('PPPCanBundle:Usuario:edit.html.twig', array('usuario' => $usuario, 'form' => $form->createView()));        
    }
    
    private function createEditForm(Usuario $entity)
    {
        $form = $this->createForm(new UsuarioType(), $entity, array('action' => $this->generateUrl('ppp_usuario_update', array('id' => $entity->getId())), 'method' => 'PUT'));        
        return $form;
    }

    

public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $usuario = $em->getRepository('PPPCanBundle:Usuario')->find($id);

        if(!$usuario)
        {
            throw $this->createNotFoundException('Usuario No encontrado');
        }
        
        $form = $this->createEditForm($usuario);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {

            $foto = $form->get('foto')->getData();
            if (!empty($foto))
            {                
            //start upload file
            $file = $usuario->getFoto();
            $ext = $file->guessExtension();
            $file_name = time().".".$ext;
            $file->move("uploads/usuarios",$file_name);
            $usuario->setFoto($file_name);
            //end upload file
            }
            else{
                $recoverFoto = $this->recoverFoto($id);
                $usuario->setFoto($recoverFoto[0]['foto']);
            }



            $contrasena = $form->get('contrasena')->getData();
            if(!empty($contrasena))
            {
                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($usuario, $contrasena);
                $usuario->setContrasena($encoded);  
            }
            else
            {
                $recoverPass = $this->recoverPass($id);
                $usuario->setContrasena($recoverPass[0]['contrasena']);                
            }
            
            if($form->get('role')->getData() == 'ROLE_COORDINADOR' || 'ROLE_JEFE_DEPARTAMENTO')
            {
                $usuario->setIsActive(1);
            }

            $em->flush();
            
            $this->addFlash('mensaje', 'El Usuario ha sido modificado correctamente');
            return $this->redirectToRoute('ppp_usuario_index', array('id' => $usuario->getId()));
        }
        return $this->render('PPPCanBundle:Usuario:edit.html.twig', array('usuario' => $usuario, 'form' => $form->createView()));
    }
    
    private function recoverFoto($id)    
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u.foto
             FROM PPPCanBundle:Usuario u
             WHERE u.id = :id'
            )
        ->setParameter ('id', $id);

        $currentFoto = $query->getResult();
        return $currentFoto;
    }



    private function recoverPass($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT u.contrasena
            FROM PPPCanBundle:Usuario u
            WHERE u.id = :id'    
        )->setParameter('id', $id);
        
        $currentPass = $query->getResult();
        
        return $currentPass;
    }


public function viewAction($id)
    {
    	$repository = $this->getDoctrine()->getRepository('PPPCanBundle:Usuario');
    	$usuario=$repository->find($id);
        if(!$usuario)
        {
            throw $this->createNotFoundException('Usuario no encontrado.');
        }
          $deleteForm = $this->createCustomForm($usuario->getId(), 'DELETE', 'ppp_usuario_delete');
        return $this->render('PPPCanBundle:Usuario:view.html.twig', array('usuario' => $usuario, 'delete_form' => $deleteForm->createView()));
    }



    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PPPCanBundle:Usuario')->find($id);
        if(!$user)
        {
            throw $this->createNotFoundException('Usuario No encontrado');
        }

        $allUsers = $em->getRepository('PPPCanBundle:Usuario')->findAll();
        $countUsers = count($allUsers);
        //$form = $this->createDeleteForm($user);
        $form = $this->createCustomForm($user->getId(), 'DELETE', 'ppp_usuario_delete');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            if ($request->isXMLHttpRequest()) 
            {
                $res = $this->deleteUser($user->getRole(), $em, $user);   

                return new Response(
                    json_encode(array('removed' => $res['removed'], 'message' => $res['message'], 'countUsers' => $countUsers)),
                    200,
                    array('Content-Type' => 'application/json')
                );            
            }            

            $res = $this->deleteUser($user->getRole(), $em, $user);

            $this->addFlash($res['alert'], $res['message']);
            return $this->redirectToRoute('ppp_usuario_index');
        }
    }


    private function deleteUser($role, $em, $user)
    {
        if ($role == 'ROLE_COORDINADOR' || $role == 'ROLE_SECRETARIO' || $role == 'ROLE_ZOOTECNISTA' || $role == 'ROLE_PROPIETARIO') 
        {
            $em->remove($user);
            $em->flush();

            //$message = $this->addFlash('mensaje', 'El Usuario ha sido eliminado correctamente');     
            $message = $this->get('translator')->trans('El usuario ha sido eliminado.');       
            $removed = 1;
            $alert = 'mensaje';
        }
        elseif ($role == 'ROLE_JEFE_DEPARTAMENTO') 
        {
            //$message = $this->addFlash('mensaje', 'El Usuario NO se ha eliminado debido a que es un administrador');
            $message = $this->get('translator')->trans('Usuario no pudo ser eliminado por que es de rol Jefe del departamento.');             
            $removed = 0;
            $alert = 'error'; 
        }
        return array('removed' => $removed, 'message' => $message, 'alert' => $alert);
    }

    private function createCustomForm($id, $method, $route)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($route, array('id'=>$id)))
            ->setMethod($method)
            ->getForm();
    }

}



