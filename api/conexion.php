<?php
class Conexion{
    public $host;
    public $user;
    public $pass;
    public $db_name;
    public $con;
 
    public function __construct(){
        // auto conexión
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db_name= "michuyfirudb";
        $this->con = new mysqli($this->host, $this->user, $this->pass,
                                                            $this->db_name);
        $this->con->set_charset("utf8");// ñ tildes
        if($this->con->connect_error){
            echo "Error al conectar a la base de datos";
        }else{
            //echo "Conexión exitosa";
        }
    }
    //funcion para retornar datos
    public function retornarDatos($consulta){
        try {
           $datos = $this->con->query($consulta);
           return $datos;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    //funcion para enviar datos
    public function enviarDatos($consulta){
        try {
            $enviar = $this->con->query($consulta);
            if($enviar){
                return true;
            }else{
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
?>