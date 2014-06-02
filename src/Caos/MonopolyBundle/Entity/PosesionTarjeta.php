<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosesionTarjeta
 *
 * @ORM\Table(name="posesion_tarjeta", indexes={@ORM\Index(name="id_jugador", columns={"id_jugador"}), @ORM\Index(name="id_tarjeta", columns={"id_tarjeta"}), @ORM\Index(name="id_partida", columns={"id_partida"})})
 * @ORM\Entity(repositoryClass="Caos\MonopolyBundle\Entity\Repository\PosesionTarjetaRepository")
 */
class PosesionTarjeta
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
     * @ORM\Column(name="beneficio", type="string", length=300, nullable=false)
     */
    private $beneficio;

    /**
     * @var \Partida
     *
     * @ORM\ManyToOne(targetEntity="Partida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partida", referencedColumnName="id")
     * })
     */
    private $idPartida;

    /**
     * @var \Tarjeta
     *
     * @ORM\ManyToOne(targetEntity="Tarjeta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tarjeta", referencedColumnName="id")
     * })
     */
    private $idTarjeta;

    /**
     * @var \Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jugador", referencedColumnName="id")
     * })
     */
    private $idJugador;



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
     * Set beneficio
     *
     * @param string $beneficio
     * @return PosesionTarjeta
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
     * Set idPartida
     *
     * @param \Caos\MonopolyBundle\Entity\Partida $idPartida
     * @return PosesionTarjeta
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
     * Set idTarjeta
     *
     * @param \Caos\MonopolyBundle\Entity\Tarjeta $idTarjeta
     * @return PosesionTarjeta
     */
    public function setIdTarjeta(\Caos\MonopolyBundle\Entity\Tarjeta $idTarjeta = null)
    {
        $this->idTarjeta = $idTarjeta;
    
        return $this;
    }

    /**
     * Get idTarjeta
     *
     * @return \Caos\MonopolyBundle\Entity\Tarjeta 
     */
    public function getIdTarjeta()
    {
        return $this->idTarjeta;
    }

    /**
     * Set idJugador
     *
     * @param \Caos\MonopolyBundle\Entity\Jugador $idJugador
     * @return PosesionTarjeta
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
}
