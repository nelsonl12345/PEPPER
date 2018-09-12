<?php

namespace PPP\CanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AtaqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departamento')            
            ->add('municipio')
            ->add('codigo')
            ->add('subindice')
            ->add('razonsocial')
            ->add('nombreevento')
            ->add('codevento')
            ->add('fechanoti')
            
            ->add('tipodoc','choice', array('choices'=> array(
                'Registro civil' => 'Registro civil', 
                'Tarjeta de identidad' => 'Tarjeta de identidad', 
                'Cedula de ciudadania' => 'Cedula de ciudadania', 
                'Cedula extrangeria' => 'Cedula extrangeria', 
                'Pasaporte' => 'Pasaporte', 
                'Menor sin identidad' => 'Menor sin identidad', 
                'Adulto sin identidad' => 'Adulto sin identidad'
                ), 'placeholder' => 'Selectccione una opcion...'))            



            ->add('numdoc')
            ->add('nombresp')
            ->add('apellidosp')
            ->add('telefonop')
            ->add('fechanacimientop')
            
            ->add('edadp','choice', array('choices'=> array(
                '0' => '0', 
                '1' => '1',
                '2' => '2', 
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20',
                '21' => '21',
                '22' => '22',
                '23' => '23',
                '24' => '24',
                '25' => '26',
                '27' => '28',
                '29' => '29',
                '30' => '30',
                '31' => '31',
                '32' => '32',
                '33' => '33',
                '34' => '34',
                '35' => '35',
                '36' => '37',
                '38' => '38',
                '39' => '39',
                '40' => '40',
                '41' => '41',
                '42' => '42',
                '43' => '43',
                '44' => '44',
                '45' => '45',
                '46' => '46',
                '47' => '47',
                '48' => '48',
                '49' => '49',
                '50' => '50',
                '51' => '51',
                '52' => '52',
                '53' => '53',
                '54' => '54',
                '55' => '55',
                '56' => '56',
                '57' => '57',
                '58' => '59',
                '60' => '60',
                '61' => '61',
                '62' => '62',
                '63' => '63',
                '64' => '64',
                '65' => '65',
                '66' => '67',
                '68' => '68',
                '69' => '69',
                '70' => '70',
                '71' => '71',
                '72' => '72',
                '73' => '73',
                '74' => '74',
                '75' => '75',
                '76' => '76',
                '77' => '77',
                '78' => '78',
                '79' => '79',
                '80' => '80',
                '81' => '81',
                '82' => '82',
                '83' => '83',
                '84' => '84',
                '85' => '85',
                '86' => '86',
                '87' => '87',
                '88' => '88',
                '89' => '89',
                '90' => '90',
                '91' => '91',
                '92' => '92',
                '93' => '93',
                '94' => '94',
                '95' => '95',
                '96' => '96',
                '97' => '97',
                '98' => '98',
                '99' => '99',
                '100' => '100',
                '101' => '101',
                '102' => '102',
                '103' => '103',
                '104' => '104',
                '105' => '105',
                '106' => '106',
                '107' => '107',
                '108' => '108',
                '109' => '109',
                '110' => '110',
                '111' => '111',
                '112' => '112',
                '113' => '113',
                '114' => '114',
                '115' => '115',
                '116' => '116',
                '117' => '117',
                '118' => '118',
                '119' => '119',
                '120' => '120'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('unidadmedida','choice', array('choices'=> array(
                'Años' => 'Años', 
                'Meses' => 'Meses', 
                'Dias' => 'Dias', 
                'Horas' => 'Horas', 
                'Minutos' => 'Minutos' ,
                'No aplica' => 'No aplica' 
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('sexop','choice', array('choices'=> array(
                'Masculino' => 'Masculino', 
                'Femenino' => 'Femenino', 
                'Indeterminado' => 'Indeterminado'
                ), 'placeholder' => 'Selectccione una opcion...'))            



            ->add('paiscaso')
            ->add('departamentoocu')
            ->add('municipioocu')            
            ->add('areacaso','choice', array('choices'=> array(
                'Cabecera municipal' => 'Cabecera municipal', 
                'Centro poblado' => 'Centro poblado', 
                'Rural disperso' => 'Rural disperso'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('localidadcaso')
            ->add('barriocaso')
            ->add('veredaozona')
            ->add('ocupacionpaciente')
            
            ->add('tiporegimen','choice', array('choices'=> array(
                'Excepcion' => 'Excepcion', 
                'Especial' => 'Especial', 
                'Contributivo' => 'Contributivo',
                'Subsidiado' => 'Subsidiado',
                'No asegurado' => 'No asegurado',
                'Indeterminal pendiente' => 'Indeterminal pendiente'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('nombreadmin')
            ->add('codigoadmin')
            
            ->add('etnica','choice', array('choices'=> array(
                'Indigena' => 'Indigena', 
                'Rom gitano' => 'Rom gitano', 
                'Raizal' => 'Raizal',
                'Subsidiado' => 'Subsidiado',
                'Palenquero' => 'Palenquero',
                'Negro, Mulato afro colombiano' => 'Negro, Mulato afro colombiano',
                'Otro' => 'Otro'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('grupopoblacion','choice', array('choices'=> array(
                'Discapacitados' => 'Discapacitados', 
                'Desplazados' => 'Desplazados', 
                'Carcelarios' => 'Carcelarios',
                'Gestantes' => 'Gestantes',
                'Indigenas' => 'Indigenas',
                'Poblacion infantil a cargo del ICBF' => 'Poblacion infantil a cargo del ICBF',
                'Madres comunitarias' => 'Madres comunitarias',
                'Desmovilizados' => 'Desmovilizados',
                'Centros psiquiatricos' => 'Centros psiquiatricos',
                'Victimas de la violencia armada' => 'Victimas de la violencia armada',
                'Otros grupos poblacionales' => 'Otros grupos poblacionales'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('hclinica', 'file')

            ->add('codmuni')


            ->add('departamentopac')            


            ->add('municipiopac')            


            ->add('direccionpac')
            ->add('fechaconsulta')
            ->add('fechasintoma')
               ->add('clasificacioncaso','choice', array('choices'=> array(
                'Sospechoso' => 'Sospechoso', 
                'Probable' => 'Probable', 
                'Conf. Por laboratorio' => 'Conf. Por laboratorio',
                'Conf. clinica' => 'Conf. clinica',
                'Conf. nexo epidemiologico' => 'Conf. nexo epidemiologico'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('hospitalizacion','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No'
                ), 'placeholder' => 'Selectccione una opcion...'))            



            ->add('fechahospit')
            
               ->add('condfinal','choice', array('choices'=> array(
                'Vivo' => 'Vivo', 
                'Muerto' => 'Muerto', 
                'No sabe, no responde' => 'No sabe, no responde'
                ), 'placeholder' => 'Selectccione una opcion...'))            



            ->add('fechadefuncion')
            ->add('numdefuncion')
            ->add('causasmuerte')
            ->add('nombreprofesional')
            ->add('telefonoprofesional')


               ->add('agresion','choice', array('choices'=> array(
                'Casos de agresion por una APTR' => 'Casos de agresion por una APTR', 
                'Caso probable o confirmado de rabia humana' => 'Caso probable o confirmado de rabia humana'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('tipoagresion','choice', array('choices'=> array(
                'Mordedura' => 'Mordedura', 
                'Arazaño o rasguño' => 'Arazaño o rasguño', 
                'Contacto de mucosa o piel lesionada con saliba del agreesor' => 'Contacto de mucosa o piel lesionada con saliba del agreesor', 
                'Contacto de mucosa o piel lesionada, con tejido nervoso, material biologico o secresiones infectadas con virus rabico' => 'Contacto de mucosa o piel lesionada, con tejido nervoso, material biologico o secresiones infectadas con virus rabico', 
                'inhalacion de ambientes cargados o virus rabicos (aerosoles)' => 'inhalacion de ambientes cargados o virus rabicos (aerosoles)', 
                'Transplante de organos o tejidos infectados con virus rabico' => 'Transplante de organos o tejidos infectados con virus rabico'                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('agresionprov','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('tipolesion','choice', array('choices'=> array(
                'Unica' => 'Unica', 
                'Multiple' => 'Multiple'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('profundidad','choice', array('choices'=> array(
                'Superficial' => 'Superficial', 
                'Profunda' => 'Profunda'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('fechaagre')

               ->add('especieagre','choice', array('choices'=> array(
                'Perro' => 'Perro', 
                'Gato' => 'Gato', 
                'Bobino' => 'Bobino', 
                'Equino' => 'Equino', 
                'Porcino' => 'Porcino', 
                'Murcielago' => 'Murcielago', 
                'Zorro' => 'Zorro', 
                'Mico' => 'Mico', 
                'Humano' => 'Humano', 
                'Otros domesticos' => 'Otros domesticos', 
                'Otros silvestres' => 'Otros silvestres', 
                'Obino-caprino' => 'Obino-caprino', 
                'Grandes roedores' => 'Grandes roedores', 
                'Pequeños roedores' => 'Pequeños roedores'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('registrada','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No',
                ), 'placeholder' => 'Seleccione una opcion...'))            

                ->add('propietarioymascota')
                ->add('nombremascota')

               ->add('vacunado','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No',
                'Desconocido' => 'Desconocido'
                ), 'placeholder' => 'Seleccione una opcion...'))            


            ->add('fechavacunacion')
            ->add('nombreprop')
            ->add('direccionprop')
            ->add('telefonoprop')
        
               ->add('estadoanimal','choice', array('choices'=> array(
                'Con signos de rabia' => 'Con signos de rabia', 
                'Sin signos de rabia' => 'Sin signos de rabia',
                'Desconocido' => 'Desconocido'
                ), 'placeholder' => 'Seleccione una opcion...'))            


               ->add('ubicacion','choice', array('choices'=> array(
                'Observable' => 'Observable', 
                'Perdido' => 'Perdido',
                'Muerto' => 'Muerto'
                ), 'placeholder' => 'Seleccione una opcion...'))            


               ->add('exposicion','choice', array('choices'=> array(
                'No exposicion' => 'No exposicion', 
                'Exposicion leve' => 'Exposicion leve',
                'Exposicion grave' => 'Exposicion grave'
                ), 'placeholder' => 'Selectccione una opcion...'))            



               ->add('suero','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No',
                'No sabe' => 'No sabe'
                ), 'placeholder' => 'Selectccione una opcion...'))            

            ->add('fechasuero')
            

               ->add('vacuna','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No',
                'No sabe' => 'No sabe'
                ), 'placeholder' => 'Selectccione una opcion...'))            

            ->add('ndosis')
               ->add('ndosis','choice', array('choices'=> array(
                '1' => '1', 
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('fechaultdosis')

               ->add('lavado','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('sutura','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('ordenosuero','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No'
                ), 'placeholder' => 'Selectccione una opcion...'))            

               ->add('ordenovacuna','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('pruebadiag','choice', array('choices'=> array(
                'IFD' => 'IFD', 
                'Prueba biologica' => 'Prueba biologica',
                'Histopatologia' => 'Histopatologia',
                'Inmunohistoquimica' => 'Inmunohistoquimica'
                ), 'placeholder' => 'Selectccione una opcion...'))            


            ->add('resultado')
               ->add('resultado','choice', array('choices'=> array(
                'Positivo' => 'Positivo', 
                'Negativo' => 'Negativo',
                'Inadecuado' => 'Inadecuado',
                'Pendiente' => 'Pendiente'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('identifcacionvar','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No', 
                'Pendiente' => 'Pendiente'
                ), 'placeholder' => 'Selectccione una opcion...'))            


               ->add('varianteident','choice', array('choices'=> array(
                '1. Uno' => '1. Uno', 
                '3. Tres' => '3. Tres', 
                '4. Cuatro' => '4. Cuatro', 
                '5. Cinco' => '5. Cinco', 
                '8. Ocho' => '8. Ocho', 
                '9. Atipica' => '9. Atipica', 
                '0. Otra' => '0. Otra'
                ), 'placeholder' => 'Selectccione una opcion...'))            

            ->add('cual')
            ->add('fecharesultado')


/**
               ->add('signosysintomas','choice', array('choices'=> array(
                'Si' => 'Si', 
                'No' => 'No', 
                'Pendiente' => 'Pendiente'
                ), 'placeholder' => 'Selectccione una opcion...'))            

**/                


->add('signosysintomas', 'choice', array(
        'expanded' => true,
        'multiple' => true,
        'choices'  => array(
            'Fiebre' => 'Fiebre', 
            'Hiporexia / Inapetencia' => 'Hiporexia / Inapetencia',
            'Cefalea' => 'Cefalea',
            'Vomito' => 'Vomito',
            'Paresias / debilidad muscular' => 'Paresias / debilidad muscular',
            'Parestesias' => 'Parestesias',
            'Disfagia' => 'Disfagia',
            'Odinofagia' => 'Odinofagia',
            'Arreflexia / hiporreflexia' => 'Arreflexia / hiporreflexia',
            'Alucinaciones o delirio de persecucion' => 'Alucinaciones o delirio de persecucion',
            'Expresion de terror' => 'Expresion de terror',
            'Sialorrea' => 'Sialorrea',
            'Aerofobia' => 'Aerofobia',
            'Hidrofobia' => 'Hidrofobia',
            'Tranquilidad alterna con exitacion' => 'Tranquilidad alterna con exitacion',
            'Depresion' => 'Depresion',
            'Hiperexitabilidad' => 'Hiperexitabilidad',
            'Agresividad' => 'Agresividad',
            'Espasmos musculares' => 'Espasmos musculares',
            'Convulsiones' => 'Convulsiones',
            'Paralisis' => 'Paralisis',
            'Crisis respiratoria' => 'Crisis respiratoria',
            'Coma' => 'Coma',
            'Paro cardio respiratorio' => 'Paro cardio respiratorio'
        ),
    ))


->add('save', 'submit', array('label' => 'Enviar'));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPP\CanBundle\Entity\Ataque'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ataque';
    }


}
