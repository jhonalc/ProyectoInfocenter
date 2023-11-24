<?php
require_once "conexion.php";
$conexion = new Conexion();
//Recibir los datos POST
$mascota = $_POST["mascota"];
$edad = $_POST["edad"];
$idRaza = $_POST["idRaza"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$amo = $_POST["amo"];
 
$consulta = "INSERT INTO citasmedicas(mascota, edad, idRaza, fecha, hora, amo)
VALUES('{$mascota}', '{$edad}', '{$idRaza}', '{$fecha}', '{$hora}', '{$amo}');";
 
$res = $conexion->enviarDatos($consulta);
if($res == true){
    echo json_encode("1");
}else{
    echo json_encode("0");
}
 
?>