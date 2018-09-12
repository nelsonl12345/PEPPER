<?php

namespace PPP\CanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Filesystem\Filesystem;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PPP\CanBundle\Entity\Radicado;
use PPP\CanBundle\Form\RadicadoType;

class RadicadoController extends Controller
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
            $radicados,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('PPPCanBundle:Radicado:index.html.twig', array('pagination' => $pagination));
    }

    //Funciones para crear el formulario y enviar a guardar los datos a la base de datos

    public function addAction()
    {
        $radicado = new Radicado();
        $form = $this->createCreateForm($radicado);
        return $this->render('PPPCanBundle:Radicado:add.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(Radicado $entity)
    {
        $form = $this->createForm(new RadicadoType(), $entity, array(
            'action' => $this->generateUrl('ppp_radicado_create'),
            'method' => 'POST'
            ));
        return $form;
    }

    public function createAction(Request $request)
    {
        $radicado = new radicado();
        $form = $this->createCreateForm($radicado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $archivo1 = $form->get('archivo1')->getData();
            //start upload file
            $file1 = $radicado->getArchivo1();
            $ext1 = $file1->guessExtension();
            $file_name1 = rand(1, 999999).".".$ext1;
            $file1->move("uploads/radicados", $file_name1);
            $radicado->setArchivo1($file_name1);
            //end upload file

            $archivo2 = $form->get('archivo2')->getData();
            $file2 = $radicado->getArchivo2();
            if ($file2) {
                //start upload file
                $ext2 = $file2->guessExtension();
                $file_name2 = rand(1, 999999).".".$ext2;
                $file2->move("uploads/radicados", $file_name2);
                $radicado->setArchivo2($file_name2);
                //end upload file
            }


            $archivo3 = $form->get('archivo3')->getData();
            $file3 = $radicado->getArchivo3();
            //start upload file
            $ext3 = $file3->guessExtension();
            $file_name3 = rand(1, 999999).".".$ext3;
            $file3->move("uploads/radicados", $file_name3);
            $radicado->setArchivo3($file_name3);
            //end upload file


            $em = $this->getDoctrine()->getManager();
            $em->persist($radicado);
            $em->flush();

            $this->addFlash('mensaje', 'Registro creado correctamente');
            return $this->redirectToRoute('ppp_radicado_add');
        }

        return $this->render('PPPCanBundle:Radicado:add.html.twig', array('form' => $form->createView()));
    }

    //funciones para mostrar los datod view
    public function viewAction($id)
    {
        $radicado = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Radicado')
            ->find($id);

        $mascota = $radicado->getMascota();
        $usuario = $mascota->getUsuario();


        if (!$mascota) {
            throw $this->createNotFoundException('Mascota no encontrada.');
        }

        return $this->render('PPPCanBundle:Radicado:view.html.twig', array('radicado' => $radicado, 'mascota' => $mascota, 'usuario' => $usuario));
    }


//Controlador Editar registros

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $radicado = $em->getRepository('PPPCanBundle:Radicado')->find($id);

        $checklist = $radicado->getChecklist();
        
        if(!$radicado)
        {
            throw $this->createNotFoundException('Registro no encontrado.');
        }
        
        $form = $this->createEditForm($radicado);
        
        return $this->render('PPPCanBundle:Radicado:edit.html.twig', array(
            'radicado' => $radicado,
            'checklist' => $checklist,
            'form' => $form->createView()));        
    }
    
    private function createEditForm(Radicado $entity)
    {
        $form = $this->createForm(new RadicadoType(), $entity, array('action' => $this->generateUrl('ppp_radicado_update', array('id' => $entity->getId())), 'method' => 'PUT'));        
        return $form;
    }


public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $radicado = $em->getRepository('PPPCanBundle:Radicado')->find($id);
        $checklist = $radicado->getChecklist();

        if(!$radicado)
        {
            throw $this->createNotFoundException('Solicitud No encontrada');
        }
        
        $form = $this->createEditForm($radicado);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            
            $archivo1 = $form->get('archivo1')->getData();
            //start upload file
            $file1 = $radicado->getArchivo1();
            $ext1 = $file1->guessExtension();
            $file_name1 = rand(1, 999999).".".$ext1;
            $file1->move("uploads/radicados", $file_name1);
            $radicado->setArchivo1($file_name1);
            //end upload file

            $archivo2 = $form->get('archivo2')->getData();
            $file2 = $radicado->getArchivo2();
            if ($file2) {
                //start upload file
                $ext2 = $file2->guessExtension();
                $file_name2 = rand(1, 999999).".".$ext2;
                $file2->move("uploads/radicados", $file_name2);
                $radicado->setArchivo2($file_name2);
                //end upload file
            }


            $archivo3 = $form->get('archivo3')->getData();
            $file3 = $radicado->getArchivo3();
            //start upload file
            $ext3 = $file3->guessExtension();
            $file_name3 = rand(1, 999999).".".$ext3;
            $file3->move("uploads/radicados", $file_name3);
            $radicado->setArchivo3($file_name3);
            //end upload file            

            $em->flush();
            
            $this->addFlash('mensaje', 'Registro modificado correctamente');
            return $this->redirectToRoute('ppp_radicado_add', array('id' => $radicado->getId()));
        }
        return $this->render('PPPCanBundle:Radicado:edit.html.twig', array(
            'radicado' => $radicado,
            'checklist' => $checklist,
             'form' => $form->createView()));
    }



    public function certificadoAction(Request $request, $id)
    {
        $radicado = $this->getDoctrine()->getRepository('PPPCanBundle:Radicado')->find($id);
        $mascota = $radicado->getMascota();
        $propietario = $mascota->getUsuario();

        if ($radicado->getEstado() !== 'Aprobado') {
            $this->addFlash('mensaje', 'El radicado no se ha aprobado.');
            $referer = $request->headers->get('referer');
            return $this->redirect($referer);
        }

        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $fecha_generacion = new \DateTime();
        $fecha_radicado = $radicado->getCreatedAtradi();

        $mascota_foto = "{$this->get('kernel')->getRootDir()}/../web/uploads/mascotas/{$mascota->getFoto1m()}";
        $fileSystem = new Filesystem();
        if (!$fileSystem->exists($mascota_foto)) {
            $mascota_foto = null;
        }

        $html = $this->renderView('PDF/certificado.html.twig', array(
            'radicado'  => $radicado,
            'mascota'  => $mascota,
            'propietario'  => $propietario,
            'mascota_foto' => $mascota_foto,
            "config" => [
                "watermark" => "{$this->get('kernel')->getRootDir()}/../web/public/images/escudo_girardot_watermark.png",
            ],
            "firma" => [
                "nombre" => "MANUEL REINALDO DIAS GONZALEZ",
                "cargo" => "Secretario de Salud",
            ],
            'fechas' => [
                "generacion" => [
                    "dia" => $fecha_generacion->format('d'),
                    "mes" => $meses[$fecha_generacion->format('n')-1],
                    "ano" => $fecha_generacion->format('Y'),
                ],
                "radicado" => [
                    "dia" => $fecha_radicado->format('d'),
                    "mes" => $meses[$fecha_radicado->format('n')-1],
                    "ano" => $fecha_radicado->format('Y'),
                ]
            ]
        ));

        $filename = "Certificado Radicado #{$radicado->getId()} - " . date('Ymdhis');

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );
    }
}
