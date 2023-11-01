<?php session_start(); ?>
<html>
<head>
	<title>inicio de sesión</title>
</head>

<body>
<a href="index.php">inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['nombre_de_usuario']);
	$contra = mysqli_real_escape_string($mysqli, $_POST['contrasena']);

	if($usuario == "" || $contra == "") {
		echo "campo de usuario o contraseña está vacio.";
		echo "<br/>";
		echo "<a href='inicio_de_sesion.php'>regresar</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM inicio_de_sesion WHERE nombre_de_usuario='$usuario' AND contrasena=md5('$contra')")
					or die("no se pudo ejecutar la actualizacion del registro.");
		
		$fila = mysqli_fetch_assoc($resultado);
		
		if(is_array($fila) && !empty($fila)) {
			$usuario_valido = $fila['nombre_de_usuario'];
			$_SESSION['valid'] = $usuario_valido;
			$_SESSION['nombre'] = $fila['nombre'];
			$_SESSION['id'] = $fila['id'];
		} else {
			echo "nombre o contraseña invalido.";
			echo "<br/>";
			echo "<a href='inicio_de_sesion.php'>regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">inicio de sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">nombre_de_usuario</td>
				<td><input type="text" name="nombre_de_usuario"></td>
			</tr>
			<tr> 
				<td>contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
