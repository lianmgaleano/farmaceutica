<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");
$nombre = $_POST["nombre"];
$id_tipo = $_POST["id_tipo"];
$id_marca = $_POST["id_marca"];
$precio = $_POST["precio"];
session_start();

if($nombre == "" && $id_tipo == 0 && $id_marca == 0 && isset($precio)){
	$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca";
}elseif($nombre != "" && $id_tipo == 0 && $id_marca == 0 && isset($precio)){
	$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca WHERE P.nombre LIKE '%".$nombre."%'";
}elseif($nombre != "" && $id_tipo != "0" && $id_marca == "0" && isset($precio)){
	$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca WHERE P.nombre LIKE '%".$nombre."%' AND T.idtipo = '".$id_tipo."'";
}elseif($nombre != "" && $id_tipo != "0" && $id_marca != "0" && isset($precio)){
	$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca WHERE P.nombre LIKE '%".$nombre."%' AND T.idtipo = '".$id_tipo."' AND M.idmarca = '".$id_marca."'";
}elseif($nombre != "" && $id_tipo != "0" && $id_marca != "0" && $precio != ""){
	$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca WHERE P.nombre LIKE '%".$nombre."%' AND T.idtipo = '".$id_tipo."' AND M.idmarca = '".$id_marca."' AND P.precio = '".$precio."'";
	echo $sentencia;
}else{
	$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca";
}

$query = mysqli_query($conexion,$sentencia);

$cantidadRegistros = mysqli_num_rows($query);
echo "<div class='table-responsive'>";
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Nombre</th>";
echo "<th>Tipo</th>";
echo "<th>Marca</th>";
echo "<th>Precio</th>";
echo "<th>Acción</th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
if($cantidadRegistros > 0){
	while($row = mysqli_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$row["id_producto"]."</td>";
		echo "<td>".$row["nombre_producto"]."</td>";
		echo "<td>".$row["tipo"]."</td>";
		echo "<td>".$row["marca"]."</td>";
		echo "<td>".$row["precio"]."</td>";
		echo "<td><button class='order' id-producto='".$row["id_producto"]."'>Pedir</button></td>";
		echo "</tr>";
	}
}else{
	echo "No hay registros";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
mysqli_close($conexion);

?>