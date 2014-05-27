<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosesionCasilla
 *
 * @ORM\Table(name="posesion_casilla", indexes={@ORM\Index(name="id_jugador", columns={"id_jugador"}), @ORM\Index(name="id_casilla", columns={"id_casilla"}), @ORM\Index(name="id_partida", columns={"id_partida"})})
 * @ORM\Entity
 */
class PosesionCasilla
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_cabania", type="integer", nullable=false)
     */
    private $numCabania;

    /**
     * @var integer
     *
     * @ORM\Column(name="hipotecada", type="integer", nullable=false)
     */
    private $hipotecada;

    /**
     * @var \Caos\MonopolyBundle\Entity\Partida
     *
     * @ORM\ManyToOne(targetEntity="Caos\MonopolyBundle\Entity\Partida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partida", referencedColumnName="id")
     * })
     */
    private $idPartida;

    /**
     * @var \Caos\MonopolyBundle\Entity\Jugador
     *
     * @ORM\ManyToOne(targetEntity="Caos\MonopolyBundle\Entity\Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jugador", referencedColumnName="id")
     * })
     */
    private $idJugador;

    /**
     * @var \Caos\MonopolyBundle\Entity\Casilla
     *
     * @ORM\ManyToOne(targetEntity="Caos\MonopolyBundle\Entity\Casilla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_casilla", referencedColumnName="id")
     * })
     */
    private $idCasilla;



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
     * Set numCabania
     *
     * @param integer $numCabania
     * @return PosesionCasilla
     */
    public function setNumCabania($numCabania)
    {
        $this->numCabania = $numCabania;

        return $this;
    }

    /**
     * Get numCabania
     *
     * @return integer 
     */
    public function getNumCabania()
    {
        return $this->numCabania;
    }

    /**
     * Set hipotecada
     *
     * @param integer $hipotecada
     * @return PosesionCasilla
     */
    public function setHipotecada($hipotecada)
    {
        $this->hipotecada = $hipotecada;

        return $this;
    }

    /**
     * Get hipotecada
     *
     * @return integer 
     */
    public function getHipotecada()
    {
        return $this->hipotecada;
    }

    /**
     * Set idPartida
     *
     * @param \Caos\MonopolyBundle\Entity\Partida $idPartida
     * @return PosesionCasilla
     */
    public function setIdPartida(\Caos\MonopolyBundle\Entity\Partida $idPartida = null)
    {
        $this->idPartida = $idPartida;

        return $this;
    }

    /**
     * Get idPartida
     *
     * @return \Caos\MonopolyBundle\Entity\Partida 
     */
    public function getIdPartida()
    {
        return $this->idPartida;
    }

    /**
     * Set idJugador
     *
     * @param \Caos\MonopolyBundle\Entity\Jugador $idJugador
     * @return PosesionCasilla
     */
    public function setIdJugador(\Caos\MonopolyBundle\Entity\Jugador $idJugador = null)
    {
        $this->idJugador = $idJugador;

        return $this;
    }

    /**
     * Get idJugador
     *
     * @return \Caos\MonopolyBundle\Entity\Jugador 
     */
    public function getIdJugador()
    {
        return $this->idJugador;
    }

    /**
     * Set idCasilla
     *
     * @param \Caos\MonopolyBundle\Entity\Casilla $idCasilla
     * @return PosesionCasilla
     */
    public function setIdCasilla(\Caos\MonopolyBundle\Entity\Casilla $idCasilla = null)
    {
        $this->idCasilla = $idCasilla;

        return $this;
    }

    /**
     * Get idCasilla
     *
     * @return \Caos\MonopolyBundle\Entity\Casilla 
     */
    public function getIdCasilla()
    {
        return $this->idCasilla;
    }
}
