<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: inicio_de_sesion.php');
}
?>

<?php
//incluye el archivo de conexion a base de datos
include_once("conexion.php");

//obtniendo la informacion en orden descendente
$resultado = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE id_inicio_de_sesion=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>pagina de inicio</title>
</head>

<body>
	<a href="index.php">inicio</a> | <a href="anadir.html">añadir nuevos datos</a> | <a href="cerrar_sesion.php">cerrar sesión</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>id_pedido</td>
			<td>direccion</td>
			<td>id cliente</td>
			<td>fecha del pedido</td>
			<td>fecha de envio</td>
			<td>fecha de entrega</td>
			<td>paqueteria</td>
			<td>cantidad</td>
			<td>id_empleado</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_pedido']."</td>";
			echo "<td>".$res['direccion']."</td>";
			echo "<td>".$res['id_cliente']."</td>";
			echo "<td>".$res['fecha_del_pedido']."</td>";	
			echo "<td>".$res['fecha_de_envio']."</td>";	
			echo "<td>".$res['fecha_de_entrega']."</td>";	
			echo "<td>".$res['paqueteria']."</td>";	
			echo "<td>".$res['cantidad']."</td>";
			echo "<td>".$res['id_empleado']."</td>";		
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"borrar.php?id=$res[id]\" onClick=\"return confirm('estas seguro de borrar?')\">borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
