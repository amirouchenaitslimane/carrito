<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2017
 * Time: 19:19
 */

class CarritoManager
{
private $db;
public function __construct()
{
    $this->db = Database::getInstance();
}

    /**
     * Devolver la piezas del carrito de cada usuario
     * @param Usuario $user
     * @return array
     */
    public function getCarrito(Usuario $user)
    {
        $sql = "SELECT numvendedor,numpieza,cantidad FROM carrito WHERE numvendedor = ?";
        $query = $this->db->prepare($sql);
        $numvend = $user->getNumvend();
        $query->bind_param('i',$numvend);
        $query->execute();
        $result = $query->get_result();
        $array = [];
        while ($row = $result->fetch_object()) {
            $array[$row->numpieza] = $row->cantidad;
        }
        return $array;
    }

    public function IsExisteCarrito( $numvendedor )
    {
        $sql = "SELECT * FROM carrito WHERE numvendedor = ? ";
        $query = $this->db->prepare($sql);

        $query->bind_param('i',$numvendedor);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return true;
        }
        return false;

    }

    public function deleteCarrito($numvendedor)
    {
        $sql = "DELETE FROM carrito WHERE numvendedor = ? ";
        $query = $this->db->prepare($sql);
        $query->bind_param('i',$numvendedor);
        if ($query->execute()){
            unset($_SESSION['carrito']);
        }

    }


    /**
     * devolver las piezas del carrito session
     * @return array
     */
    function getCrrito() {
        $manager = new PiezaManager;
        $nums = array_keys($_SESSION['carrito']);
        $arry_piezas = [];

        foreach ($nums as $value) {
            $arry_piezas[] = $manager->getByid($value);
        }
        return $arry_piezas;

    }

    /**
     * Guardar carrito en la base de datos
     * @param Usuario $user
     * @return bool
     */
    public function saveCarrito(Usuario $user)
    {
        $u = $user->getNumvend();
        $manager = new PiezaManager;
        $nums = array_keys($_SESSION['carrito']);
        $arry_piezas = [];
        foreach ($nums as $value) {
            $arry_piezas[] = $manager->getByid($value)->getNumpieza();
        }
        $sql = "";
        foreach ($arry_piezas as $pieza) {
            $sql .="INSERT INTO carrito (numvendedor, numpieza, cantidad)VALUES ('".$u."','".$pieza."','".$_SESSION['carrito'][$pieza]."');";

        }


      if ($this->db->multi_query($sql)== true){
           return true;
        }
    }

    /**
     * @param array $piezas
     * @param $numvendedor
     * @return bool
     */
    public function process(array $piezas,$numvendedor)
    {
            $processed = false;
            $this->db->autocommit(FALSE);
            $pedido = new PedidoManager();
            $pedido->insert_pedido($numvendedor);
            $sql2 = "SELECT NUMPEDIDO FROM pedido WHERE NUMVEND= ? ";
            $query = $this->db->prepare($sql2);
            $query->bind_param('i',$numvendedor);
            if ($query->execute()){
                $processed = true;
            }
            $res = $query->get_result();
            $a = [];
            while ($row = $res->fetch_assoc()){
                $a = $row;
            }
            $numlinea = $this->getCrrito();
            $j = 1;
            foreach ($piezas as $pieza){
                    for ($i=0; $i <count($numlinea); $i++) {
                    $sql = "INSERT INTO linped VALUES (?,?,?,?,?,now(),?)";
                        $query = $this->db->prepare($sql);
                        $numpieza = $pieza->getNumpieza();
                        $precio = $pieza->getPreciovent() * $_SESSION['carrito'][$pieza->getNumpieza()];
                        $qty = $_SESSION['carrito'][$pieza->getNumpieza()];
                        $numpedido = $a['NUMPEDIDO'];
                        $query->bind_param('iissii',$numpedido ,$j,$numpieza,$precio,$qty,$qty);
                        if ($query->execute()){
                            $processed = true;
                        }

                    }
                $j++;
            }
            if ($this->IsExisteCarrito($numvendedor)){
                $this->deleteCarrito($numvendedor);
                $processed = true;
            }
            if ($processed){

                $this->db->autocommit(TRUE);
            }else{
                $this->db->rollback();

            }

            return $processed;



    }












}