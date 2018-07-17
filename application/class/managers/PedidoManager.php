<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 27/12/2017
 * Time: 17:46
 */

class PedidoManager
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getPedido($numvend)
    {
        $sql = "SELECT * FROM pedido WHERE  NUMVEND = ? ";
        $query = $this->db->prepare($sql);
        $query->bind_param('i',$numvend);
        $query->execute();
        $result = $query->get_result();
        $pedidos = [];
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = new Pedido($row);
        }
        return $pedidos;
    }
    public function generate_num_pedido()
    {
        $sql1 ="SELECT MAX(NUMPEDIDO) FROM pedido " ;
        $query = $this->db->query($sql1);
        $result = $query->fetch_row();
        $numpedido = $result[0]+1;
        return $numpedido;

    }
    public function insert_pedido($numvendedor)
    {

        $sql = "INSERT INTO pedido VALUE (?,?,now())";
        $query = $this->db->prepare($sql);
        $numpedido = $this->generate_num_pedido();
        $query->bind_param('ii',$numpedido,$numvendedor);
        $query->execute();
    }
    public function pedido_exist($numvendedor)
    {
        $sql ="SELECT NUMVEND FROM pedido WHERE NUMVEND = ? ";
            $query = $this->db->prepare($sql);

        $query->bind_param("i",$numvendedor);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return 1;
        }
        return 0;
    }

    public function delet_pedido($numpedido,$numlinea)
    {
        try{
            $this->db->autocommit(false);
            $query1 = $this->db->prepare("DELETE FROM linped WHERE NUMLINEA =? AND NUMPEDIDO = ?");
            $query2 = $this->db->prepare("DELETE FROM pedido WHERE NUMPEDIDO =?");
            $query1->bind_param('ii',$numlinea,$numpedido);
            $query2->bind_param('i',$numpedido);
            $query1->execute();
            $query2->execute();
            $this->db->autocommit(true);

        }catch (Exception $e){
            $this->db->rollback();
            die('tenemos un problama para borrar registros '.$e->getMessage());
        }


    }

}