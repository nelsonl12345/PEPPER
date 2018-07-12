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
    public function mascotasAction(Request $request)
    {
        return $this->render('PPPCanBundle:Reportes:index.html.twig');
    }

    /**
     * Reporte de los radicados por estado en un rango de fechas
     */
    public function radicadosAction(Request $request)
    {
        return $this->render('PPPCanBundle:Reportes:index.html.twig');
    }

    public function radicadosEntreAction(Request $request)
    {
        $start_date = $request->query->get('start_date');
        $end_date = $request->query->get('end_date');

        $repository = $this->getDoctrine()->getRepository('PPPCanBundle:Radicado');

        $qBase = $repository->createQueryBuilder('n')
            ->where('n.estado = :estado')
            ->andWhere('n.createdAtradi > :start_date')
            ->andWhere('n.createdAtradi < :end_date')
            ->select('count(n.id)')
            ->setParameter('start_date', $start_date)
            ->setParameter('end_date', $end_date);

        $qRadicados = clone $qBase;
        $qAprobados = clone $qBase;
        $qRechazados = clone $qBase;

         $cRadicados = $qRadicados
            ->setParameter('estado', 'Radicado')
            ->getQuery()
            ->getSingleScalarResult();

        $cAprobado = $qAprobados
            ->setParameter('estado', 'Aprobado')
            ->getQuery()
            ->getSingleScalarResult();

        $cRechazados = $qRechazados
            ->setParameter('estado', 'Rechazado')
            ->getQuery()
            ->getSingleScalarResult();

        $data = [
            'config' => [
                "start_date" => $start_date,
                "end_date" => $end_date
            ],
            "result" => [
                [
                    'cantidad' => $cRadicados,
                    'nombre' => 'radicados'
                ],
                [
                    'cantidad' => $cAprobado,
                    'nombre' => 'aprobado'
                ],
                [
                    'cantidad' => $cRechazados,
                    'nombre' => 'rechazados'
                ]
            ]
        ];

        return new JsonResponse($data);
    }

}
