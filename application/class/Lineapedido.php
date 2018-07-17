<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 27/12/2017
 * Time: 18:59
 */

class Lineapedido
{
    /**
     * @var NUMERO DEL PEDIDO
     */
    private $numpedido;
    /**
     * @var numero de linea del pedido
     */
    private $numlinea;
    private $preciocompra;
    /**
     * @var cantidad pedida
     */
    private $cantidadpedida;
    /**
     * @var cantedad recebida
     */
    private $fecharecep;
    private $cantrecibida;
    protected $numpieza;


    public function __construct(Array $data)
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
    public function getNumlinea()
    {
        return $this->numlinea;
    }

    /**
     * @param mixed $numlinea
     */
    public function setNumlinea($numlinea)
    {
        $this->numlinea = $numlinea;
    }

    /**
     * @return mixed
     */
    public function getPreciocompra()
    {
        return $this->preciocompra;
    }

    /**
     * @param mixed $preciocompra
     */
    public function setPreciocompra($preciocompra)
    {
        $this->preciocompra = $preciocompra;
    }

    /**
     * @return mixed
     */
    public function getCantidadpedida()
    {
        return $this->cantidadpedida;
    }

    /**
     * @param mixed $cantidadpedida
     */
    public function setCantidadpedida($cantidadpedida)
    {
        $this->cantidadpedida = $cantidadpedida;
    }

    /**
     * @return mixed
     */
    public function getFecharecep()
    {
        return $this->fecharecep;
    }

    /**
     * @param mixed $fecharecep
     */
    public function setFecharecep($fecharecep)
    {
        $date = new DateTime($fecharecep);
        $this->fecharecep = $date->format('d-m-Y');
    }

    /**
     * @return mixed
     */
    public function getCantrecibida()
    {
        return $this->cantrecibida;
    }

    /**
     * @param mixed $cantrecibida
     */
    public function setCantrecibida($cantrecibida)
    {
        $this->cantrecibida = $cantrecibida;
    }

    /**
     * @return mixed
     */
    public function getNumpieza()
    {
        return $this->numpieza;
    }

    /**
     * @param mixed $numpieza
     */
    public function setNumpieza($numpieza)
    {
        $this->numpieza = $numpieza;
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
     * @return string cadena de objeto linea pedido
     */
    public function __toString()
    {
        $linea_pedido = "";
        $linea_pedido .="numero pedido ".$this->numpedido.
            " numero de linea ".$this->numlinea.
            "numero pieza ".$this->numpieza.
            " fecha recep ".$this->getFecharecep();
        return $linea_pedido;

    }


}