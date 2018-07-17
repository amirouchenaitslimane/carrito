<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2017
 * Time: 19:17
 */

class Carrito
{
    /**
     *
     * Carrito constructor.
     */
    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
    }

    /**
     * contar numero de piezas añadidas a la session[carito]
     * @return int numero de piezas añadidas a la session
     */
    public function count() {
       // return array_sum($_SESSION['carrito']) aqui se calcula con cantidad ;
    return count($_SESSION['carrito']);//aqui se calcula con piezas sin tomar en cuenta la cantidad
    }

    /**
     * añadir una piza a la session
     * @param Pieza $pieza Objeto pieza
     */
    public function add(Pieza $pieza) {
        if (isset($_SESSION['carrito'][$pieza->getNumpieza()])) {
            $_SESSION['carrito'][$pieza->getNumpieza()] ++;
        }else{
            $_SESSION['carrito'][$pieza->getNumpieza()] = 1;

        }
    }

    /**
     * Elimina la pieza en la session
     * @param Pieza $pieza objeto pieza
     */
    public function remove(Pieza $pieza) {
        unset($_SESSION['carrito'][$pieza->getNumpieza()]);
    }

    /**
     * devuelve el precio total del carrito
     * @return float|int
     */
    public function total() {
        $nums = array_keys($_SESSION['carrito']);
        $total = 0;
        $manager = new PiezaManager();
        if (empty($nums)) {
            echo 0;
        }else{
            foreach ($nums as  $value) {
                $total += $manager->getByid($value)
                        ->getPreciovent() * $_SESSION['carrito'][$manager->getByid($value)->getNumpieza()];
            }

            return $total ;
        }
    }

    /**
     * actualiza la canidad del carrito
     * @param Pieza $pieza objeto Pieza
     * @param $qty cantidad a subir
     */
    public function updateQty(Pieza $pieza,$qty){
        if (isset($_SESSION['carrito'][$pieza->getNumpieza()])) {
            $_SESSION['carrito'][$pieza->getNumpieza()] = $qty;
        }else{
            $_SESSION['carrito'][$pieza->getNumpieza()] = 1;

        }

    }

}