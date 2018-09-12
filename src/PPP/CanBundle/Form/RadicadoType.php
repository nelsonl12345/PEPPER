<?php

namespace PPP\CanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Doctrine\ORM\EntityRepository;

class RadicadoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('archivo1', 'file', array('data_class' => null))
            ->add('archivo2', 'file', array('data_class' => null))
            ->add('archivo3', 'file', array('data_class' => null))
            ->add('estado')
            

            ->add('mascota', 'entity', array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=>'PPPCanBundle:Mascota',                
                'choice_label' => 'nombresm'
                ))  

            
            /**
            ->add('mascota', 'entity', array(
                'class' => 'PPPCanBundle:Mascota',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                              ->join('m.usuario', 'u')
                              ->where('u.id = :usuario_id')
                              ->setParameter('usuario_id', 'app.usuario.id');
                        
                },
                'choice_label' => 'nombresm'
            ))
            **/


            
            /**
            ->add('mascota', 'entity', array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=>'PPPCanBundle:Mascota',
                 'query_builder'=>function(EntityRepository $er){                    
                        $er
                        ->select('m.id, m.nombresm, p.apellidos, p.nombres')
                        ->from('PPPCanBundle:Mascota')
                        ->innerJoin('m.usuario', 'p')
                        ->setParameter('nombresm', $nombresm)
                        ->orderBy('m.nombresm','ASC')
 
                }
 
                'choice_label' => 'nombresm'
                ))﻿
                **/

            ->add('save', 'submit', array('label' => 'Registrar solicitud'));                               


    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPP\CanBundle\Entity\Radicado'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'radicado';
    }


}
