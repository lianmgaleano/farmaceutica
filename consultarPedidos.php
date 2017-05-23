<?php

header("Access-Control-Allow-Origin: *");
include("conexion.php");
session_start();

$sentencia = "SELECT COUNT(*) pedidos, PT.nombre FROM pedido P LEFT JOIN producto PT ON PT.idproducto = P.id_producto WHERE id_usuario = '".$_SESSION["idusuario"]."'";

$query = mysqli_query($conexion,$sentencia);

$cantidadRegistros = mysqli_num_rows($query);
echo "<div class='table-responsive'>";
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Pedidos</th>";
echo "<th>Producto</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
if($cantidadRegistros > 0){
	while($row = mysqli_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$row["pedidos"]."</td>";
		echo "<td>".$row["nombre"]."</td>";
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