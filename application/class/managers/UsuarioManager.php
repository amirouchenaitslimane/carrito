<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/12/2017
 * Time: 17:22
 */

class UsuarioManager
{

    private $db;
    public function __construct() {
        $this->db = Database::getInstance();

    }


    public function user_existe($login,$password) {
        $sql = "SELECT login ,password FROM vendedor WHERE login = ? and password = ?";
        $query = $this->db->prepare($sql);

        $query->bind_param("ss",$login,$password);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function getByLogin($login){
        $sql = "SELECT * FROM vendedor WHERE  login = ?";
        $query = $this->db->prepare($sql);

        $query->bind_param("s", $login);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 0){
           return false;
        }else{
            $a = $result->fetch_assoc();
            return new Usuario($a);
        }
    }
    public function getUser($login){
        $sql = "SELECT * FROM vendedor WHERE  numvend = ?";
        $query = $this->db->prepare($sql);
        $query->bind_param("s", $login);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 0){
            echo 'usuario no existe';
        }else{
            $a = $result->fetch_assoc();
            return new Usuario($a);
        }

    }
    public function user_register(Usuario $user) {
        $sql = "INSERT INTO usuarios(login,password) VALUES (?,?) ";

        $query = $this->db->prepare($sql);
        $login = $user->getLogin();
        $password = $user->getPassword();

        $query->bind_param("ss",$login,$password);
        if ($query->execute() === true) {
            echo 'success';
        }else{
            echo 'no success';
        }
    }

    public function getCarrito(Usuario $user){
        $sql="SELECT * FROM carrito WHERE numvend = ?";
        $query = $this->db->prepare($sql);
        $numvend = $user->getNumvend();
        $query->bind_param('i',$numvend);
        $query->execute();
        $result = $query->get_result();
        //new carrito;
    }

}