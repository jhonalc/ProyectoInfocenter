<?php
require_once "conexion.php";
$conexion = new Conexion();
$consulta = "SELECT id, raza FROM razas ORDER BY raza ASC;";
$datos = $conexion->retornarDatos($consulta);
$razas = array();
while ($fila = mysqli_fetch_object($datos)) {
   $razas[] = $fila;
}
echo json_encode($razas); // reciba javascript con formato JSON
?>