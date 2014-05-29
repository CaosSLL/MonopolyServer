<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="Caos\MonopolyBundle\Entity\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=35, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="partidas_jugadas", type="integer", nullable=false)
     */
    private $partidasJugadas = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="partidas_ganadas", type="integer", nullable=false)
     */
    private $partidasGanadas = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=false)
     */
    private $estado = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=20, nullable=false)
     */
    private $rol;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set partidasJugadas
     *
     * @param integer $partidasJugadas
     * @return Usuario
     */
    public function setPartidasJugadas($partidasJugadas)
    {
        $this->partidasJugadas = $partidasJugadas;

        return $this;
    }

    /**
     * Get partidasJugadas
     *
     * @return integer 
     */
    public function getPartidasJugadas()
    {
        return $this->partidasJugadas;
    }

    /**
     * Set partidasGanadas
     *
     * @param integer $partidasGanadas
     * @return Usuario
     */
    public function setPartidasGanadas($partidasGanadas)
    {
        $this->partidasGanadas = $partidasGanadas;

        return $this;
    }

    /**
     * Get partidasGanadas
     *
     * @return integer 
     */
    public function getPartidasGanadas()
    {
        return $this->partidasGanadas;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Usuario
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set rol
     *
     * @param string $rol
     * @return Usuario
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol()
    {
        return $this->rol;
    }
}
