<?php

namespace PPP\CanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ->add('usuario', TextType::class)
            ->add('radicado', TextType::class)
            


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
