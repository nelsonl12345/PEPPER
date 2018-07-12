<?php

namespace PPP\CanBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PPP\CanBundle\Entity\Checklist;


class ReportesController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('PPPCanBundle:Reportes:index.html.twig');
    }

    /**
     * Reporte de mascotas registradas en un rango de fechas
     */
    public function mascotasExportarAction(Request $request)
    {
        $data = $this->getDataMascotas($request);
        $html = $this->renderView('PDF/reportes/mascotas.html.twig', array('data'  => $data));
        $filename = "mascotas";
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
    public function radicadosExportarAction(Request $request)
    {
        $data = $this->getDataRadicados($request);
        $html = $this->renderView('PDF/reportes/radicados.html.twig', array('data'  => $data));
        $filename = "radicados";
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
        $html = $this->renderView('PDF/reportes/radicadosestado.html.twig', array('data'  => $data));
        $filename = "radicados por estado";
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
