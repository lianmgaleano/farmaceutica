<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");

$correo = $_POST["correo"];
$password = $_POST["password"];
session_start();
if (isset($_SESSION["idusuario"])) {
session_unset(); 
session_destroy();
}
$sentencia = "SELECT * FROM usuario WHERE correo = '".$correo."'AND password ='".$password."'";

$query = mysqli_query($conexion,$sentencia);

$cantidadRegistros = mysqli_num_rows($query);

if($cantidadRegistros > 0){
	while($row = mysqli_fetch_array($query)){
		if (session_id() == '') {
			session_start();
		}
		$_SESSION["idusuario"]=$row['idusuario'];
		echo $_SESSION["idusuario"];
	}
}else{
	echo "Usuario o clave erroneas";
}

mysqli_close($conexion);

?>