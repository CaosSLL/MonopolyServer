<?php

namespace Caos\MonopolyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PosesionCasillaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numCabania')
            ->add('hipotecada')
            ->add('idPartida')
            ->add('idJugador')
            ->add('idCasilla')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Caos\MonopolyBundle\Entity\PosesionCasilla'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'caos_monopolybundle_posesioncasilla';
    }
}
