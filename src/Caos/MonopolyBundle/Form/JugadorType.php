<?php

namespace Caos\MonopolyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JugadorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('posicion')
            ->add('dinero')
            ->add('carcel')
            ->add('idPartida')
            ->add('idUsuario')
            ->add('idPersonaje')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caos\MonopolyBundle\Entity\Jugador'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caos_monopolybundle_jugador';
    }
}
