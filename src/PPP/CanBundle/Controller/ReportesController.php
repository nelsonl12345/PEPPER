<?php

namespace PPP\CanBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PPP\CanBundle\Entity\Checklist;
use PPP\CanBundle\Entity\Mascota;
use PPP\CanBundle\Form\MascotaType; 
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class ReportesController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('PPPCanBundle:Reportes:index.html.twig');
    }




#REPORTES USUARIOS PDF

    public function usuariosAction(Request $request)
    {
        return $this->render('PPPCanBundle:Reportes:usuarios.html.twig');
    }


#Reporte listado de todos los usuarios
    public function usuariostodosAction(Request $request)    
    {

        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u WHERE u.role != :name ORDER BY u.id DESC";
        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter(':name', 'ROLE_PROPIETARIO');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usuarios, $request->query->getInt('page', 1),
            10000
        );


        $snappy = $this->get("knp_snappy.pdf");
        $html = $this->renderView('PPPCanBundle:Reportes:usuariostodos.html.twig', array('pagination' => $pagination));
        //inicio generar pdf        
        $filename = "custom_pdf_from_twig";
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'
                )
            );
    }

#Reportes usuarios por numero de identificacion    

    public function usuariosidAction(Request $request)    
    {

        $identificacion = $request->query->get('identificacion');
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u WHERE u.role != :name AND u.identificacion = :identificacion";
        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter(':name', 'ROLE_PROPIETARIO');
        $usuarios->setParameter(':identificacion', $identificacion);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usuarios, $request->query->getInt('page', 1),
            10000
        );


        $snappy = $this->get("knp_snappy.pdf");
        $html = $this->renderView('PPPCanBundle:Reportes:usuariostodos.html.twig', array('pagination' => $pagination));
        //inicio generar pdf        
        $filename = "custom_pdf_from_twig";
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'
                )
            );
    }

#Reporte de usuarios consultado por rol

    public function usuariosroleAction(Request $request)    
    {

        $role = $request->query->get('role');
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT u FROM PPPCanBundle:Usuario u WHERE u.role = :role";
        $usuarios = $em->createQuery($dql);
        $usuarios->setParameter(':role', $role);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $usuarios, $request->query->getInt('page', 1),
            10000
        );


        $snappy = $this->get("knp_snappy.pdf");
        $html = $this->renderView('PPPCanBundle:Reportes:usuariostodos.html.twig', array('pagination' => $pagination));
        //inicio generar pdf        
        $filename = "custom_pdf_from_twig";
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'
                )
            );
    }


#REPORTES PERROS PDF

    public function perrosAction(Request $request)
    {
        $form=$this->createForm(new MascotaType());
        return $this->render('PPPCanBundle:Reportes:perros.html.twig', array('form' =>$form->createView()
            ));
    }

#Consulta de mascotas registradas por Raza y relacion por genero(cuantos machos y cuantas hembras de la raza seleccionada)

    public function perrosrazaAction(Request $request)    
    {

        $raza = $request->query->get('raza');
        
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m.id, m.nombresm, m.oficiom, m.generom, m.colorm, m.cual, r.dtalleraza,
                       p.apellidos, p.nombres, m.createdAtm

                FROM PPPCanBundle:Mascota m 

                JOIN m.raza r
                JOIN m.usuario p
                WHERE m.raza = :raza";
        $mascotas = $em->createQuery($dql);
        $mascotas->setParameter(':raza', $raza);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $mascotas, $request->query->getInt('page', 1),
            10000
        );

    
        $data = $this->perrosrazacount($request);
        $snappy = $this->get("knp_snappy.pdf");
        $html = $this->renderView('PPPCanBundle:Reportes:perrosraza.html.twig', array('pagination' => $pagination, 'data'  => $data));
        //inicio generar pdf        
        $filename = "custom_pdf_from_twig";
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'
                )
            );
    }

public function perrosrazacount(Request $request)    
    {

        $raza = $request->query->get('raza');

        $repository = $this->getDoctrine()->getRepository('PPPCanBundle:Mascota');

        $razas = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Raza')
            ->findAll();

        $qBase = $repository->createQueryBuilder('n')
            ->where('n.generom = :generom')   
            ->andWhere('n.raza = :raza')         
            ->setParameter(':raza', $raza)
            ->select('count(n.id)');

        $qHembra = clone $qBase;
        $qMacho = clone $qBase;

        $cHembra = $qHembra
            ->setParameter('generom', 'HEMBRA')
            ->getQuery()
            ->getSingleScalarResult();

        $cMacho = $qMacho
            ->setParameter('generom', 'MACHO')
            ->getQuery()
            ->getSingleScalarResult();


        $data = [
            "result" => [
                "razas" => [],
                "generos" => [
                    [
                        'cantidad' => $cHembra,
                        'nombre' => 'Hembra'
                    ],
                    [
                        'cantidad' => $cMacho,
                        'nombre' => 'Macho'
                    ]
                ]
            ]
        ];

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $data, $request->query->getInt('page', 1),
            10000
        );


return $data;        

    }


#Consulta de mascotas registradas por Ocupacion y relacion por genero(cuantos machos y cuantas hembras de la raza seleccionada)

    public function perrosocupacionAction(Request $request)    
    {

        $oficiom = $request->query->get('oficiom');
        
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m.id, m.nombresm, m.oficiom, m.generom, m.colorm, m.cual, r.dtalleraza,p.apellidos, p.nombres, m.createdAtm 

                FROM PPPCanBundle:Mascota m 

                JOIN m.raza r
                JOIN m.usuario p
                WHERE m.oficiom = :oficiom";
        $mascotas = $em->createQuery($dql);
        $mascotas->setParameter(':oficiom', $oficiom);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $mascotas, $request->query->getInt('page', 1),
            10000
        );

    
        $data = $this->perrosocupacioncount($request);
        $snappy = $this->get("knp_snappy.pdf");
        $html = $this->renderView('PPPCanBundle:Reportes:perrosocupacion.html.twig', array('pagination' => $pagination, 'data'  => $data));
        //inicio generar pdf        
        $filename = "custom_pdf_from_twig";
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'
                )
            );
    }


public function perrosocupacioncount(Request $request)    
    {

        $oficiom = $request->query->get('oficiom');

        $repository = $this->getDoctrine()->getRepository('PPPCanBundle:Mascota');

        $razas = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Raza')
            ->findAll();

        $qBase = $repository->createQueryBuilder('n')
            ->where('n.generom = :generom')   
            ->andWhere('n.oficiom = :oficiom')         
            ->setParameter(':oficiom', $oficiom)
            ->select('count(n.id)');

        $qHembra = clone $qBase;
        $qMacho = clone $qBase;

        $cHembra = $qHembra
            ->setParameter('generom', 'HEMBRA')
            ->getQuery()
            ->getSingleScalarResult();

        $cMacho = $qMacho
            ->setParameter('generom', 'MACHO')
            ->getQuery()
            ->getSingleScalarResult();


        $data = [
            "result" => [
                "razas" => [],
                "generos" => [
                    [
                        'cantidad' => $cHembra,
                        'nombre' => 'Hembra'
                    ],
                    [
                        'cantidad' => $cMacho,
                        'nombre' => 'Macho'
                    ]
                ]
            ]
        ];

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $data, $request->query->getInt('page', 1),
            10000
        );


return $data;        

    }



    /**
     * Reporte de mascotas registradas en un rango de fechas
     */
    public function mascotasExportarAction(Request $request)
    {
        $data = $this->getDataMascotas($request);
        $html = $this->renderView('PDF/reportes/mascotas.html.twig', array('data'  => $data));
        $filename = "Estadistica de Mascotas " . date('Ymdhis');
        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );
    }


    public function getDataMascotas(Request $request)
    {
        $start_date = $request->query->get('start_date');
        $end_date = $request->query->get('end_date');

        $repository = $this->getDoctrine()->getRepository('PPPCanBundle:Mascota');

        $razas = $this->getDoctrine()
            ->getRepository('PPPCanBundle:Raza')
            ->findAll();

        $qBase = $repository->createQueryBuilder('n')
            ->where('n.generom = :generom')
            ->andWhere('n.createdAtm > :start_date')
            ->andWhere('n.createdAtm < :end_date')
            ->select('count(n.id)')
            ->setParameter('start_date', $start_date)
            ->setParameter('end_date', $end_date);

        $qHembra = clone $qBase;
        $qMacho = clone $qBase;

        $cHembra = $qHembra
            ->setParameter('generom', 'HEMBRA')
            ->getQuery()
            ->getSingleScalarResult();

        $cMacho = $qMacho
            ->setParameter('generom', 'MACHO')
            ->getQuery()
            ->getSingleScalarResult();


        $data = [
            'config' => [
                "start_date" => $start_date,
                "end_date" => $end_date
            ],
            "result" => [
                "razas" => [],
                "generos" => [
                    [
                        'cantidad' => $cHembra,
                        'nombre' => 'Hembra'
                    ],
                    [
                        'cantidad' => $cMacho,
                        'nombre' => 'Macho'
                    ]
                ]
            ]
        ];

        foreach ($razas as $raza) {
            $qRazaBase = $repository->createQueryBuilder('n')
                ->innerJoin('n.raza', 'r')
                ->where('r.id = :raza_id')
                ->andWhere('n.createdAtm > :start_date')
                ->andWhere('n.createdAtm < :end_date')
                ->select('count(n.id)')
                ->setParameter('start_date', $start_date)
                ->setParameter('end_date', $end_date);

            $cRaza = $qRazaBase
                ->setParameter('raza_id', $raza->getId())
                ->getQuery()
                ->getSingleScalarResult();

            array_push(
                $data['result']['razas'],
                [
                    'cantidad' => $cRaza,
                    'nombre' => $raza->getDtalleraza(),
                ]
            );
        }

        return $data;
    }


    /**
     * Reporte de los radicados por estado en un rango de fechas
     */
    public function radicadosExportarAction(Request $request)
    {
        $data = $this->getDataRadicados($request);
        $html = $this->renderView('PDF/reportes/radicados.html.twig', array('data'  => $data));
        $filename = "Estadistica de Radicados " . date('Ymdhis');
        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );
    }



    /**
     * Reporte de los radicados por estado en un rango de fechas
     */
    public function radicadosPorEstadoExportarAction(Request $request)
    {
        $data = $this->getDataRadicados($request);
        $estado = $request->query->get('estado', 'rechazado');

        $config = [
            'aprobado' => [
                'key' => 'aprobados',
                'nombre' => 'Aprobado'
            ],
            'rechazado' => [
                'key' => 'rechazados',
                'nombre' => 'Rechazado'
            ],
            'radicado' => [
                'key' => 'radicados',
                'nombre' => 'Radicado'
            ],
        ];

        $configE = $config[$estado];

        $html = $this->renderView('PDF/reportes/radicadosestado.html.twig', array('data'  => $data, 'config' => $configE));
        $filename = "Radicados por Estado - {$configE['nombre']} - " . date('Ymdhis');
        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'.$filename.'.pdf"'
            )
        );
    }


    public function getDataRadicados(Request $request)
    {
        $start_date = $request->query->get('start_date');
        $end_date = $request->query->get('end_date');

        $repository = $this->getDoctrine()->getRepository('PPPCanBundle:Radicado');

        $qBase = $repository->createQueryBuilder('n')
            ->where('n.estado = :estado')
            ->andWhere('n.createdAtradi > :start_date')
            ->andWhere('n.createdAtradi < :end_date')
            ->setParameter('start_date', $start_date)
            ->setParameter('end_date', $end_date);

        $qRadicados = clone $qBase;
        $qAprobados = clone $qBase;
        $qRechazados = clone $qBase;

        $qRadicados->setParameter('estado', 'Radicado');
        $qAprobados->setParameter('estado', 'Aprobado');
        $qRechazados->setParameter('estado', 'Rechazado');

        $oRadicados = $qRadicados->getQuery()->getResult();
        $oAprobados = $qAprobados->getQuery()->getResult();
        $oRechazados = $qRechazados->getQuery()->getResult();


        $cRadicados = $qRadicados->select('count(n.id)')->getQuery()->getSingleScalarResult();

        $cAprobado = $qAprobados->select('count(n.id)')->getQuery()->getSingleScalarResult();

        $cRechazados = $qRechazados->select('count(n.id)')->getQuery()->getSingleScalarResult();

        $data = [
            'config' => [
                "start_date" => $start_date,
                "end_date" => $end_date
            ],
            "result" => [
                "estados" => [
                    [
                        'cantidad' => $cRadicados,
                        'nombre' => 'Radicados'
                    ],
                    [
                        'cantidad' => $cAprobado,
                        'nombre' => 'Aprobado'
                    ],
                    [
                        'cantidad' => $cRechazados,
                        'nombre' => 'Rechazados'
                    ]
                ]
            ],
            "objects" => [
                "estados" => [
                    "radicados" => $oRadicados,
                    "aprobados" => $oAprobados,
                    "rechazados" => $oRechazados,
                ]
            ]
        ];

        return $data;
    }

    public function mascotasEntreAction(Request $request)
    {
        $data = $this->getDataMascotas($request);

        return new JsonResponse($data);
    }

    public function radicadosEntreAction(Request $request)
    {
        $data = $this->getDataRadicados($request);
        return new JsonResponse($data);
    }
}
