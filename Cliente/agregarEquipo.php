<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$slogan = isset($_POST['slogan'])? $_POST['slogan'] : '';
$partidosGanados = isset($_POST['partidosGanados'])? $_POST['partidosGanados'] : '';
$partidosEmpatados = isset($_POST['partidosEmpatados'])? $_POST['partidosEmpatados'] : '';
$partidosPerdidos = isset($_POST['partidosPerdidos'])? $_POST['partidosPerdidos'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/agregarEquipo.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('agregarEquipo',array('nombre' => $nombre,'slogan' => $slogan,'partidosGanados' => $partidosGanados,'partidosEmpatados' => $partidosEmpatados,'partidosPerdidos' => $partidosPerdidos),'http://localhost/2020TW/Servicio/agregarEquipo'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar Equipo</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Agregar Equipo</h1>
	<div>
		<form action="#" method="POST" name='agregarEquipo'>
			<div>
				<label>Nombre: </label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
			</div>
			<div>
				<label>Slogan:</label>
				<input type="text" name="slogan" id="slogan" placeholder="Ingrese el slogan" required>
			</div>
			<div>
				<label>Partidos Ganados</label>
				<input type="text" name="partidosGanados" id="partidosGanados" placeholder="Partidos Ganados" required>
			</div>
			<div>
				<label>Partidos Empate</label>
				<input type="text" name="partidosEmpatados" id="partidosEmpatados" placeholder="Partidos Empate" required>
			</div>
			<div>
				<label>Partidos Perdidos</label>
				<input type="text" name="partidosPerdidos" id="partidosPerdidos" placeholder="Partidos Perdidos" required>
			</div>
			<button type="submit" name="sub">Agregar equipo</button>
		</form>		

	</div>

</body>
</html>