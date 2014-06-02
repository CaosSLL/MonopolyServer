<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarjeta
 *
 * @ORM\Table(name="tarjeta")
 * @ORM\Entity(repositoryClass="Caos\MonopolyBundle\Entity\Repository\TarjetaRepository")
 */
class Tarjeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=300, nullable=false)
     */
    private $texto;

    /**
     * @var string
     *
     * @ORM\Column(name="respuestas", type="string", length=300, nullable=true)
     */
    private $respuestas;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficio", type="string", length=100, nullable=true)
     */
    private $beneficio;

    /**
     * @var string
     *
     * @ORM\Column(name="penalizacion", type="string", length=100, nullable=true)
     */
    private $penalizacion;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Tarjeta
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    
        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set respuestas
     *
     * @param string $respuestas
     * @return Tarjeta
     */
    public function setRespuestas($respuestas)
    {
        $this->respuestas = $respuestas;
    
        return $this;
    }

    /**
     * Get respuestas
     *
     * @return string 
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }

    /**
     * Set beneficio
     *
     * @param string $beneficio
     * @return Tarjeta
     */
    public function setBeneficio($beneficio)
    {
        $this->beneficio = $beneficio;
    
        return $this;
    }

    /**
     * Get beneficio
     *
     * @return string 
     */
    public function getBeneficio()
    {
        return $this->beneficio;
    }

    /**
     * Set penalizacion
     *
     * @param string $penalizacion
     * @return Tarjeta
     */
    public function setPenalizacion($penalizacion)
    {
        $this->penalizacion = $penalizacion;
    
        return $this;
    }

    /**
     * Get penalizacion
     *
     * @return string 
     */
    public function getPenalizacion()
    {
        return $this->penalizacion;
    }
}
