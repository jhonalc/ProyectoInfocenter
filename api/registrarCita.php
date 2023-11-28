<?php
require_once "conexion.php";
$conexion = new Conexion();
//Recibir los datos POST
$tipoMascota = $_POST["tipoMascota"];
$nombreMascota = $_POST["nombreMascota"];
$edadMascota = $_POST["edadMascota"];
$idRaza = $_POST["idRaza"];
$fechaCita = $_POST["fechaCita"];
$horaCita = $_POST["horaCita"];
$nombreAmo = $_POST["nombreAmo"];
$apellidoAmo = $_POST["apellidoAmo"];
$tipoIdentificacion = $_POST["tipoIdentificacion"];
$identificacionAmo = $_POST["identificacionAmo"];

//Validar si la cita existe
$consultaValidar = "SELECT fecha, hora From citasmedicas WHERE fecha = '{$fechaCita}' AND hora = '{$horaCita}';";
$resValidar = $conexion->retornarDatos($consultaValidar);
$array = null;
$array = mysqli_fetch_array($resValidar);
$horaSinSeg = date("H:i", strtotime($horaCita));
if ($array == null) {
    $consulta = "INSERT INTO citasmedicas(tipoMascota, nombreMascota, edad, idRaza, fecha, hora, nombreAmo, apellidoAmo, tipoIdentificacion, IdentificacionAmo)
    VALUES('{$tipoMascota}', '{$nombreMascota}','{$edadMascota}', '{$idRaza}', '{$fechaCita}', '{$horaCita}', '{$nombreAmo}','{$apellidoAmo}','{$tipoIdentificacion}','{$identificacionAmo}');";

    $res = $conexion->enviarDatos($consulta);
    if ($res == true) {
        echo json_encode("1");
    } else {
        echo json_encode("0");
    }
}else if($array["fecha"]==$fechaCita && date("H:i", strtotime($array["hora"])==$horaSinSeg)){
    echo json_encode(("2"));
}
?>
