<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/01/2018
 * Time: 19:51
 */

class LineapedidoManager
{
    protected $db;
public function __construct()
{
    $this->db = Database::getInstance();
}


    /**
     * @return Database|type
     */
    public function getLinea($numpedido)
    {
        $sql = "SELECT * FROM linped WHERE NUMPEDIDO = ?";
        $query = $this->db->prepare($sql);
        $query->bind_param('i',$numpedido);
        $query->execute();
        $result = $query->get_result();
        $linea = [];
        while ($row = $result->fetch_assoc()) {
            $linea[] = new Lineapedido($row);
        }
        return $linea;

    }
    /**
     * metodo para realizar la busqueda de pedidos
     * @param array $criterios request
     * @return array de objetos de lineapedido
     */
    public function search(array $criterios)
    {
        $date = new DateTime();
        if ($criterios['criterio'] == 'FECHARECEP'){
            $criterios['field'] = $date->format('Y-m-d');
        }
        $sql = "SELECT * FROM linped WHERE  ".$criterios['criterio']." LIKE '%".$criterios['field']."%' ";
        $result = $this->db->query($sql);
        $busqueda = [];
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $busqueda[] = new Lineapedido($row);
            }

            return $busqueda;

        }
    }


}