<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");
session_start();

$sentencia = "SELECT P.idproducto id_producto, P.nombre nombre_producto, T.nombre tipo, M.nombre marca, P.precio precio FROM producto P LEFT JOIN tipo T ON T.idtipo = P.id_tipo LEFT JOIN marca M ON M.idmarca = P.id_marca";

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