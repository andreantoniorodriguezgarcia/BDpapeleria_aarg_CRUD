<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi página!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM inicio_de_sesion");
	?>
				
		bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='cerrar_sesion.php'>cerrar sesión</a><br/>
		<br/>
		<a href='ver.php'>ver y añadir pedidos</a>
		<br/><br/>
	<?php	
	} else {
		echo "debes tener sesión iniciada para ver esta pagina .<br/><br/>";
		echo "<a href='inicio_de_sesion.php'>iniciar sesión</a> | <a href='registrarse.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		creado por <a href="http://blog.chapagain.com.np" title="Mukesh Chapagain">Mukesh Chapagain</a>
	</div>
</body>
</html>
