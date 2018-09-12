<?php

namespace PPP\CanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ataque
 *
 * @ORM\Table(name="ataques")
 * @ORM\Entity(repositoryClass="PPP\CanBundle\Repository\AtaqueRepository")
 */
class Ataque
{
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
     * @ORM\Column(name="departamento", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="municipio", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )     
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="subindice", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )          
     */
    private $subindice;

    /**
     * @var string
     *
     * @ORM\Column(name="razonsocial", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $razonsocial;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreevento", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nombreevento;

    /**
     * @var string
     *
     * @ORM\Column(name="codevento", type="string", length=10)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )          
     */
    private $codevento;

    /**
     * @var string
     *
     * @ORM\Column(name="fechanoti", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $fechanoti;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodoc", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $tipodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="numdoc", type="string", length=20)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )               
     */
    private $numdoc;

    /**
     * @var string
     *
     * @ORM\Column(name="nombresp", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $nombresp;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidosp", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $apellidosp;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonop", type="string", length=15)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )          
     */
    private $telefonop;

    /**
     * @var string
     *
     * @ORM\Column(name="fechanacimientop", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $fechanacimientop;

    /**
     * @var string
     *
     * @ORM\Column(name="edadp", type="string", length=3)
     * @Assert\NotBlank()
     */
    private $edadp;

    /**
     * @var string
     *
     * @ORM\Column(name="unidadmedida", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $unidadmedida;

    /**
     * @var string
     *
     * @ORM\Column(name="sexop", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $sexop;

    /**
     * @var string
     *
     * @ORM\Column(name="paiscaso", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $paiscaso;

    /**
     * @var string
     *
     * @ORM\Column(name="departamentoocu", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $departamentoocu;

    /**
     * @var string
     *
     * @ORM\Column(name="municipioocu", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $municipioocu;

    /**
     * @var string
     *
     * @ORM\Column(name="areacaso", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $areacaso;

    /**
     * @var string
     *
     * @ORM\Column(name="localidadcaso", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $localidadcaso;

    /**
     * @var string
     *
     * @ORM\Column(name="barriocaso", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $barriocaso;

    /**
     * @var string
     *
     * @ORM\Column(name="veredaozona", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $veredaozona;

    /**
     * @var string
     *
     * @ORM\Column(name="ocupacionpaciente", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $ocupacionpaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="tiporegimen", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $tiporegimen;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreadmin", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $nombreadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoadmin", type="string", length=10)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )          
     */
    private $codigoadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="etnica", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $etnica;

    /**
     * @var string
     *
     * @ORM\Column(name="grupopoblacion", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $grupopoblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="hclinica", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\File(
     *     maxSize = "1024k",
     *     maxSizeMessage = "El archivo no puede ser mayor a 1024 kilobytes"
     * )               
     */
    private $hclinica;


    /**
     * @var string
     *
     * @ORM\Column(name="codmuni", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $codmuni;

    /**
     * @var string
     *
     * @ORM\Column(name="departamentopac", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $departamentopac;

    /**
     * @var string
     *
     * @ORM\Column(name="municipiopac", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $municipiopac;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionpac", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $direccionpac;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaconsulta", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $fechaconsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="fechasintoma", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $fechasintoma;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacioncaso", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $clasificacioncaso;

    /**
     * @var string
     *
     * @ORM\Column(name="hospitalizacion", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $hospitalizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="fechahospit", type="string", nullable=true, length=45)
     */
    private $fechahospit;

    /**
     * @var string
     *
     * @ORM\Column(name="condfinal", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $condfinal;

    /**
     * @var string
     *
     * @ORM\Column(name="fechadefuncion", type="string", nullable=true, length=45)
     */
    private $fechadefuncion;

    /**
     * @var string
     *
     * @ORM\Column(name="numdefuncion", type="string", length=45, nullable=true)
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )          
     */
    private $numdefuncion;

    /**
     * @var string
     *
     * @ORM\Column(name="causasmuerte", type="string", length=45, nullable=true)
     */
    private $causasmuerte;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreprofesional", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $nombreprofesional;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoprofesional", type="string", length=12)
     * @Assert\NotBlank()
     */
    private $telefonoprofesional;

    /**
     * @var string
     *
     * @ORM\Column(name="agresion", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $agresion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoagresion", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $tipoagresion;

    /**
     * @var string
     *
     * @ORM\Column(name="agresionprov", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $agresionprov;

    /**
     * @var string
     *
     * @ORM\Column(name="tipolesion", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $tipolesion;

    /**
     * @var string
     *
     * @ORM\Column(name="profundidad", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $profundidad;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaagre", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $fechaagre;

    /**
     * @var string
     *
     * @ORM\Column(name="especieagre", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $especieagre;


    /**
     * @var string
     *
     * @ORM\Column(name="registrada", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $registrada;


    /**
     * @var string
     *
     * @ORM\Column(name="propietarioymascota", type="string", length=45)
     */
    private $propietarioymascota;


    /**
     * @var string
     *
     * @ORM\Column(name="nombremascota", type="string", length=45)
     */
    private $nombremascota;


    /**
     * @var string
     *
     * @ORM\Column(name="vacunado", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $vacunado;

    /**
     * @var string
     *
     * @ORM\Column(name="fechavacunacion", type="string", length=45)
     */
    private $fechavacunacion;


    /**
     * @var string
     *
     * @ORM\Column(name="nombreprop", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nombreprop;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionprop", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $direccionprop;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoprop", type="string", length=12)
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 100,
     *      minMessage = "Este valor debe ser mayor de 3 digitos numericos",
     * )          
     */
    private $telefonoprop;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoanimal", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $estadoanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $ubicacion;






    /**
     * @var string
     *
     * @ORM\Column(name="exposicion", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $exposicion;

    /**
     * @var string
     *
     * @ORM\Column(name="suero", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $suero;

    /**
     * @var string
     *
     * @ORM\Column(name="fechasuero", type="string", length=45, nullable=true)     
     */
    private $fechasuero;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $vacuna;

    /**
     * @var string
     *
     * @ORM\Column(name="ndosis", type="string", length=5, nullable=true)
     */
    private $ndosis;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaultdosis", type="string", nullable=true, length=45)
     */
    private $fechaultdosis;

    /**
     * @var string
     *
     * @ORM\Column(name="lavado", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $lavado;

    /**
     * @var string
     *
     * @ORM\Column(name="sutura", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $sutura;

    /**
     * @var string
     *
     * @ORM\Column(name="ordenosuero", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $ordenosuero;

    /**
     * @var string
     *
     * @ORM\Column(name="ordenovacuna", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $ordenovacuna;

    /**
     * @var string
     *
     * @ORM\Column(name="pruebadiag", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $pruebadiag;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $resultado;

    /**
     * @var string
     *
     * @ORM\Column(name="identifcacionvar", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $identifcacionvar;

    /**
     * @var string
     *
     * @ORM\Column(name="varianteident", type="string", length=45)
     * @Assert\NotBlank()
     */
    private $varianteident;

    /**
     * @var string
     *
     * @ORM\Column(name="cual", type="string", length=45, nullable=true)
     */
    private $cual;

    /**
     * @var string
     *
     * @ORM\Column(name="fecharesultado", type="string", length=45, nullable=true)
     */
    private $fecharesultado;

    /**
     * @var string
     *
     * @ORM\Column(name="signosysintomas", type="string", length=800)
     * @Assert\NotBlank()
     */
    private $signosysintomas;






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
     * Set departamento
     *
     * @param string $departamento
     * @return Ataque
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return Ataque
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Ataque
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set subindice
     *
     * @param string $subindice
     * @return Ataque
     */
    public function setSubindice($subindice)
    {
        $this->subindice = $subindice;

        return $this;
    }

    /**
     * Get subindice
     *
     * @return string 
     */
    public function getSubindice()
    {
        return $this->subindice;
    }

    /**
     * Set razonsocial
     *
     * @param string $razonsocial
     * @return Ataque
     */
    public function setRazonsocial($razonsocial)
    {
        $this->razonsocial = $razonsocial;

        return $this;
    }

    /**
     * Get razonsocial
     *
     * @return string 
     */
    public function getRazonsocial()
    {
        return $this->razonsocial;
    }

    /**
     * Set nombreevento
     *
     * @param string $nombreevento
     * @return Ataque
     */
    public function setNombreevento($nombreevento)
    {
        $this->nombreevento = $nombreevento;

        return $this;
    }

    /**
     * Get nombreevento
     *
     * @return string 
     */
    public function getNombreevento()
    {
        return $this->nombreevento;
    }

    /**
     * Set codevento
     *
     * @param string $codevento
     * @return Ataque
     */
    public function setCodevento($codevento)
    {
        $this->codevento = $codevento;

        return $this;
    }

    /**
     * Get codevento
     *
     * @return string 
     */
    public function getCodevento()
    {
        return $this->codevento;
    }

    /**
     * Set fechanoti
     *
     * @param string $fechanoti
     * @return Ataque
     */
    public function setFechanoti($fechanoti)
    {
        $this->fechanoti = $fechanoti;

        return $this;
    }

    /**
     * Get fechanoti
     *
     * @return string 
     */
    public function getFechanoti()
    {
        return $this->fechanoti;
    }

    /**
     * Set tipodoc
     *
     * @param string $tipodoc
     * @return Ataque
     */
    public function setTipodoc($tipodoc)
    {
        $this->tipodoc = $tipodoc;

        return $this;
    }

    /**
     * Get tipodoc
     *
     * @return string 
     */
    public function getTipodoc()
    {
        return $this->tipodoc;
    }

    /**
     * Set numdoc
     *
     * @param string $numdoc
     * @return Ataque
     */
    public function setNumdoc($numdoc)
    {
        $this->numdoc = $numdoc;

        return $this;
    }

    /**
     * Get numdoc
     *
     * @return string 
     */
    public function getNumdoc()
    {
        return $this->numdoc;
    }

    /**
     * Set nombresp
     *
     * @param string $nombresp
     * @return Ataque
     */
    public function setNombresp($nombresp)
    {
        $this->nombresp = $nombresp;

        return $this;
    }

    /**
     * Get nombresp
     *
     * @return string 
     */
    public function getNombresp()
    {
        return $this->nombresp;
    }

    /**
     * Set apellidosp
     *
     * @param string $apellidosp
     * @return Ataque
     */
    public function setApellidosp($apellidosp)
    {
        $this->apellidosp = $apellidosp;

        return $this;
    }

    /**
     * Get apellidosp
     *
     * @return string 
     */
    public function getApellidosp()
    {
        return $this->apellidosp;
    }

    /**
     * Set telefonop
     *
     * @param string $telefonop
     * @return Ataque
     */
    public function setTelefonop($telefonop)
    {
        $this->telefonop = $telefonop;

        return $this;
    }

    /**
     * Get telefonop
     *
     * @return string 
     */
    public function getTelefonop()
    {
        return $this->telefonop;
    }

    /**
     * Set fechanacimientop
     *
     * @param string $fechanacimientop
     * @return Ataque
     */
    public function setFechanacimientop($fechanacimientop)
    {
        $this->fechanacimientop = $fechanacimientop;

        return $this;
    }

    /**
     * Get fechanacimientop
     *
     * @return string 
     */
    public function getFechanacimientop()
    {
        return $this->fechanacimientop;
    }

    /**
     * Set edadp
     *
     * @param string $edadp
     * @return Ataque
     */
    public function setEdadp($edadp)
    {
        $this->edadp = $edadp;

        return $this;
    }

    /**
     * Get edadp
     *
     * @return string 
     */
    public function getEdadp()
    {
        return $this->edadp;
    }

    /**
     * Set unidadmedida
     *
     * @param string $unidadmedida
     * @return Ataque
     */
    public function setUnidadmedida($unidadmedida)
    {
        $this->unidadmedida = $unidadmedida;

        return $this;
    }

    /**
     * Get unidadmedida
     *
     * @return string 
     */
    public function getUnidadmedida()
    {
        return $this->unidadmedida;
    }

    /**
     * Set sexop
     *
     * @param string $sexop
     * @return Ataque
     */
    public function setSexop($sexop)
    {
        $this->sexop = $sexop;

        return $this;
    }

    /**
     * Get sexop
     *
     * @return string 
     */
    public function getSexop()
    {
        return $this->sexop;
    }

    /**
     * Set paiscaso
     *
     * @param string $paiscaso
     * @return Ataque
     */
    public function setPaiscaso($paiscaso)
    {
        $this->paiscaso = $paiscaso;

        return $this;
    }

    /**
     * Get paiscaso
     *
     * @return string 
     */
    public function getPaiscaso()
    {
        return $this->paiscaso;
    }

    /**
     * Set departamentoocu
     *
     * @param string $departamentoocu
     * @return Ataque
     */
    public function setDepartamentoocu($departamentoocu)
    {
        $this->departamentoocu = $departamentoocu;

        return $this;
    }

    /**
     * Get departamentoocu
     *
     * @return string 
     */
    public function getDepartamentoocu()
    {
        return $this->departamentoocu;
    }

    /**
     * Set municipioocu
     *
     * @param string $municipioocu
     * @return Ataque
     */
    public function setMunicipioocu($municipioocu)
    {
        $this->municipioocu = $municipioocu;

        return $this;
    }

    /**
     * Get municipioocu
     *
     * @return string 
     */
    public function getMunicipioocu()
    {
        return $this->municipioocu;
    }

    /**
     * Set areacaso
     *
     * @param string $areacaso
     * @return Ataque
     */
    public function setAreacaso($areacaso)
    {
        $this->areacaso = $areacaso;

        return $this;
    }

    /**
     * Get areacaso
     *
     * @return string 
     */
    public function getAreacaso()
    {
        return $this->areacaso;
    }

    /**
     * Set localidadcaso
     *
     * @param string $localidadcaso
     * @return Ataque
     */
    public function setLocalidadcaso($localidadcaso)
    {
        $this->localidadcaso = $localidadcaso;

        return $this;
    }

    /**
     * Get localidadcaso
     *
     * @return string 
     */
    public function getLocalidadcaso()
    {
        return $this->localidadcaso;
    }

    /**
     * Set barriocaso
     *
     * @param string $barriocaso
     * @return Ataque
     */
    public function setBarriocaso($barriocaso)
    {
        $this->barriocaso = $barriocaso;

        return $this;
    }

    /**
     * Get barriocaso
     *
     * @return string 
     */
    public function getBarriocaso()
    {
        return $this->barriocaso;
    }

    /**
     * Set veredaozona
     *
     * @param string $veredaozona
     * @return Ataque
     */
    public function setVeredaozona($veredaozona)
    {
        $this->veredaozona = $veredaozona;

        return $this;
    }

    /**
     * Get veredaozona
     *
     * @return string 
     */
    public function getVeredaozona()
    {
        return $this->veredaozona;
    }

    /**
     * Set ocupacionpaciente
     *
     * @param string $ocupacionpaciente
     * @return Ataque
     */
    public function setOcupacionpaciente($ocupacionpaciente)
    {
        $this->ocupacionpaciente = $ocupacionpaciente;

        return $this;
    }

    /**
     * Get ocupacionpaciente
     *
     * @return string 
     */
    public function getOcupacionpaciente()
    {
        return $this->ocupacionpaciente;
    }

    /**
     * Set tiporegimen
     *
     * @param string $tiporegimen
     * @return Ataque
     */
    public function setTiporegimen($tiporegimen)
    {
        $this->tiporegimen = $tiporegimen;

        return $this;
    }

    /**
     * Get tiporegimen
     *
     * @return string 
     */
    public function getTiporegimen()
    {
        return $this->tiporegimen;
    }

    /**
     * Set nombreadmin
     *
     * @param string $nombreadmin
     * @return Ataque
     */
    public function setNombreadmin($nombreadmin)
    {
        $this->nombreadmin = $nombreadmin;

        return $this;
    }

    /**
     * Get nombreadmin
     *
     * @return string 
     */
    public function getNombreadmin()
    {
        return $this->nombreadmin;
    }

    /**
     * Set codigoadmin
     *
     * @param string $codigoadmin
     * @return Ataque
     */
    public function setCodigoadmin($codigoadmin)
    {
        $this->codigoadmin = $codigoadmin;

        return $this;
    }

    /**
     * Get codigoadmin
     *
     * @return string 
     */
    public function getCodigoadmin()
    {
        return $this->codigoadmin;
    }

    /**
     * Set etnica
     *
     * @param string $etnica
     * @return Ataque
     */
    public function setEtnica($etnica)
    {
        $this->etnica = $etnica;

        return $this;
    }

    /**
     * Get etnica
     *
     * @return string 
     */
    public function getEtnica()
    {
        return $this->etnica;
    }

    /**
     * Set grupopoblacion
     *
     * @param string $grupopoblacion
     * @return Ataque
     */
    public function setGrupopoblacion($grupopoblacion)
    {
        $this->grupopoblacion = $grupopoblacion;

        return $this;
    }

    /**
     * Get grupopoblacion
     *
     * @return string 
     */
    public function getGrupopoblacion()
    {
        return $this->grupopoblacion;
    }


    /**
     * Set hclinica
     *
     * @param string $hclinica
     * @return Ataque
     */
    public function setHclinica($hclinica)
    {
        $this->hclinica = $hclinica;

        return $this;
    }

    /**
     * Get hclinica
     *
     * @return string 
     */
    public function getHclinica()
    {
        return $this->hclinica;
    }


    /**
     * Set codmuni
     *
     * @param string $codmuni
     * @return Ataque
     */
    public function setCodmuni($codmuni)
    {
        $this->codmuni = $codmuni;

        return $this;
    }

    /**
     * Get codmuni
     *
     * @return string 
     */
    public function getCodmuni()
    {
        return $this->codmuni;
    }

    /**
     * Set departamentopac
     *
     * @param string $departamentopac
     * @return Ataque
     */
    public function setDepartamentopac($departamentopac)
    {
        $this->departamentopac = $departamentopac;

        return $this;
    }

    /**
     * Get departamentopac
     *
     * @return string 
     */
    public function getDepartamentopac()
    {
        return $this->departamentopac;
    }

    /**
     * Set municipiopac
     *
     * @param string $municipiopac
     * @return Ataque
     */
    public function setMunicipiopac($municipiopac)
    {
        $this->municipiopac = $municipiopac;

        return $this;
    }

    /**
     * Get municipiopac
     *
     * @return string 
     */
    public function getMunicipiopac()
    {
        return $this->municipiopac;
    }

    /**
     * Set direccionpac
     *
     * @param string $direccionpac
     * @return Ataque
     */
    public function setDireccionpac($direccionpac)
    {
        $this->direccionpac = $direccionpac;

        return $this;
    }

    /**
     * Get direccionpac
     *
     * @return string 
     */
    public function getDireccionpac()
    {
        return $this->direccionpac;
    }

    /**
     * Set fechaconsulta
     *
     * @param string $fechaconsulta
     * @return Ataque
     */
    public function setFechaconsulta($fechaconsulta)
    {
        $this->fechaconsulta = $fechaconsulta;

        return $this;
    }

    /**
     * Get fechaconsulta
     *
     * @return string 
     */
    public function getFechaconsulta()
    {
        return $this->fechaconsulta;
    }

    /**
     * Set fechasintoma
     *
     * @param string $fechasintoma
     * @return Ataque
     */
    public function setFechasintoma($fechasintoma)
    {
        $this->fechasintoma = $fechasintoma;

        return $this;
    }

    /**
     * Get fechasintoma
     *
     * @return string 
     */
    public function getFechasintoma()
    {
        return $this->fechasintoma;
    }

    /**
     * Set clasificacioncaso
     *
     * @param string $clasificacioncaso
     * @return Ataque
     */
    public function setClasificacioncaso($clasificacioncaso)
    {
        $this->clasificacioncaso = $clasificacioncaso;

        return $this;
    }

    /**
     * Get clasificacioncaso
     *
     * @return string 
     */
    public function getClasificacioncaso()
    {
        return $this->clasificacioncaso;
    }

    /**
     * Set hospitalizacion
     *
     * @param string $hospitalizacion
     * @return Ataque
     */
    public function setHospitalizacion($hospitalizacion)
    {
        $this->hospitalizacion = $hospitalizacion;

        return $this;
    }

    /**
     * Get hospitalizacion
     *
     * @return string 
     */
    public function getHospitalizacion()
    {
        return $this->hospitalizacion;
    }

    /**
     * Set fechahospit
     *
     * @param string $fechahospit
     * @return Ataque
     */
    public function setFechahospit($fechahospit)
    {
        $this->fechahospit = $fechahospit;

        return $this;
    }

    /**
     * Get fechahospit
     *
     * @return string 
     */
    public function getFechahospit()
    {
        return $this->fechahospit;
    }

    /**
     * Set condfinal
     *
     * @param string $condfinal
     * @return Ataque
     */
    public function setCondfinal($condfinal)
    {
        $this->condfinal = $condfinal;

        return $this;
    }

    /**
     * Get condfinal
     *
     * @return string 
     */
    public function getCondfinal()
    {
        return $this->condfinal;
    }

    /**
     * Set fechadefuncion
     *
     * @param string $fechadefuncion
     * @return Ataque
     */
    public function setFechadefuncion($fechadefuncion)
    {
        $this->fechadefuncion = $fechadefuncion;

        return $this;
    }

    /**
     * Get fechadefuncion
     *
     * @return string 
     */
    public function getFechadefuncion()
    {
        return $this->fechadefuncion;
    }

    /**
     * Set numdefuncion
     *
     * @param string $numdefuncion
     * @return Ataque
     */
    public function setNumdefuncion($numdefuncion)
    {
        $this->numdefuncion = $numdefuncion;

        return $this;
    }

    /**
     * Get numdefuncion
     *
     * @return string 
     */
    public function getNumdefuncion()
    {
        return $this->numdefuncion;
    }

    /**
     * Set causasmuerte
     *
     * @param string $causasmuerte
     * @return Ataque
     */
    public function setCausasmuerte($causasmuerte)
    {
        $this->causasmuerte = $causasmuerte;

        return $this;
    }

    /**
     * Get causasmuerte
     *
     * @return string 
     */
    public function getCausasmuerte()
    {
        return $this->causasmuerte;
    }

    /**
     * Set nombreprofesional
     *
     * @param string $nombreprofesional
     * @return Ataque
     */
    public function setNombreprofesional($nombreprofesional)
    {
        $this->nombreprofesional = $nombreprofesional;

        return $this;
    }

    /**
     * Get nombreprofesional
     *
     * @return string 
     */
    public function getNombreprofesional()
    {
        return $this->nombreprofesional;
    }

    /**
     * Set telefonoprofesional
     *
     * @param string $telefonoprofesional
     * @return Ataque
     */
    public function setTelefonoprofesional($telefonoprofesional)
    {
        $this->telefonoprofesional = $telefonoprofesional;

        return $this;
    }

    /**
     * Get telefonoprofesional
     *
     * @return string 
     */
    public function getTelefonoprofesional()
    {
        return $this->telefonoprofesional;
    }

    /**
     * Set agresion
     *
     * @param string $agresion
     * @return Ataque
     */
    public function setAgresion($agresion)
    {
        $this->agresion = $agresion;

        return $this;
    }

    /**
     * Get agresion
     *
     * @return string 
     */
    public function getAgresion()
    {
        return $this->agresion;
    }

    /**
     * Set tipoagresion
     *
     * @param string $tipoagresion
     * @return Ataque
     */
    public function setTipoagresion($tipoagresion)
    {
        $this->tipoagresion = $tipoagresion;

        return $this;
    }

    /**
     * Get tipoagresion
     *
     * @return string 
     */
    public function getTipoagresion()
    {
        return $this->tipoagresion;
    }

    /**
     * Set agresionprov
     *
     * @param string $agresionprov
     * @return Ataque
     */
    public function setAgresionprov($agresionprov)
    {
        $this->agresionprov = $agresionprov;

        return $this;
    }

    /**
     * Get agresionprov
     *
     * @return string 
     */
    public function getAgresionprov()
    {
        return $this->agresionprov;
    }

    /**
     * Set tipolesion
     *
     * @param string $tipolesion
     * @return Ataque
     */
    public function setTipolesion($tipolesion)
    {
        $this->tipolesion = $tipolesion;

        return $this;
    }

    /**
     * Get tipolesion
     *
     * @return string 
     */
    public function getTipolesion()
    {
        return $this->tipolesion;
    }

    /**
     * Set profundidad
     *
     * @param string $profundidad
     * @return Ataque
     */
    public function setProfundidad($profundidad)
    {
        $this->profundidad = $profundidad;

        return $this;
    }

    /**
     * Get profundidad
     *
     * @return string 
     */
    public function getProfundidad()
    {
        return $this->profundidad;
    }

    /**
     * Set fechaagre
     *
     * @param string $fechaagre
     * @return Ataque
     */
    public function setFechaagre($fechaagre)
    {
        $this->fechaagre = $fechaagre;

        return $this;
    }

    /**
     * Get fechaagre
     *
     * @return string
     */
    public function getFechaagre()
    {
        return $this->fechaagre;
    }

    /**
     * Set especieagre
     *
     * @param string $especieagre
     * @return Ataque
     */
    public function setEspecieagre($especieagre)
    {
        $this->especieagre = $especieagre;

        return $this;
    }

    /**
     * Get especieagre
     *
     * @return string 
     */
    public function getEspecieagre()
    {
        return $this->especieagre;
    }



    /**
     * Set registrada
     *
     * @param string $registrada
     * @return Ataque
     */
    public function setRegistrada($registrada)
    {
        $this->registrada = $registrada;

        return $this;
    }

    /**
     * Get registrada
     *
     * @return string 
     */
    public function getRegistrada()
    {
        return $this->registrada;
    }


    /**
     * Set propietarioymascota
     *
     * @param string $propietarioymascota
     * @return Ataque
     */
    public function setPropietarioymascota($propietarioymascota)
    {
        $this->propietarioymascota = $propietarioymascota;

        return $this;
    }

    /**
     * Get propietarioymascota
     *
     * @return string 
     */
    public function getPropietarioymascota()
    {
        return $this->propietarioymascota;
    }


    /**
     * Set nombremascota
     *
     * @param string $nombremascota
     * @return Ataque
     */
    public function setNombremascota($nombremascota)
    {
        $this->nombremascota = $nombremascota;

        return $this;
    }

    /**
     * Get nombremascota
     *
     * @return string 
     */
    public function getNombremascota()
    {
        return $this->nombremascota;
    }



    /**
     * Set vacunado
     *
     * @param string $vacunado
     * @return Ataque
     */
    public function setVacunado($vacunado)
    {
        $this->vacunado = $vacunado;

        return $this;
    }

    /**
     * Get vacunado
     *
     * @return string 
     */
    public function getVacunado()
    {
        return $this->vacunado;
    }

    /**
     * Set fechavacunacion
     *
     * @param string $fechavacunacion
     * @return Ataque
     */
    public function setFechavacunacion($fechavacunacion)
    {
        $this->fechavacunacion = $fechavacunacion;

        return $this;
    }

    /**
     * Get fechavacunacion
     *
     * @return string
     */
    public function getFechavacunacion()
    {
        return $this->fechavacunacion;
    }


    /**
     * Set nombreprop
     *
     * @param string $nombreprop
     * @return Ataque
     */
    public function setNombreprop($nombreprop)
    {
        $this->nombreprop = $nombreprop;

        return $this;
    }

    /**
     * Get nombreprop
     *
     * @return string 
     */
    public function getNombreprop()
    {
        return $this->nombreprop;
    }

    /**
     * Set direccionprop
     *
     * @param string $direccionprop
     * @return Ataque
     */
    public function setDireccionprop($direccionprop)
    {
        $this->direccionprop = $direccionprop;

        return $this;
    }

    /**
     * Get direccionprop
     *
     * @return string 
     */
    public function getDireccionprop()
    {
        return $this->direccionprop;
    }

    /**
     * Set telefonoprop
     *
     * @param string $telefonoprop
     * @return Ataque
     */
    public function setTelefonoprop($telefonoprop)
    {
        $this->telefonoprop = $telefonoprop;

        return $this;
    }

    /**
     * Get telefonoprop
     *
     * @return string 
     */
    public function getTelefonoprop()
    {
        return $this->telefonoprop;
    }

    /**
     * Set estadoanimal
     *
     * @param string $estadoanimal
     * @return Ataque
     */
    public function setEstadoanimal($estadoanimal)
    {
        $this->estadoanimal = $estadoanimal;

        return $this;
    }

    /**
     * Get estadoanimal
     *
     * @return string 
     */
    public function getEstadoanimal()
    {
        return $this->estadoanimal;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Ataque
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }









    /**
     * Set exposicion
     *
     * @param string $exposicion
     * @return Ataque
     */
    public function setExposicion($exposicion)
    {
        $this->exposicion = $exposicion;

        return $this;
    }

    /**
     * Get exposicion
     *
     * @return string 
     */
    public function getExposicion()
    {
        return $this->exposicion;
    }

    /**
     * Set suero
     *
     * @param string $suero
     * @return Ataque
     */
    public function setSuero($suero)
    {
        $this->suero = $suero;

        return $this;
    }

    /**
     * Get suero
     *
     * @return string 
     */
    public function getSuero()
    {
        return $this->suero;
    }

    /**
     * Set fechasuero
     *
    * @param string $fechasuero
     * @return Ataque
     */
    public function setFechasuero($fechasuero)
    {
        $this->fechasuero = $fechasuero;

        return $this;
    }

    /**
     * Get fechasuero
     *
     * @return string
     */
    public function getFechasuero()
    {
        return $this->fechasuero;
    }

    /**
     * Set vacuna
     *
     * @param string $vacuna
     * @return Ataque
     */
    public function setVacuna($vacuna)
    {
        $this->vacuna = $vacuna;

        return $this;
    }

    /**
     * Get vacuna
     *
     * @return string 
     */
    public function getVacuna()
    {
        return $this->vacuna;
    }

    /**
     * Set ndosis
     *
     * @param string $ndosis
     * @return Ataque
     */
    public function setNdosis($ndosis)
    {
        $this->ndosis = $ndosis;

        return $this;
    }

    /**
     * Get ndosis
     *
     * @return string 
     */
    public function getNdosis()
    {
        return $this->ndosis;
    }

    /**
     * Set fechaultdosis
     *
     * @param string $fechaultdosis
     * @return Ataque
     */
    public function setFechaultdosis($fechaultdosis)
    {
        $this->fechaultdosis = $fechaultdosis;

        return $this;
    }

    /**
     * Get fechaultdosis
     *
     * @return string 
     */
    public function getFechaultdosis()
    {
        return $this->fechaultdosis;
    }

    /**
     * Set lavado
     *
     * @param string $lavado
     * @return Ataque
     */
    public function setLavado($lavado)
    {
        $this->lavado = $lavado;

        return $this;
    }

    /**
     * Get lavado
     *
     * @return string 
     */
    public function getLavado()
    {
        return $this->lavado;
    }

    /**
     * Set sutura
     *
     * @param string $sutura
     * @return Ataque
     */
    public function setSutura($sutura)
    {
        $this->sutura = $sutura;

        return $this;
    }

    /**
     * Get sutura
     *
     * @return string 
     */
    public function getSutura()
    {
        return $this->sutura;
    }

    /**
     * Set ordenosuero
     *
     * @param string $ordenosuero
     * @return Ataque
     */
    public function setOrdenosuero($ordenosuero)
    {
        $this->ordenosuero = $ordenosuero;

        return $this;
    }

    /**
     * Get ordenosuero
     *
     * @return string 
     */
    public function getOrdenosuero()
    {
        return $this->ordenosuero;
    }

    /**
     * Set ordenovacuna
     *
     * @param string $ordenovacuna
     * @return Ataque
     */
    public function setOrdenovacuna($ordenovacuna)
    {
        $this->ordenovacuna = $ordenovacuna;

        return $this;
    }

    /**
     * Get ordenovacuna
     *
     * @return string 
     */
    public function getOrdenovacuna()
    {
        return $this->ordenovacuna;
    }

    /**
     * Set pruebadiag
     *
     * @param string $pruebadiag
     * @return Ataque
     */
    public function setPruebadiag($pruebadiag)
    {
        $this->pruebadiag = $pruebadiag;

        return $this;
    }

    /**
     * Get pruebadiag
     *
     * @return string 
     */
    public function getPruebadiag()
    {
        return $this->pruebadiag;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     * @return Ataque
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set identifcacionvar
     *
     * @param string $identifcacionvar
     * @return Ataque
     */
    public function setIdentifcacionvar($identifcacionvar)
    {
        $this->identifcacionvar = $identifcacionvar;

        return $this;
    }

    /**
     * Get identifcacionvar
     *
     * @return string 
     */
    public function getIdentifcacionvar()
    {
        return $this->identifcacionvar;
    }

    /**
     * Set varianteident
     *
     * @param string $varianteident
     * @return Ataque
     */
    public function setVarianteident($varianteident)
    {
        $this->varianteident = $varianteident;

        return $this;
    }

    /**
     * Get varianteident
     *
     * @return string 
     */
    public function getVarianteident()
    {
        return $this->varianteident;
    }

    /**
     * Set cual
     *
     * @param string $cual
     * @return Ataque
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
     * Set fecharesultado
     *
     * @param string $fecharesultado
     * @return Ataque
     */
    public function setFecharesultado($fecharesultado)
    {
        $this->fecharesultado = $fecharesultado;

        return $this;
    }

    /**
     * Get fecharesultado
     *
     * @return string
     */
    public function getFecharesultado()
    {
        return $this->fecharesultado;
    }

    /**
     * Set signosysintomas
     *
     * @param array $signosysintomas
     * @return Ataque
     */
    public function setSignosysintomas($signosysintomas)
    {
        $this->signosysintomas = $signosysintomas;

        return $this;
    }

    /**
     * Get signosysintomas
     *
     * @return array
     */
    public function getSignosysintomas()
    {
        return $this->signosysintomas;
    }                                                                




}
