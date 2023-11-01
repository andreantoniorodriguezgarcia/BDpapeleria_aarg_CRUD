<html>
<head>
	<title>registrarse</title>
</head>

<body>
<a href="index.php">inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo_electronico = $_POST['correo_electronico'];
	$usuario = $_POST['nombre_de_usuario'];
	$contra = $_POST['contrasena'];

	if($usuario == "" || $contra == "" || $nombre == "" || $correo_electronico == "") {
		echo "todos los campos deben estar llenos. Uno o mas campos están vacíos.";
		echo "<br/>";
		echo "<a href='registrarse.php'>regresar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO inicio_de_sesion(nombre, correo_electronico, nombre_de_usuario, contrasena) VALUES('$nombre', '$correo_electronico', '$usuario', md5('$contra'))")
			or die("no se pudo insertar el registro.");
			
		echo "registro añadido exitosamente";
		echo "<br/>";
		echo "<a href='inicio_de_sesion.php'>inicio_de_sesion</a>";
	}
} else {
?>
	<p><font size="+2">registrarse</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>correo electronico</td>
				<td><input type="text" name="correo_electronico"></td>
			</tr>			
			<tr> 
				<td>nombre de usuario</td>
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
