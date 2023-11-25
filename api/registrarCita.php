<?php
require_once "conexion.php";
$conexion = new Conexion();
//Recibir los datos POST
$tipoMascota = $_POST["tipoMascota"];
$nombreMascota = $_POST["nombreMascota"];
$edad = $_POST["edad"];
$idRaza = $_POST["idRaza"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$nombreAmo = $_POST["nombreAmo"];
$apellidoAmo = $_POST["apellidoAmo"];
$tipoIdentificacion = $_POST["tipoIdentificacion"];

 
$consulta = "INSERT INTO citasmedicas(tipoMascota, nombreMascota, edad, idRaza, fecha, hora, nombreAmo, apellidoAmo, tipoIdentificacion)
VALUES('{$tipoMascota}', '{$nombreMascota}', '{$edad}', '{$idRaza}', '{$fecha}', '{$hora}', '{$nombreAmo}', '{$apellidoAmo}', '{$tipoIdentificacion}');";
 
$res = $conexion->enviarDatos($consulta);
if($res == true){
    echo json_encode("1");
}else{
    echo json_encode("0");
}
 
?>