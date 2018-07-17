<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 27/12/2017
 * Time: 17:43
 */

class Pedido
{
    /**
     * @var numero del pedido
     */
    private $numpedido;
    /**
     * @var nnumero del vendedor
     */
    private $numvend;
    /**
     * @var fecha del pedido
     */
    private $fecha;

    /**
     * @return mixed
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



    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @return mixed
     */
    public function getNumpedido()
    {
        return $this->numpedido;
    }

    /**
     * @param mixed $numpedido
     */
    public function setNumpedido($numpedido)
    {
        $this->numpedido = $numpedido;
    }




    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $date = new DateTime($fecha);
        $this->fecha = $date->format('d-m-Y');

    }
    function hydrate(array $data) {
        foreach ($data as $clave=> $value){
            $method = 'set'.ucfirst($clave);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return string objeto pedido
     */
    public function __toString()
    {
        $p = "Numero del pedido ".$this->numpedido." numero del vendedor "
            .$this->numvend." fecha del pedido ".$this->getFecha();
        return $p;
    }


}