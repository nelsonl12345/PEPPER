<?php

namespace PPP\CanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Mascota
 *
 * @ORM\Table(name="mascotas")
 * @ORM\Entity(repositoryClass="PPP\CanBundle\Repository\MascotaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Mascota
{

    /**
    * @ORM\OneToMany(targetEntity="Radicado", mappedBy="mascota")
    */
    protected $radicados;


    /**
    * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="mascotas")
    * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", onDelete="CASCADE")
    * @Assert\NotBlank()    
    */
    protected $usuario;

    /**
    * @ORM\ManyToOne(targetEntity="Raza", inversedBy="mascotas")
    * @ORM\JoinColumn(name="raza_id", referencedColumnName="id", onDelete="CASCADE")
    * @Assert\NotBlank()    
    */
    protected $raza;


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
     * @ORM\Column(name="nombresm", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $nombresm;

    /**
     * @var string
     *
     * @ORM\Column(name="aniom", type="string", length=5)
     * @Assert\NotBlank()
     */
    private $aniom;

    /**
     * @var string
     *
     * @ORM\Column(name="mesm", type="string", length=5)
     * @Assert\NotBlank()
     */
    private $mesm;

    /**
     * @var string
     *
     * @ORM\Column(name="diam", type="string", length=5)
     * @Assert\NotBlank()
     */
    private $diam;


    /**
     * @var string
     *
     * @ORM\Column(name="oficiom", type="string", length=60)
     * @Assert\NotBlank()
     */
    private $oficiom;


    /**
     * @var string
     *
     * @ORM\Column(name="descripcionm", type="text")
     * @Assert\NotBlank()
     */
    private $descripcionm;

    /**
     * @var string
     *
     * @ORM\Column(name="generom", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $generom;

    /**
     * @var string
     *
     * @ORM\Column(name="colorm", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $colorm;

    /**
     * @var string
     *
     * @ORM\Column(name="cual", type="string", length=45)
     */
    private $cual;

    /**
     * @var string
     *
     * @ORM\Column(name="foto1m", type="string", length=50)
     */
    private $foto1m;

    /**
     * @var string
     *
     * @ORM\Column(name="foto2m", type="string", length=50)
     */
    private $foto2m;

    /**
     * @var string
     *
     * @ORM\Column(name="foto3m", type="string", length=50)
     */
    private $foto3m;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_atm", type="datetime")
     */
    private $createdAtm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_atm", type="datetime")
     */
    private $updatedAtm;


    public function __construct()
    {
        $this->radicados = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="estadom", type="string", length=45)
     */
    private $estadom;


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
     * Set nombresm
     *
     * @param string $nombresm
     * @return Mascota
     */
    public function setNombresm($nombresm)
    {
        $this->nombresm = $nombresm;

        return $this;
    }

    /**
     * Get nombresm
     *
     * @return string 
     */
    public function getNombresm()
    {
        return $this->nombresm;
    }

    /**
     * Set aniom
     *
     * @param string $aniom
     * @return Mascota
     */
    public function setAniom($aniom)
    {
        $this->aniom = $aniom;

        return $this;
    }

    /**
     * Get aniom
     *
     * @return string 
     */
    public function getAniom()
    {
        return $this->aniom;
    }


    /**
     * Set mesm
     *
     * @param string $mesm
     * @return Mascota
     */
    public function setMesm($mesm)
    {
        $this->mesm = $mesm;

        return $this;
    }

    /**
     * Get mesm
     *
     * @return string 
     */
    public function getMesm()
    {
        return $this->mesm;
    }

    /**
     * Set diam
     *
     * @param string $diam
     * @return Mascota
     */
    public function setDiam($diam)
    {
        $this->diam = $diam;

        return $this;
    }

    /**
     * Get diam
     *
     * @return string 
     */
    public function getDiam()
    {
        return $this->diam;
    }


    /**
     * Set oficiom
     *
     * @param string $oficiom
     * @return Mascota
     */
    public function setOficiom($oficiom)
    {
        $this->oficiom = $oficiom;

        return $this;
    }

    /**
     * Get oficiom
     *
     * @return string 
     */
    public function getOficiom()
    {
        return $this->oficiom;
    }

    /**
     * Set descripcionm
     *
     * @param string $descripcionm
     * @return Mascota
     */
    public function setDescripcionm($descripcionm)
    {
        $this->descripcionm = $descripcionm;

        return $this;
    }

    /**
     * Get descripcionm
     *
     * @return string 
     */
    public function getDescripcionm()
    {
        return $this->descripcionm;
    }

    /**
     * Set generom
     *
     * @param string $generom
     * @return Mascota
     */
    public function setGenerom($generom)
    {
        $this->generom = $generom;

        return $this;
    }

    /**
     * Get generom
     *
     * @return string 
     */
    public function getGenerom()
    {
        return $this->generom;
    }

    /**
     * Set colorm
     *
     * @param string $colorm
     * @return Mascota
     */
    public function setColorm($colorm)
    {
        $this->colorm = $colorm;

        return $this;
    }

    /**
     * Get colorm
     *
     * @return string 
     */
    public function getColorm()
    {
        return $this->colorm;
    }

    /**
     * Set cual
     *
     * @param string $cual
     * @return Mascota
     */
    public function setCual($cual)
    {
        $this->cual = $cual;

        return $this;
    }

    /**
     * Get cual
     *
     * @return string 
     */
    public function getCual()
    {
        return $this->cual;
    }


    /**
     * Set foto1m
     *
     * @param string $foto1m
     * @return Mascota
     */
    public function setFoto1m($foto1m)
    {
        $this->foto1m = $foto1m;

        return $this;
    }

    /**
     * Get foto1m
     *
     * @return string 
     */
    public function getFoto1m()
    {
        return $this->foto1m;
    }

    /**
     * Set foto2m
     *
     * @param string $foto2m
     * @return Mascota
     */
    public function setFoto2m($foto2m)
    {
        $this->foto2m = $foto2m;

        return $this;
    }

    /**
     * Get foto2m
     *
     * @return string 
     */
    public function getFoto2m()
    {
        return $this->foto2m;
    }

    /**
     * Set foto3m
     *
     * @param string $foto3m
     * @return Mascota
     */
    public function setFoto3m($foto3m)
    {
        $this->foto3m = $foto3m;

        return $this;
    }

    /**
     * Get foto3m
     *
     * @return string 
     */
    public function getFoto3m()
    {
        return $this->foto3m;
    }

    /**
     * Set createdAtm
     *
     * @param \DateTime $createdAtm
     * @return Mascota
     */
    public function setCreatedAtm($createdAtm)
    {
        $this->createdAtm = $createdAtm;

        return $this;
    }

    /**
     * Get createdAtm
     *
     * @return \DateTime 
     */
    public function getCreatedAtm()
    {
        return $this->createdAtm;
    }

    /**
     * Set updatedAtm
     *
     * @param \DateTime $updatedAtm
     * @return Mascota
     */
    public function setUpdatedAtm($updatedAtm)
    {
        $this->updatedAtm = $updatedAtm;

        return $this;
    }

    /**
     * Get updatedAtm
     *
     * @return \DateTime 
     */
    public function getUpdatedAtm()
    {
        return $this->updatedAtm;
    }

    /**
     * Set estadom
     *
     * @param string $estadom
     * @return Mascota
     */
    public function setEstadom($estadom)
    {
        $this->estadom = $estadom;

        return $this;
    }

    /**
     * Get estadom
     *
     * @return string 
     */
    public function getEstadom()
    {
        return $this->estadom;
    }



    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtmValue()
    {
        $this->createdAtm = new\DateTime(); 
    }

    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */

    public function setUpdatedAtmValue()
    {
        $this->updatedAtm = new \DateTime();
    }



    /**
     * Set raza
     *
     * @param \PPP\CanBundle\Entity\Raza $raza
     * @return Mascota
     */
    public function setRaza(\PPP\CanBundle\Entity\Raza $raza = null)
    {
        $this->raza = $raza;

        return $this;
    }

    /**
     * Get raza
     *
     * @return \PPP\CanBundle\Entity\Raza 
     */
    public function getRaza()
    {
        return $this->raza;
    }



    /**
     * Add radicados
     *
     * @param \PPP\CanBundle\Entity\Radicado $radicados
     * @return Mascota
     */
    public function addRadicado(\PPP\CanBundle\Entity\Radicado $radicados)
    {
        $this->radicados[] = $radicados;

        return $this;
    }

    /**
     * Remove radicados
     *
     * @param \PPP\CanBundle\Entity\Radicado $radicados
     */
    public function removeRadicado(\PPP\CanBundle\Entity\Radicado $radicados)
    {
        $this->radicados->removeElement($radicados);
    }

    /**
     * Get radicados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRadicados()
    {
        return $this->radicados;
    }

    /**
     * Set usuario
     *
     * @param \PPP\CanBundle\Entity\Usuario $usuario
     * @return Mascota
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
}
