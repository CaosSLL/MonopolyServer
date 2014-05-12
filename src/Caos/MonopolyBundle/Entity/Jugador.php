<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador", indexes={@ORM\Index(name="id_partida", columns={"id_partida"}), @ORM\Index(name="id_usuario", columns={"id_usuario"}), @ORM\Index(name="id_personaje", columns={"id_personaje"})})
 * @ORM\Entity(repositoryClass="Caos\MonopolyBundle\Entity\Repository\JugadorRepository")
 */
class Jugador
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
     * @var integer
     *
     * @ORM\Column(name="posicion", type="integer", nullable=false)
     */
    private $posicion;

    /**
     * @var integer
     *
     * @ORM\Column(name="dinero", type="integer", nullable=false)
     */
    private $dinero = '1500';

    /**
     * @var integer
     *
     * @ORM\Column(name="carcel", type="integer", nullable=false)
     */
    private $carcel = '0';

    /**
     * @var \Partida
     *
     * @ORM\ManyToOne(targetEntity="Partida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partida", referencedColumnName="id")
     * })
     */
    private $partida;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Personaje
     *
     * @ORM\ManyToOne(targetEntity="Personaje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personaje", referencedColumnName="id")
     * })
     */
    private $personaje;



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
     * Set posicion
     *
     * @param integer $posicion
     * @return Jugador
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return integer 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set dinero
     *
     * @param integer $dinero
     * @return Jugador
     */
    public function setDinero($dinero)
    {
        $this->dinero = $dinero;

        return $this;
    }

    /**
     * Get dinero
     *
     * @return integer 
     */
    public function getDinero()
    {
        return $this->dinero;
    }

    /**
     * Set carcel
     *
     * @param integer $carcel
     * @return Jugador
     */
    public function setCarcel($carcel)
    {
        $this->carcel = $carcel;

        return $this;
    }

    /**
     * Get carcel
     *
     * @return integer 
     */
    public function getCarcel()
    {
        return $this->carcel;
    }

    /**
     * Set partida
     *
     * @param \Caos\MonopolyBundle\Entity\Partida $partida
     * @return Jugador
     */
    public function setPartida(\Caos\MonopolyBundle\Entity\Partida $partida = null)
    {
        $this->partida = $partida;

        return $this;
    }

    /**
     * Get partida
     *
     * @return \Caos\MonopolyBundle\Entity\Partida 
     */
    public function getPartida()
    {
        return $this->partida;
    }

    /**
     * Set usuario
     *
     * @param \Caos\MonopolyBundle\Entity\Usuario $usuario
     * @return Jugador
     */
    public function setUsuario(\Caos\MonopolyBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Caos\MonopolyBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set personaje
     *
     * @param \Caos\MonopolyBundle\Entity\Personaje $personaje
     * @return Jugador
     */
    public function setPersonaje(\Caos\MonopolyBundle\Entity\Personaje $personaje = null)
    {   
        $this->personaje = $personaje;

        return $this;
    }

    /**
     * Get personaje
     *
     * @return \Caos\MonopolyBundle\Entity\Personaje 
     */
    public function getPersonaje()
    {
        return $this->personaje;
    }
}
