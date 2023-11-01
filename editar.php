<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: inicio_de_sesion.php');
}
?>

<?php
// incluyendo la conexion con base de datos
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];

	$id_pedido = $_POST['id_pedido'];
	$direccion = $_POST['direccion'];
	$id_cliente = $_POST['id_cliente'];
	$fecha_del_pedido = $_POST['fecha_del_pedido'];	
	$fecha_de_envio = $_POST['fecha_de_envio'];	
	$fecha_de_entrega = $_POST['fecha_de_entrega'];
	$paqueteria = $_POST['paqueteria'];
	$cantidad = $_POST['cantidad'];	
	$id_empleado = $_POST['id_empleado'];	
	
	//verificando campos vacíos
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
	}else {	
		//actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE pedidos SET id_pedido='$id_pedido', direccion='$direccion', id_cliente='$id_cliente', fecha_del_pedido='$fecha_del_pedido', fecha_de_envio='$fecha_de_envio', fecha_de_entrega='$fecha_de_entrega', paqueteria='$paqueteria', cantidad='$cantidad', id_empleado='$id_empleado' WHERE id=$id");
		//redirige a la pagina de mostrar (ver.php)
		header("Location: ver.php");
	}
}
?>
<?php
//obteniendo id por la url
$id = $_GET['id'];

//selecionando datos asociados con el id particular
$resultado = mysqli_query($mysqli, "SELECT * FROM pedidos WHERE id=$id");

while($res = mysqli_fetch_array($resultado))
{
	$id_pedido = $res['id_pedido'];
	$direccion = $res['direccion'];
	$id_cliente = $res['id_cliente'];
	$fecha_del_pedido = $res['fecha_del_pedido'];
	$fecha_de_envio = $res['fecha_de_envio'];
	$fecha_de_entrega = $res['fecha_de_entrega'];
	$paqueteria = $res['paqueteria'];
	$cantidad = $res['cantidad'];
	$id_empleado = $res['id_empleado'];
}
?>
<html>
<head>	
	<title>editar datos</title>
</head>

<body>
	<a href="index.php">inicio</a> | <a href="ver.php">ver productos</a> | <a href="cerrar_sesion.php">cerrar_sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
		<tr> 
				<td>id_pedido</td>
				<td><input type="text" name="id_pedido" value="<?php echo $id_pedido;?>"></td>
			</tr>
			<tr> 
				<td>direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $direccion;?>"></td>
			</tr>
			<tr> 
				<td>id cliente</td>
				<td><input type="text" name="id_cliente" value="<?php echo $id_cliente;?>"></td>
			</tr>
			<tr> 
				<td>fecha del pedido</td>
				<td><input type="text" name="fecha_del_pedido" value="<?php echo $fecha_del_pedido;?>"></td>
			</tr>
			<tr> 
				<td>fecha de envio</td>
				<td><input type="text" name="fecha_de_envio" value="<?php echo $fecha_de_envio;?>"></td>
			</tr>
			<tr> 
				<td>fecha de entrega</td>
				<td><input type="text" name="fecha_de_entrega" value="<?php echo $fecha_de_entrega;?>"></td>
			</tr>
			<tr> 
				<td>paqueteria</td>
				<td><input type="text" name="paqueteria" value="<?php echo $paqueteria;?>"></td>
			</tr>
			<tr> 
				<td>cantidad</td>
				<td><input type="text" name="cantidad" value="<?php echo $cantidad;?>"></td>
			</tr>
			<tr> 
				<td>id_empleado</td>
				<td><input type="text" name="id_empleado" value="<?php echo $id_empleado;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
