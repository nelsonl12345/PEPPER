<?php

namespace PPP\CanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('identificacion')
            ->add('nombres')
            ->add('apellidos')
            ->add('correo','email')
            ->add('telefono')
            ->add('direccion')


            ->add('barrio','choice', array('choices'=> array(
                'Acacias' => 'Acacias', 
                'Acapulco' => 'Acapulco',
                'Aguablanca' => 'Aguablanca',
                'Alcatraz' => 'Alcatraz',
                'Algarrobos etapa 3' => 'Algarrobos etapa 3',
                'Algarrobos etapa 4' => 'Algarrobos etapa 4',
                'Alicante' => 'Alicante',
                'Alto de la cruz' => 'Alto de la cruz',
                'Alto de la rosas' => 'Alto de la rosas',
                'Alto del rosario' => 'Alto del rosario',
                'Altos del chicala' => 'Altos del chicala',
                'Altos del peñon' => 'Altos del peñon',
                'Arrayanes' => 'Arrayanes',
                'Balcones' => 'Balcones',
                'Barzalosa cementerio' => 'Barzalosa cementerio',
                'Barzalosa centro' => 'Barzalosa centro',
                'Bavaria' => 'Bavaria',
                'Bello horizonte' => 'Bello horizonte',
                'Berlin ' => 'Berlin ',
                'Blanco' => 'Blanco',
                'Bocas del bogota' => 'Bocas del bogota',
                'Bogota' => 'Bogota',
                'Bosques del norte' => 'Bosques del norte',
                'Brisas de girardot' => 'Brisas de girardot',
                'Brisas del bogota' => 'Brisas del bogota',
                'Buenos aires' => 'Buenos aires',
                'Cambulos etapa 1' => 'Cambulos etapa 1',
                'Cambulos etapa 2' => 'Cambulos etapa 2',
                'Cambulos etapa 3' => 'Cambulos etapa 3',
                'Cedro villa olarte' => 'Cedro villa olarte',
                'Centenario ' => 'Centenario ',
                'Centro' => 'Centro',
                'Ciudad montes' => 'Ciudad montes',
                'Condominio montaña' => 'Condominio montaña',
                'Corazon de cundinamarca' => 'Corazon de cundinamarca',
                'Corozo' => 'Corozo',
                'Diamante central' => 'Diamante central',
                'Diamante etapa 5' => 'Diamante etapa 5',
                'Diamante nororiental' => 'Diamante nororiental',
                'Diez de mayo ' => 'Diez de mayo ',
                'Divino niño' => 'Divino niño',
                'El cedrito' => 'El cedrito',
                'El cedro' => 'El cedro',
                'El eden' => 'El eden',
                'El nogal' => 'El nogal',
                'El paraiso' => 'El paraiso',
                'El peñon' => 'El peñon',
                'El portal de los almendros' => 'El portal de los almendros',
                'El portal de los cauchos ' => 'El portal de los cauchos ',
                'El porvenir' => 'El porvenir',
                'El refugio' => 'El refugio',
                'El triunfo' => 'El triunfo',
                'Esmeralda 1 sector' => 'Esmeralda 1 sector',
                'Esmeralda etapa 2' => 'Esmeralda etapa 2',
                'Esmeralda etapa 3' => 'Esmeralda etapa 3',
                'Esperanza norte' => 'Esperanza norte',
                'Estacion' => 'Estacion',
                'Gaitan' => 'Gaitan',
                'Girasol' => 'Girasol',
                'Golgota' => 'Golgota',
                'Graduales' => 'Graduales',
                'Granada' => 'Granada',
                'Guabinal cerro' => 'Guabinal cerro',
                'Guabinal plan' => 'Guabinal plan',
                'Guadalquivir' => 'Guadalquivir',
                'Juan pablo 2' => 'Juan pablo 2',
                'Kennedy' => 'Kennedy',
                'Kennedy III sector' => 'Kennedy III sector',
                'La campiña' => 'La campiña',
                'La carolina' => 'La carolina',
                'La cuarenta' => 'La cuarenta',
                'La magdala' => 'La magdala',
                'La magdalena' => 'La magdalena',
                'La tatiana' => 'La tatiana',
                'La trinitaria' => 'La trinitaria',
                'La victoria' => 'La victoria',
                'Lagos del peñon ' => 'Lagos del peñon ',
                'Las mercedes' => 'Las mercedes',
                'Las quintas' => 'Las quintas',
                'Los almendros' => 'Los almendros',
                'Los bungabiles' => 'Los bungabiles',
                'Los mangos' => 'Los mangos',
                'Los naranjos' => 'Los naranjos',
                'Los prados I sector' => 'Los prados I sector',
                'Los rosales' => 'Los rosales',
                'Luis carlos galan' => 'Luis carlos galan',
                'Madeira' => 'Madeira',
                'Madrigal' => 'Madrigal',
                'Magdalena III' => 'Magdalena III',
                'Meneses' => 'Meneses',
                'Mi futuro' => 'Mi futuro',
                'Miraflores' => 'Miraflores',
                'Murillo toro' => 'Murillo toro',
                'Nuestra señora del carmen' => 'Nuestra señora del carmen',
                'Obrero' => 'Obrero',
                'Palmeras del norte' => 'Palmeras del norte',
                'Parque central' => 'Parque central',
                'Parques B. del bogota' => 'Parques B. del bogota',
                'Parques de andalucia' => 'Parques de andalucia',
                'Piamonte' => 'Piamonte',
                'Potrerillo' => 'Potrerillo',
                'Pozo azul' => 'Pozo azul',
                'Presidente' => 'Presidente',
                'Primero de enero' => 'Primero de enero',
                'Puerto cabrera' => 'Puerto cabrera',
                'Puerto mongui' => 'Puerto mongui',
                'Puerto montero' => 'Puerto montero',
                'Quinto patio' => 'Quinto patio',
                'Ramon bueno' => 'Ramon bueno',
                'Rosablanca' => 'Rosablanca',
                'Rosablanca 2 sector' => 'Rosablanca 2 sector',
                'Salsipuedes' => 'Salsipuedes',
                'San antonio' => 'San antonio',
                'San fernando ' => 'San fernando ',
                'San jorge' => 'San jorge',
                'San lorenzo' => 'San lorenzo',
                'San luis' => 'San luis',
                'San miguel' => 'San miguel',
                'Santa fe ' => 'Santa fe ',
                'Santa helena' => 'Santa helena',
                'Santa isabel' => 'Santa isabel',
                'Santa lucia' => 'Santa lucia',
                'Santa maria del peñon' => 'Santa maria del peñon',
                'Santa monica' => 'Santa monica',
                'Santa paula' => 'Santa paula',
                'santa paula resort II' => 'santa paula resort II',
                'Santa rita' => 'Santa rita',
                'Santander' => 'Santander',
                'Solaris' => 'Solaris',
                'Sucre' => 'Sucre',
                'Talisman' => 'Talisman',
                'Tejares del norte' => 'Tejares del norte',
                'Urbanizacion hacienda de girardot' => 'Urbanizacion hacienda de girardot',
                'Urbanizacion hacienda de girardot etapa 2' => 'Urbanizacion hacienda de girardot etapa 2',
                'Urbanizacion tocarema' => 'Urbanizacion tocarema',
                'Urbanizacion villa cecilia' => 'Urbanizacion villa cecilia',
                'Viente de julio' => 'Viente de julio',
                'Villa kennedy' => 'Villa kennedy',
                'Villa olarte' => 'Villa olarte',
                'Villa paola' => 'Villa paola',
                'Villa yaneth' => 'Villa yaneth',
                'Villan alexander' => 'Villan alexander',
                'Villanpis' => 'Villanpis',
                'Vivisol' => 'Vivisol',
                'Volver a vivir 1' => 'Volver a vivir 1',
                'Volver a vivir 2' => 'Volver a vivir 2',
                'Zarzuela' => 'Zarzuela'

                ), 'placeholder' => 'Seleccione una opcion...'))            



            ->add('ocupacion')
            ->add('usuario')            
            ->add('contrasena','password')
               
            ->add('role','choice', array('choices'=> array('ROLE_JEFE_DEPARTAMENTO' => 'Jefe departamento', 'ROLE_COORDINADOR' => 'Coordinador', 'ROLE_ZOOTECNISTA' => 'Zootecnista'), 'placeholder' => 'Seleccione una opcion...'))


            /**
            ->add('role', 'entity', array(
                'placeholder' => 'Seleccione una opcion...',
                'class'=>'PPPCanBundle:Usuario',
                 'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->where('u.role != :role')
                        ->setParameter(':role', 'ROLE_PROPIETARIO');                                                                                            
                },

                'choice_label' => 'getRole'

                ))**/
            ->add('foto', 'file', array('data_class' => null))            
            //->add('imgcedula', 'file', array('data_class' => null))            
            ->add('isActive','checkbox')
            ->add('save','submit', array('label' => 'Save User'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPP\CanBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */

    /**public function getBlockPrefix()
    {
        return 'ppp_canbundle_usuario';
    }**/

    public function getName()
    {
        return 'usuario';
    }


}
