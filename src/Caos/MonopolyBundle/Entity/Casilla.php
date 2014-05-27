<?php

namespace Caos\MonopolyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casilla
 *
 * @ORM\Table(name="casilla")
 * @ORM\Entity(repositoryClass="Caos\MonopolyBundle\Entity\Repository\CasillaRepository")
 */
class Casilla
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio", type="integer", nullable=false)
     */
    private $precio;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio_alquiler", type="integer", nullable=true)
     */
    private $precioAlquiler;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio_cabania", type="integer", nullable=true)
     */
    private $precioCabania;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio_hipoteca", type="integer", nullable=true)
     */
    private $precioHipoteca;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=30, nullable=false)
     */
    private $tipo;



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
     * @return Casilla
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
     * Set numero
     *
     * @param integer $numero
     * @return Casilla
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     * @return Casilla
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set precioAlquiler
     *
     * @param integer $precioAlquiler
     * @return Casilla
     */
    public function setPrecioAlquiler($precioAlquiler)
    {
        $this->precioAlquiler = $precioAlquiler;

        return $this;
    }

    /**
     * Get precioAlquiler
     *
     * @return integer 
     */
    public function getPrecioAlquiler()
    {
        return $this->precioAlquiler;
    }

    /**
     * Set precioCabania
     *
     * @param integer $precioCabania
     * @return Casilla
     */
    public function setPrecioCabania($precioCabania)
    {
        $this->precioCabania = $precioCabania;

        return $this;
    }

    /**
     * Get precioCabania
     *
     * @return integer 
     */
    public function getPrecioCabania()
    {
        return $this->precioCabania;
    }

    /**
     * Set precioHipoteca
     *
     * @param integer $precioHipoteca
     * @return Casilla
     */
    public function setPrecioHipoteca($precioHipoteca)
    {
        $this->precioHipoteca = $precioHipoteca;

        return $this;
    }

    /**
     * Get precioHipoteca
     *
     * @return integer 
     */
    public function getPrecioHipoteca()
    {
        return $this->precioHipoteca;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Casilla
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
