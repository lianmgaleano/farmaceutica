<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");

$nombre = $_POST["nombre"];
$id_tipo = $_POST["id_tipo"];
$id_marca = $_POST["id_marca"];
$precio = $_POST["precio"];

$sentencia = "INSERT INTO producto (nombre,id_tipo,id_marca,precio) VALUES('".$nombre."','".$id_tipo."','".$id_marca."','".$precio."')";

$query = mysqli_query($conexion,$sentencia);

if($query){
	echo "Se creo el producto ".$nombre;
}else{
	echo "No fue posible crear el producto";
}

mysqli_close($conexion);

?>