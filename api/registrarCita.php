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

//Validar si la cita existe
$consultaValidar = "SELECT fecha, hora From citasmedicas WHERE fecha = '{$fecha}' AND hora = '{$hora}';";
$resValidar = $conexion->retornarDatos($consultaValidar);
$array = null;
$array = mysqli_fetch_array($resValidar);
$horaSinSeg = date("H:i", strtotime($hora));
if ($array == null) {
    $consulta = "INSERT INTO citasmedicas(mascota, edad, idRaza, fecha, hora, amo)
    VALUES('{$mascota}', '{$edad}', '{$idRaza}', '{$fecha}', '{$hora}', '{$amo}');";

    $res = $conexion->enviarDatos($consulta);
    if ($res == true) {
        echo json_encode("1");
    } else {
        echo json_encode("0");
    }
}else if($array["fecha"]==$fecha && date("H:i", strtotime($array["hora"])==$horaSinSeg)){
    echo json_encode(("2"));
}
?>
