<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2017
 * Time: 17:21
 */

class PiezaManager {
    /**
     *
     * @var instancia data base
     */
    private $db;

    /**
     *
     * @param type $db conneccion
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     *
     * @return \Pieza devolver todas las piezas
     */
    public function getAll() {
        $sql = "SELECT * FROM pieza ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        $piezas = [];
        if ($result->num_rows === 0)
            //a cambiar luego
            exit('<h1>No hay productos en la base de datos</h1>');
        while ($row = $result->fetch_assoc()) {
            $piezas[] = new Pieza($row);
        }
        return $piezas;

    }

    /**
     *
     * @param type $id devolver pieza segun numero_pieza introducido
     * @return \Pieza objeto pieza
     */
    public function getByid($id) {
        $sql = "SELECT * FROM pieza WHERE NUMPIEZA = ?";
        $query = $this->db->prepare($sql);
        $query->bind_param("s", $id);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows === 0){
            exit('<h1>El producto no existe </h1>');

            //a cambiar luego
        }
        $data = $result->fetch_assoc();
        return new Pieza($data);
    }

    public function getByNum($numpieza)
    {
       //$sql = "SELECT NUMPIEZA, NOMPIEZA, PRECIOVENT FROM pieza WHERE NUMPIEZA = '".$numpieza."'";
        $query = $this->db->query("SELECT NUMPIEZA, NOMPIEZA, PRECIOVENT FROM pieza WHERE NUMPIEZA = '".$numpieza."'");
        return $query;

    }

    /**
     *
     * @param Pieza $pieza insertr pieza
     */
    public function insert_pieza(Pieza $pieza) {
        $sql = "INSERT INTO pieza(`NUMPIEZA`, `NOMPIEZA`, `PRECIOVENT`) VALUES(?,?,?) ";
        $query = $this->db->prepare($sql);
        $num = $pieza->getNumpieza();
        $nom = $pieza->getNompieza();
        $precio = $pieza->getPreciovent();
        $query->bind_param("ssi", $num,$nom,$precio);

        if ( $query->execute() === TRUE) {
            echo "Datos iroducida";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }

    }



    public function search(array $criterios)
    {
        $sql = "SELECT * FROM pieza WHERE  ".$criterios['criterio']." LIKE '%".$criterios['field']."%' ";
        $result = $this->db->query($sql);
        $busqueda = [];
        if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $busqueda[] = new Pieza($row);
        }
        return $busqueda;

        }
    }



}