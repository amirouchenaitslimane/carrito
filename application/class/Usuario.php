<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2017
 * Time: 17:18
 */

class Usuario
{
    /**
     * @var numero del vendedor
     */
    private $numvend;
    /**
     * @var nombre del vendedor
     */
    private $nomvend;
    /**
     * @var nombre comer del vendedor
     */
    private $nombrecomer;
    /**
     * @var telefono del vendedor
     */
    private $telefono;
    /**
     * @var calle del vendedor
     */
    private $calle;
    /**
     * @var ciudad del vendedor
     */
    private $ciudad;
    /**
     * @var provincia del vendedor
     */
    private $provincia;
    /**
     * @var codigo postal del vendedor
     */
    private $codpostal;
    /**
     * @var login del vendedor = nombre
     */
    private $login;
    /**
     * @var contraseña del vendedor = numvend
     */
    private $password;

    /**
     * Usuario constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @return numero del vendedor
     */
    public function getNumvend()
    {
        return $this->numvend;
    }
    /**
     * @param mixed $numvend
     */
    public function setNumvend($numvend)
    {
        $this->numvend = $numvend;
    }

    /**
     * @return nombre del vendedor
     */
    public function getNomvend()
    {
        return $this->nomvend;
    }

    /**
     * @param mixed $nomvend
     */
    public function setNomvend($nomvend)
    {
        $this->nomvend = $nomvend;
    }

    /**
     * @return nombre comer del vendedor
     */
    public function getNombrecomer()
    {
        return $this->nombrecomer;
    }

    /**
     * @param mixed $nombrecomer
     */
    public function setNombrecomer($nombrecomer)
    {
        $this->nombrecomer = $nombrecomer;
    }

    /**
     * @return telefono del vendedor
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return calle del vendedor
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return ciudad del vendedor
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param $ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @return provincia del vendedor
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * @return codigo del vendedor
     */
    public function getCodpostal()
    {
        return $this->codpostal;
    }

    /**
     * @param mixed $codpostal
     */
    public function setCodpostal($codpostal)
    {
        $this->codpostal = $codpostal;
    }

    /**
     * @return login del vendedor
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return contraseña del vendedor
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function hydrate(array $data) {
        foreach ($data as $cle=> $valeur){
            $method = 'set'.ucfirst($cle);
            if (method_exists($this, $method)) {
                $this->$method($valeur);
            }
        }
    }

    public function __toString()
    {
        return $this->numvend." nombre:".$this->nomvend." telefono".$this->telefono;
    }

}