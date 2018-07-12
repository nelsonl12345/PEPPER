<?php

namespace PPP\CanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use PPP\CanBundle\Entity\Usuario;
use PPP\CanBundle\Entity\Radicado;

class ChecklistType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('archivo1c','choice', array('choices'=> array(
                'Aceptado' => 'Aceptado',
                'Rechazado' => 'Rechazado'
                ), 'placeholder' => 'Seleccione una opcion...'))


                ->add('archivo2c','choice', array('choices'=> array(
                'Aceptado' => 'Aceptado',
                'Rechazado' => 'Rechazado'
                ), 'placeholder' => 'Seleccione una opcion...'))

            ->add('archivo3c','choice', array('choices'=> array(
                'Aceptado' => 'Aceptado',
                'Rechazado' => 'Rechazado'
                ), 'placeholder' => 'Seleccione una opcion...'))

            ->add('comentario')
            /*
            ->add('usuario', EntityType::class, array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=> Usuario::class, // 'PPPCanBundle:Usuario',
                'choice_label' => 'usuario',
                'choice_name' => 'id',
                'choice_value' => 'id',
                ))
            ->add('radicado', EntityType::class, array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=> Radicado::class, // 'PPPCanBundle:Radicado',
                'choice_label' => 'id',
                'choice_name' => 'id',
                'choice_value' => 'id',
                ))
                */
            // ->add('usuario', TextType::class)
            // ->add('radicado', TextType::class)



        ->add('enviar', 'submit', array('label' => 'Enviar'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPP\CanBundle\Entity\Checklist'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'checklist';
    }


}
