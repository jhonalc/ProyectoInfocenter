<?php
require_once "conexion.php";
$conexion = new Conexion();
//Recibir los datos POST
$tipo_mascota = $_POST["tipo_mascota"];
$mascota = $_POST["mascota"];
$edad = $_POST["edad"];
$idRaza = $_POST["idRaza"];
$NombreAmo = $_POST["NombreAmo"];
$ApellidoAmo = $_POST["ApellidoAmo"];
$TipoIdentificacion = $_POST["TipoIdentificacion"];
$NumeroDocumento = $_POST["NumeroDocumento"];

//Validar si el usuario existe
$consultaValidar = "SELECT mascota, NumeroDocumento From guarderia WHERE mascota = '{$mascota}' AND NumeroDocumento = '{$NumeroDocumento}';";
$resValidar = $conexion->retornarDatos($consultaValidar);
$array = null;
$array = mysqli_fetch_array($resValidar);
if ($array == null) {
    $consulta = "INSERT INTO guarderia(tipo_mascota, mascota, edad, idRaza, NombreAmo, ApellidoAmo, TipoIdentificacion, NumeroDocumento)
    VALUES('{$tipo_mascota}','{$mascota}', '{$edad}', '{$idRaza}', '{$NombreAmo}', '{$ApellidoAmo}', '{$TipoIdentificacion}','{$NumeroDocumento}');";

    $res = $conexion->enviarDatos($consulta);
    if ($res == true) {
        echo json_encode("1");
    } else {
        echo json_encode("0");
    }
}
?>