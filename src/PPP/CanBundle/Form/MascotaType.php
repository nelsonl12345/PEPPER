<?php

namespace PPP\CanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use PPP\CanBundle\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MascotaType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombresm')
            ->add('estadom','choice', array('choices'=> array('Vivo' => 'Vivo', 'Fallecido' => 'Fallecido')))

            ->add('aniom','choice', array('choices'=> array(
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
                '30' => '30'
                ), 'placeholder' => 'Años...'))

            ->add('mesm','choice', array('choices'=> array(
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
                '40' => '40'
                ), 'placeholder' => 'Meses...'))            


            ->add('diam','choice', array('choices'=> array(
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
                '30' => '30'
                ), 'placeholder' => 'Dias...'))            

            ->add('oficiom','choice', array('choices'=> array(
                'Perro de busqueda y rescate' => 'Perro de busqueda y rescate', 
                'Perro de deteccion' => 'Perro de deteccion',
                'Perro de terapia' => 'Perro de terapia', 
                'Perro asistencial' => 'Perro asistencial',
                'Perro policia' => 'Perro policia',
                'Perro de pastoreo' => 'Perro de pastoreo',
                'Perro guia' => 'Perro guia',
                'Perro de hogar' => 'Perro de hogar',
                'Otro' => 'Otro'
                ), 'placeholder' => 'Selectccione una opcion...'))            

            ->add('descripcionm')
            ->add('generom','choice', array('choices'=> array('MACHO' => 'MACHO', 'HEMBRA' => 'HEMBRA'), 'placeholder' => 'Seleccione una opcion...'))
            
            ->add('colorm','choice', array('choices'=> array(
                'Negro' => 'Negro', 
                'Blanco' => 'Blanco', 
                'Cafe' => 'Cafe', 
                'Gris' => 'Gris', 
                'Mixto' => 'Mixto' 
                ), 'placeholder' => 'Seleccione una opcion...'))            

            ->add('cual')


            ->add('foto1m', 'file', array('data_class' => null))
            ->add('foto2m', 'file', array('data_class' => null))
            ->add('foto3m', 'file', array('data_class' => null))
            /**
            ->add('usuario', 'entity', array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=>'PPPCanBundle:Usuario',                
                'choice_label' => 'getFullName'
                ))                
            **/


            ->add('usuario', 'entity', array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=>'PPPCanBundle:Usuario',
                 'query_builder'=>function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.role = :role')
                        ->setParameter(':role', 'ROLE_PROPIETARIO');                                                 
                },

                'choice_label' => 'getFullName'

                ))

                

            //->add('usuario', TextType::class)

            ->add('raza', 'entity', array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=>'PPPCanBundle:Raza',                
                'choice_label' => 'dtalleraza'
                ))                

            ->add('save', 'submit', array('label' => 'Editar mascota'));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPP\CanBundle\Entity\Mascota'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return null;
    }


}
