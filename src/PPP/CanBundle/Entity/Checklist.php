<?php

namespace PPP\CanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checklist
 *
 * @ORM\Table(name="checklists")
 * @ORM\Entity(repositoryClass="PPP\CanBundle\Repository\ChecklistRepository")
 */
class Checklist
{


    /**
    * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="checklists")
    * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $usuario;

    /**
    * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="checklists")
    * @ORM\JoinColumn(name="usuario1c_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $usuario1c;

    /**
    * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="checklists")
    * @ORM\JoinColumn(name="usuario2c_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $usuario2c;

    /**
    * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="checklists")
    * @ORM\JoinColumn(name="usuario3c_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $usuario3c;

    /**
    * @ORM\ManyToOne(targetEntity="Radicado", inversedBy="checklists")
    * @ORM\JoinColumn(name="radicado_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $radicado;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo1c", type="string", length=45)
     */
    private $archivo1c;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo2c", type="string", length=45)
     */
    private $archivo2c;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo3c", type="string", length=45)
     */
    private $archivo3c;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", length=500)
     */
    private $comentario;


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
     * Set archivo1c
     *
     * @param string $archivo1c
     * @return Checklist
     */
    public function setArchivo1c($archivo1c)
    {
        $this->archivo1c = $archivo1c;

        return $this;
    }

    /**
     * Get archivo1c
     *
     * @return string
     */
    public function getArchivo1c()
    {
        return $this->archivo1c;
    }

    /**
     * Set archivo2c
     *
     * @param string $archivo2c
     * @return Checklist
     */
    public function setArchivo2c($archivo2c)
    {
        $this->archivo2c = $archivo2c;

        return $this;
    }

    /**
     * Get archivo2c
     *
     * @return string
     */
    public function getArchivo2c()
    {
        return $this->archivo2c;
    }

    /**
     * Set archivo3c
     *
     * @param string $archivo3c
     * @return Checklist
     */
    public function setArchivo3c($archivo3c)
    {
        $this->archivo3c = $archivo3c;

        return $this;
    }

    /**
     * Get archivo3c
     *
     * @return string
     */
    public function getArchivo3c()
    {
        return $this->archivo3c;
    }


    /**
     * Set usuario1c
     *
     * @param string $usuario1c
     * @return Checklist
     */
    public function setUsuario1c($usuario1c)
    {
        $this->usuario1c = $usuario1c;

        return $this;
    }

    /**
     * Get usuario1c
     *
     * @return string
     */
    public function getUsuario1c()
    {
        return $this->usuario1c;
    }

    /**
     * Set usuario2c
     *
     * @param string $usuario2c
     * @return Checklist
     */
    public function setUsuario2c($usuario2c)
    {
        $this->usuario2c = $usuario2c;

        return $this;
    }

    /**
     * Get usuario2c
     *
     * @return string
     */
    public function getUsuario2c()
    {
        return $this->usuario2c;
    }

    /**
     * Set usuario3c
     *
     * @param string $usuario3c
     * @return Checklist
     */
    public function setUsuario3c($usuario3c)
    {
        $this->usuario3c = $usuario3c;

        return $this;
    }

    /**
     * Get usuario3c
     *
     * @return string
     */
    public function getUsuario3c()
    {
        return $this->usuario3c;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Checklist
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set usuario
     *
     * @param \PPP\CanBundle\Entity\Usuario $usuario
     * @return Checklist
     */
    public function setUsuario(\PPP\CanBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \PPP\CanBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set radicado
     *
     * @param \PPP\CanBundle\Entity\Radicado $radicado
     * @return Checklist
     */
    public function setRadicado(\PPP\CanBundle\Entity\Radicado $radicado = null)
    {
        $this->radicado = $radicado;

        return $this;
    }

    /**
     * Get radicado
     *
     * @return \PPP\CanBundle\Entity\Radicado
     */
    public function getRadicado()
    {
        return $this->radicado;
    }

    public function someFileApproved()
    {
        if ($this->getArchivo1c() === 'Aprobado' ||
            $this->getArchivo2c() === 'Aprobado' ||
            $this->getArchivo3c() === 'Aprobado'
        ) {
            return true;
        }
        return false;
    }

    public function someFileRejected()
    {
        if ($this->getArchivo1c() === 'Rechazado' ||
            $this->getArchivo2c() === 'Rechazado' ||
            $this->getArchivo3c() === 'Rechazado'
        ) {
            return true;
        }
        return false;
    }

    public function allFileApproved()
    {
        if ($this->getArchivo1c() === 'Aprobado' &&
            $this->getArchivo2c() === 'Aprobado' &&
            $this->getArchivo3c() === 'Aprobado'
        ) {
            return true;
        }
        return false;
    }

    public function allFileRejected()
    {
        if ($this->getArchivo1c() === 'Rechazado' &&
            $this->getArchivo2c() === 'Rechazado' &&
            $this->getArchivo3c() === 'Rechazado'
        ) {
            return true;
        }
        return false;
    }
}
