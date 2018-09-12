<?php

namespace PPP\CanBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PPP\CanBundle\Entity\Checklist;
use PPP\CanBundle\Form\ChecklistType;

class Checklist1Controller extends Controller
{

//Pagina index donde se listan los registros
    public function index1Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$dql = "SELECT u FROM PPPCanBundle:Radicado u ORDER BY u.id DESC";
        $dql = "SELECT r.id, r.archivo1, m.nombresm, p.nombres, r.createdAtradi, r.updatedAtradi,
                       r.estado

            FROM PPPCanBundle:Radicado r

            JOIN r.mascota m
            JOIN m.usuario p

            WHERE r.estado = 'En proceso(zoo)'
        ";


        $radicados = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $radicados,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('PPPCanBundle:Checklist1:index1.html.twig', array('pagination' => $pagination));
    }



    /*
    public function addAction()
    {
        $checklist = new Checklist();
        $form = $this->createCreateForm($checklist);
        return $this->render('PPPCanBundle:Checklist:add.html.twig', array('form' => $form->createView()));
    }
    */

    private function createCreateForm(Checklist $entity)
    {
        $form = $this->createForm(new ChecklistType(), $entity, array(
            'action' => $this->generateUrl('ppp_checklist1_create1'),
            'method' => 'POST'
        ));
        return $form;
    }
    private function createUpdateForm(Checklist $entity)
    {
        $form = $this->createForm(new ChecklistType(), $entity, array(
        'action' => $this->generateUrl('ppp_checklist1_update1', array('id' => $entity->getId())),
        'method' => 'POST'
        ));
        return $form;
    }

    public function create1Action(Request $request)
    {

        $checklist = new checklist();
        $form = $this->createCreateForm($checklist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($checklist);
            $em->flush();

            $this->addFlash('mensaje', 'Registro enviado correctamente');
            return $this->redirectToRoute('ppp_checklist1_view1');
        }

        return $this->render('PPPCanBundle:Checklist1:view1.html.twig', array('form' => $form->createView()));
    }

    public function enviarMailRadicado($radicado)
    {
        $message = (new \Swift_Message('Estado de radicado'))
            ->setFrom('proyectopepper@gmail.com')
            ->setTo($radicado->getMascota()->getUsuario()->getCorreo())
            ->setBody(
                $this->renderView(
                    'Emails/radicado.html.twig',
                    array('radicado' => $radicado)
                ),
                'text/html'
            );

        $this->get('mailer')->send($message);
    }

    public function update1Action(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $checklist = $em->getRepository('PPPCanBundle:Checklist')->find($id);

        if (!$checklist) {
            throw $this->createNotFoundException(
                'No checklist found for id '.$id
            );
        }
        $data = $request->request->all()['checklist'];
        $usr= $this->get('security.context')->getToken()->getUser();
        if ($data['archivo1c'] !== $checklist->getArchivo1c()) {
            $checklist->setUsuario1c($usr);
        }
        if ($data['archivo2c'] !== $checklist->getArchivo2c()) {
            $checklist->setUsuario2c($usr);
        }
        if ($data['archivo3c'] !== $checklist->getArchivo3c()) {
            $checklist->setUsuario3c($usr);
        }


        $form = $this->createCreateForm($checklist);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mensaje = "Registro editado correctamente";

            $em = $this->getDoctrine()->getManager();
            $em->persist($checklist);
            $em->flush();

            $radicado = $checklist->getRadicado();

            if ($checklist->allFileRejected()) {
                if ($radicado->getEstado() !== 'Rechazado') {
                    $radicado->setEstado('En proceso(coor)');

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($radicado);
                    $em->flush();

                    $mensaje .= " El estado se cambio a En proceso(coor)";
                    $this->enviarMailRadicado($radicado);
                }
            }//termina if

            if ($checklist->someFileRejected()) {
                if ($radicado->getEstado() !== 'Rechazado') {
                    $radicado->setEstado('En proceso(coor)');

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($radicado);
                    $em->flush();

                    $mensaje .= " El estado se cambio a En proceso(coor)";
                    $this->enviarMailRadicado($radicado);
                }
            }//termina if


            if ($checklist->allFileApproved()) {
                if ($radicado->getEstado() !== 'Aprobado') {
                    $radicado->setEstado('En proceso(jefe)');

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($radicado);
                    $em->flush();

                    $mensaje .= " El estado se cambio a En proceso(jefe)";
                    $this->enviarMailRadicado($radicado);
                }
            }//termina if

            $this->addFlash('mensaje', $mensaje);
            return $this->redirectToRoute('ppp_checklist1_index1');
        }

        return $this->render('PPPCanBundle:Checklist1:view1.html.twig', array('form' => $form->createView()));
    }


    public function view1Action($id)
    {
        $radicado = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Radicado')
            ->find($id);

        $mascota = $radicado->getMascota();
        $usuario = $mascota->getUsuario();


        if (!$mascota) {
            throw $this->createNotFoundException('Registro no encontrado.');
        }
        $checklist = $radicado->getChecklist();
        if (!$checklist) {
            $entityManager = $this->getDoctrine()->getManager();

            $checklist = new Checklist();
            $checklist->setArchivo1c('Rechazado');
            $checklist->setArchivo2c('Rechazado');
            $checklist->setArchivo3c('Rechazado');
            $checklist->setComentario('');
            // $checklist->setUsuario();
            $checklist->setRadicado($radicado);

            $entityManager->persist($checklist);

            $entityManager->flush();
        }

        $form = $this->createUpdateForm($checklist);

        return $this->render('PPPCanBundle:Checklist1:view1.html.twig', array(
            'checklist' => $checklist,
            'radicado' => $radicado,
            'mascota' => $mascota,
            'usuario' => $usuario,
            'form' => $form->createView()
        ));
    }
}
