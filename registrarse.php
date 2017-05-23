<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");

$nombres = $_POST["nombres"];
$correo = $_POST["correo"];
$password = $_POST["password"];

$sentencia = "INSERT INTO usuario (nombres,correo,password) VALUES('".$nombres."','".$correo."','".$password."')";

$query = mysqli_query($conexion,$sentencia);

if($query){
	echo "Se creo usuario ".$correo;
}else{
	echo "No fue posible crear el usuario";
}

mysqli_close($conexion);

?>