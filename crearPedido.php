<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");
session_start();

$id_producto = $_POST["id_producto"];
$id_usuario = $_SESSION["idusuario"];

$sentencia = "INSERT INTO pedido (id_producto,id_usuario) VALUES('".$id_producto."','".$id_usuario."')";

$query = mysqli_query($conexion,$sentencia);

if($query){
	echo "Se creo el pedido co exito";
}else{
	echo "No fue posible crear el pedido";
}

mysqli_close($conexion);

?>