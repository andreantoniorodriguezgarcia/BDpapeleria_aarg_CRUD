<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: inicio_de_sesion.php');
}
?>

<html>
<head>
	<title>añadir datos</title>
</head>

<body>
<?php
//incluyendo el archivo con conexion a base de datos
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$id_pedido = $_POST['id_pedido'];
	$direccion = $_POST['direccion'];
	$id_cliente = $_POST['id_cliente'];
	$fecha_del_pedido = $_POST['fecha_del_pedido'];	
	$fecha_de_envio = $_POST['fecha_de_envio'];	
	$fecha_de_entrega = $_POST['fecha_de_entrega'];
	$paqueteria = $_POST['paqueteria'];
	$cantidad = $_POST['cantidad'];	
	$id_empleado = $_POST['id_empleado'];
	$id_inicio_de_sesion = $_SESSION['id'];
		
	//revisando campos vacios
	if(empty($id_pedido)||empty($direccion) || empty($id_cliente) || empty($fecha_del_pedido)||empty($fecha_de_envio)||empty($fecha_de_entrega)||empty($paqueteria)||empty($cantidad)||empty($id_empleado)) {
		
		if(empty($id_pedido)) {
			echo "<font color='red'>campo de id pedido está vacío</font><br/>";
		}

		if(empty($direccion)) {
			echo "<font color='red'>campo de direccion está vacío</font><br/>";
		}
		
		if(empty($id_cliente)) {
			echo "<font color='red'>campo de id cliente está vacío</font><br/>";
		}
		
		if(empty($fecha_del_pedido)) {
			echo "<font color='red'>campo de fecha del pedido está vacío</font><br/>";
		}
		if(empty($fecha_de_envio)) {
			echo "<font color='red'>campo de fecha de envio está vacío</font><br/>";
		}	
		if(empty($fecha_de_entrega)) {
			echo "<font color='red'>campo de fecha del entrega está vacío</font><br/>";
		}	
		if(empty($paqueteria)) {
			echo "<font color='red'>campo de paqueteria está vacío</font><br/>";
		}	
		if(empty($cantidad)) {
			echo "<font color='red'>campo de cantidad está vacío</font><br/>";
		}
		if(empty($id_empleado)) {
			echo "<font color='red'>campo de id empleado está vacío</font><br/>";
		}	
	} else { 
		// si todos los campos están llenos
			
		//insertando datos a la base	
		$resultado = mysqli_query($mysqli, "INSERT INTO pedidos(id_pedido, direccion, id_cliente, fecha_del_pedido, fecha_de_envio, fecha_de_entrega, paqueteria, cantidad, id_empleado, id_inicio_de_sesion) VALUES('$id_pedido','$direccion','$id_cliente','$fecha_del_pedido','$fecha_de_envio','$fecha_de_entrega','$paqueteria','$cantidad','$id_empleado', '$id_inicio_de_sesion')");
		
		//mostrar mensaje de exito
		echo "<font color='green'>informacion añadida exitosamente.";
		echo "<br/><a href='ver.php'>ver resultado</a>";
	}
}
?>
</body>
</html>
