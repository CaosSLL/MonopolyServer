<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partida
 *
 * @ORM\Table(name="partida", indexes={@ORM\Index(name="id_jugador_turno", columns={"id_jugador_turno"})})
 * @ORM\Entity(repositoryClass="Caos\MonopolyBundle\Entity\Repository\PartidaRepository")
 */
class Partida
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="bote_comun", type="integer", nullable=false)
     */
    private $boteComun = '0';

    /**
     * @var \Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jugador_turno", referencedColumnName="id")
     * })
     */
    private $idJugadorTurno;



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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Partida
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set boteComun
     *
     * @param integer $boteComun
     * @return Partida
     */
    public function setBoteComun($boteComun)
    {
        $this->boteComun = $boteComun;

        return $this;
    }

    /**
     * Get boteComun
     *
     * @return integer 
     */
    public function getBoteComun()
    {
        return $this->boteComun;
    }

    /**
     * Set idJugadorTurno
     *
     * @param \Caos\MonopolyBundle\Entity\Jugador $idJugadorTurno
     * @return Partida
     */
    public function setIdJugadorTurno(\Caos\MonopolyBundle\Entity\Jugador $idJugadorTurno = null)
    {
        $this->idJugadorTurno = $idJugadorTurno;

        return $this;
    }

    /**
     * Get idJugadorTurno
     *
     * @return \Caos\MonopolyBundle\Entity\Jugador 
     */
    public function getIdJugadorTurno()
    {
        return $this->idJugadorTurno;
    }
}
