<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PPP\CanBundle\Entity\Usuario;
use PPP\CanBundle\Form\PropietarioType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;

class PropietarioController extends Controller
{


    public function indexAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u WHERE u.role = :name ORDER BY u.id DESC";
        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter(':name', 'ROLE_PROPIETARIO');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usuarios, $request->query->getInt('page', 1),
            10    
        );        

return $this->render('PPPCanBundle:Usuario:index.html.twig', array('pagination' => $pagination));
 	}


    public function addAction()
    {
        $usuario=new Usuario();
        $form=$this->createCreateForm($usuario);
        return $this->render('PPPCanBundle:Propietario:add.html.twig', array('form'=>$form->createView()));
    }

    private function createCreateForm(Usuario $entity)
    {
        $form = $this->createForm(new PropietarioType(), $entity, array(            
                'action' => $this->generateUrl('ppp_regprop_create'),
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


            $imgcedula = $form->get('imgcedula')->getData();
            if (!empty($imgcedula))
            {                

            //start upload file
            $file1 = $usuario->getImgcedula();
            $ext1 = $file1->guessExtension();
            $file_name1 = rand(1, 999999).".".$ext1;
            $file1->move("uploads/usuarios",$file_name1);
            $usuario->setImgcedula($file_name1);
            //end upload file
            }
            else{
                $imgcedula = NULL;
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

            return $this->redirectToRoute('ppp_regprop_add');  
            }  //termina if    
            else{
                $errorMessage = new FormError($errorList[0]->getMessage());
                $form->get('contrasena')->addError($errorMessage);
            }       


        }

        return $this->render('PPPCanBundle:Propietario:add.html.twig', array('form'=>$form->createView()));
    }



}