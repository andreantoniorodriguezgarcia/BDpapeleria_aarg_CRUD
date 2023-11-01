<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//incluye el archivo de conexion a base de datos
include("conexion.php");

//obtiene el id del url
$id = $_GET['id'];

//borra la fila de la tabla
$result=mysqli_query($mysqli, "DELETE FROM pedidos WHERE id=$id");

//redirige a la pagina de mostrar (ver.php)
header("Location:ver.php");
?>

