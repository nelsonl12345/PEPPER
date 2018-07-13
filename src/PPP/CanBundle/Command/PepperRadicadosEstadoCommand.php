<?php

namespace PPP\CanBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Carbon\Carbon;

class PepperRadicadosEstadoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('pepper:radicados:estado')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        Carbon::macro('isHoliday', function () {
            return in_array([ $this->month, $this->day ], [
                [1, 1], // 1 de enero: Año Nuevo
                [1, 8], // 8 de enero: Día de los Reyes Magos
                [3, 19], // 19 de marzo: Día de San José
                [3, 29], // 29 de marzo: Jueves Santo (Semana Santa)
                [3, 30], // 30 de marzo: Viernes Santo (Semana Santa)
                [5, 1], // 1 de mayo: Día del Trabajo
                [5, 14], // 14 de mayo: Día de la Ascensión
                [6, 4], // 4 de junio: Corpus Christi
                [6, 11], // 11 de junio: Sagrado Corazón
                [7, 2], // 2 de Julio: San Pedro y San Pablo
                [7, 20], // 20 de julio: Día de la Independencia
                [8, 7], // 7  de agosto: Batalla de Boyaca
                [8, 20], // 20 de agosto: La asunción de la Virgen
                [10, 15], // 15 de octubre: Día de la raza
                [11, 5], // 5 de noviembre: Día de Todos los Santos
                [11, 12], // 12 de noviembre: Independencia de Cartagena
                [11, 8], // 8 de diciembre: Día de la Inmaculada Concepción
                [11, 25], // 25 de diciembre: Navidad
            ]);
        });
        $container = $this->getContainer();
        $em = $container->get('doctrine')->getManager();
        $records = $em->getRepository("PPPCanBundle:Radicado")->findAll();

        foreach ($records as $radicado) {
            $fechaInicial = Carbon::instance($radicado->getCreatedAtradi());
            $hoy = $carbon = Carbon::now();

            $diffDays = $fechaInicial->diffInDaysFiltered(function (Carbon $date) {
                $notIsHoliday = !$date->isHoliday();
                $notIsWeekend = !$date->isWeekend();
                return $notIsWeekend && $notIsHoliday;
            }, $hoy);
            if ($diffDays >= 8) {
                if ($radicado->getEstado() !== "Rechazado") {
                    $radicado->setEstado("Rechazado");
                    $checklist = $radicado->getChecklist();
                    if ($checklist) {
                        $checklist->setComentario('Han pasado 8 dias habiles desde la radicacion y no se ha completado el proceso');
                        $em->persist($checklist);

                        $checklist->setArchivo1c("Rechazado");
                        $checklist->setArchivo2c("Rechazado");
                        $checklist->setArchivo3c("Rechazado");

                        $checklist->setUsuario1c(null);
                        $checklist->setUsuario2c(null);
                        $checklist->setUsuario3c(null);
                    }
                    $em->persist($radicado);
                    $em->flush();

                    $message = (new \Swift_Message('Estado de radicado'))
                        ->setFrom('proyectopepper@gmail.com')
                        ->setTo($radicado->getMascota()->getUsuario()->getCorreo())
                        ->setBody(
                            $container->get('templating')->render(
                                'Emails/radicado.html.twig',
                                array('radicado' => $radicado)
                            ),
                            'text/html'
                        );

                    $container->get('mailer')->send($message);
                }
            }
        }

        $output->writeln('count '. count($records));
    }
}
