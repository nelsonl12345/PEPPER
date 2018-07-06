<?php

namespace PPP\CanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Raza
 *
 * @ORM\Table(name="razas")
 * @ORM\Entity(repositoryClass="PPP\CanBundle\Repository\RazaRepository")
 * @UniqueEntity("dtalleraza")
 */
class Raza
{

    /**
    * @ORM\OneToMany(targetEntity="Mascota", mappedBy="raza")
    */
    protected $mascotas;

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
     * @ORM\Column(name="dtalleraza", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $dtalleraza;

    public function __construct()
    {
        $this->mascotas = new ArrayCollection();
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
     * Set dtalleraza
     *
     * @param string $dtalleraza
     * @return Raza
     */
    public function setDtalleRaza($dtalleraza)
    {
        $this->dtalleraza = $dtalleraza;

        return $this;
    }

    /**
     * Get dtalleraza
     *
     * @return string 
     */
    public function getDtalleraza()
    {
        return $this->dtalleraza;
    }

    /**
     * Add mascotas
     *
     * @param \PPP\CanBundle\Entity\Mascota $mascotas
     * @return Raza
     */
    public function addMascota(\PPP\CanBundle\Entity\Mascota $mascotas)
    {
        $this->mascotas[] = $mascotas;

        return $this;
    }

    /**
     * Remove mascotas
     *
     * @param \PPP\CanBundle\Entity\Mascota $mascotas
     */
    public function removeMascota(\PPP\CanBundle\Entity\Mascota $mascotas)
    {
        $this->mascotas->removeElement($mascotas);
    }

    /**
     * Get mascotas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMascotas()
    {
        return $this->mascotas;
    }
}
