<?php

namespace PPP\CanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Radicado
 *
 * @ORM\Table(name="radicados")
 * @ORM\Entity(repositoryClass="PPP\CanBundle\Repository\RadicadoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Radicado
{

    /**
    * @ORM\ManyToOne(targetEntity="Mascota", inversedBy="radicado")
    * @ORM\JoinColumn(name="mascota_id", referencedColumnName="id", onDelete="CASCADE")
    * @Assert\NotBlank()
    */
    protected $mascota;


    /**
    * @ORM\OneToMany(targetEntity="Checklist", mappedBy="radicado")
    */
    protected $checklists;

    /**
    * @ORM\OneToOne(targetEntity="Checklist", mappedBy="radicado")
    */
    protected $checklist;


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
     * @ORM\Column(name="archivo1", type="string", length=50)
     * @Assert\File(
     *     maxSize = "1024k",
     *     maxSizeMessage = "El archivo no puede ser mayor a 1024 kilobytes"
     * )     
     * @Assert\NotBlank()
     */
    private $archivo1;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo2", type="string", length=50, nullable=true)
     * @Assert\File(
     *     maxSize = "1024k",
     *     maxSizeMessage = "El archivo no puede ser mayor a 1024 kilobytes"
     * )     
     */
    private $archivo2;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo3", type="string", length=50)
     * @Assert\File(
     *     maxSize = "1024k",
     *     maxSizeMessage = "El archivo no puede ser mayor a 1024 kilobytes"
     * )     
     * @Assert\NotBlank()
     */
    private $archivo3;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $estado;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_atradi", type="datetimetz")
     */
    private $createdAtradi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_atradi", type="datetimetz")
     */
    private $updatedAtradi;


 public function __toString(){
        return $this->archivo1;
    }


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
     * Set archivo1
     *
     * @param string $archivo1
     * @return Radicado
     */
    public function setArchivo1($archivo1)
    {
        $this->archivo1 = $archivo1;

        return $this;
    }

    /**
     * Get archivo1
     *
     * @return string
     */
    public function getArchivo1()
    {
        return $this->archivo1;
    }

    /**
     * Set archivo2
     *
     * @param string $archivo2
     * @return Radicado
     */
    public function setArchivo2($archivo2)
    {
        $this->archivo2 = $archivo2;

        return $this;
    }

    /**
     * Get archivo2
     *
     * @return string
     */
    public function getArchivo2()
    {
        return $this->archivo2;
    }

    /**
     * Set archivo3
     *
     * @param string $archivo3
     * @return Radicado
     */
    public function setArchivo3($archivo3)
    {
        $this->archivo3 = $archivo3;

        return $this;
    }

    /**
     * Get archivo3
     *
     * @return string
     */
    public function getArchivo3()
    {
        return $this->archivo3;
    }


    /**
     * Set estado
     *
     * @param string $estado
     * @return Radicado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }


    /**
     * Set createdAtradi
     *
     * @param \DateTime $createdAtradi
     * @return Radicado
     */
    public function setCreatedAtradi($createdAtradi)
    {
        $this->createdAtradi = $createdAtradi;

        return $this;
    }

    /**
     * Get createdAtradi
     *
     * @return \DateTime
     */
    public function getCreatedAtradi()
    {
        return $this->createdAtradi;
    }

    /**
     * Set updatedAtradi
     *
     * @param \DateTime $updatedAtradi
     * @return Radicado
     */
    public function setUpdatedAtradi($updatedAtradi)
    {
        $this->updatedAtradi = $updatedAtradi;

        return $this;
    }

    /**
     * Get updatedAtradi
     *
     * @return \DateTime
     */
    public function getUpdatedAtradi()
    {
        return $this->updatedAtradi;
    }


    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtradiValue()
    {
        $this->createdAtradi = new\DateTime();
    }

    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */

    public function setUpdatedAtradiValue()
    {
        $this->updatedAtradi = new \DateTime();
    }


    /**
     * Set mascota
     *
     * @param \PPP\CanBundle\Entity\Mascota $mascota
     * @return Radicado
     */
    public function setMascota(\PPP\CanBundle\Entity\Mascota $mascota = null)
    {
        $this->mascota = $mascota;

        return $this;
    }

    /**
     * Set checklist
     *
     * @param \PPP\CanBundle\Entity\Checklist $checklist
     * @return Radicado
     */
    public function setChecklist(\PPP\CanBundle\Entity\Checklist $checklist = null)
    {
        $this->checklist = $checklist;

        return $this;
    }

    /**
     * Get mascota
     *
     * @return \PPP\CanBundle\Entity\Mascota
     */
    public function getMascota()
    {
        return $this->mascota;
    }

    /**
     * Add checklists
     *
     * @param \PPP\CanBundle\Entity\Checklist $checklists
     * @return Radicado
     */
    public function addChecklist(\PPP\CanBundle\Entity\Checklist $checklists)
    {
        $this->checklists[] = $checklists;

        return $this;
    }

    /**
     * Remove checklists
     *
     * @param \PPP\CanBundle\Entity\Checklist $checklists
     */
    public function removeChecklist(\PPP\CanBundle\Entity\Checklist $checklists)
    {
        $this->checklists->removeElement($checklists);
    }

    /**
     * Get checklists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChecklists()
    {
        return $this->checklists;
    }

    /**
     * Get checklist
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChecklist()
    {
        return $this->checklist;
    }
}
