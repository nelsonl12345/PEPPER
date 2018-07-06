<?php

namespace PPP\CanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection; 

/**
 * Usuario
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="PPP\CanBundle\Repository\UsuarioRepository")
 * @UniqueEntity("usuario")
 * @UniqueEntity("identificacion")
 * @UniqueEntity("correo")
 * @ORM\HasLifecycleCallbacks()
 */
class Usuario implements AdvancedUserInterface, \Serializable
{

    /**
    * @ORM\OneToMany(targetEntity="Checklist", mappedBy="usuario")
    */
    protected $checklists;


    /**
    * @ORM\OneToMany(targetEntity="Mascota", mappedBy="usuario")
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
     * @ORM\Column(name="usuario", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="identificacion", type="string", length=20)
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )
     * @Assert\NotBlank()
     */
    private $identificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20)
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )
     * @Assert\NotBlank()
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="ocupacion", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $ocupacion;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=255)
     */
    private $contrasena;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", columnDefinition="ENUM('ROLE_JEFE_DEPARTAMENTO','ROLE_COORDINADOR','ROLE_SECRETARIO','ROLE_ZOOTECNISTA','ROLE_PROPIETARIO')", length=50)
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"ROLE_JEFE_DEPARTAMENTO", "ROLE_COORDINADOR", "ROLE_SECRETARIO", "ROLE_ZOOTECNISTA", "ROLE_PROPIETARIO"})
     */
    private $role;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=60)
     * @Assert\NotBlank()
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="barrio", type="string", length=60)
     * @Assert\NotBlank()
     */
    private $barrio;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=45, nullable=true)
     */
    private $foto;


    /**
     * @var string
     *
     * @ORM\Column(name="imgcedula", type="string", length=45, nullable=true)
     */
    private $imgcedula;




    public function __construct()
    {
        $this->mascotas = new ArrayCollection();
        $this->isActive = true;        
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
     * Set usuario
     *
     * @param string $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

 public function __toString(){
        return $this->usuario;
    }


    /**
     * Set identificacion
     *
     * @param string $identificacion
     * @return Usuario
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string 
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Usuario
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Usuario
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     * @return Usuario
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string 
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Usuario
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuario
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Usuario
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Usuario
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return Usuario
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Usuario
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }


    /**
     * Set imgcedula
     *
     * @param string $imgcedula
     * @return Usuario
     */
    public function setImgcedula($imgcedula)
    {
        $this->imgcedula = $imgcedula;

        return $this;
    }

    /**
     * Get imgcedula
     *
     * @return string 
     */
    public function getImgcedula()
    {
        return $this->imgcedula;
    }



    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        $this->createdAt = new\DateTime(); 
    }

    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */

    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }


    public function getFullName()
    {
        return $this->nombres. " " . $this->apellidos;
    }


    public function getRoles()
    {
        return array($this->role);
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    public function getPassword()
    {
        return $this->contrasena;
    }

    public function getUsername()
    {
        return $this->usuario;
    }


    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->usuario,
            $this->contrasena,
            $this->isActive
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->usuario,
            $this->contrasena,
            $this->isActive
        ) = unserialize($serialized);
    }   


    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }     




    /**
     * Add mascotas
     *
     * @param \PPP\CanBundle\Entity\Mascota $mascotas
     * @return Usuario
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

    /**
     * Add checklists
     *
     * @param \PPP\CanBundle\Entity\Checklist $checklists
     * @return Usuario
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
}
