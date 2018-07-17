<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2017
 * Time: 17:14
 */

class Pieza {
    /**
     * @var numero pieza
     */
    private $numpieza;
    /**
     * @var nombre de la pieza
     */
    private $nompieza;
    /**
     * @var precio de la pieza
     */
    private $preciovent;
    /**
     * @var imagen de la pieza
     */
    private $image;

    /**
     * Pieza constructor.
     * @param array $data assosiativo
     */
    function __construct(array $data ){
        $this->hydrate($data);
    }

    /**
     * @return numero de la pieza
     */
    function getNumpieza() {
        return $this->numpieza;
    }

    /**
     * @return nombre de la pieza
     */
    function getNompieza() {
        return $this->nompieza;
    }

    /**
     * @return precio de la pieza
     */
    function getPreciovent() {
        return $this->preciovent;
    }

    /**
     * @param $numpieza numero de la pieza
     */
    function setNumpieza($numpieza) {
        $this->numpieza = $numpieza;
    }

    function setNompieza($nompieza) {
        $this->nompieza = $nompieza;
    }

    /**
     * @param $preciovent precio de la pieza
     */
    function setPreciovent($preciovent) {
        $this->preciovent = $preciovent;
    }

    /**
     * @return imagen de la pieza
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image imagen de la pieza
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    function hydrate(array $data) {
        foreach ($data as $clave=> $value){
            $method = 'set'.ucfirst($clave);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
   public function __toString() {
        $p = "";
        $p .= "Nombre de la pieza ".$this->nompieza."<br>";
        $p .="Precio de la pieza ".$this->preciovent."<br>";
        return $p;
    }

}