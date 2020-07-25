<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$fecha = isset($_POST['fecha'])? $_POST['fecha'] : '';
$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$idEquipo = isset($_POST['idEquipo'])? $_POST['idEquipo'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/agregarTorneo.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('agregarTorneo',array('fecha' => $fecha,'nombre' => $nombre,'idEquipo' => $idEquipo),'http://localhost/2020TW/Servicio/agregarTorneo'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar Torneo</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Agregar Torneo</h1>
	<div>
		<form action="#" method="POST" name='agregarTorneo'>
			<div>
				<label>Fecha: </label>
				<input type="text" name="fecha" id="fecha" placeholder="Fecha" required>
			</div>
			<div>
				<label>Nombre:</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
			</div>
			<div>
				<label>Id Equipo:</label>
				<input type="text" name="idEquipo" id="idEquipo" placeholder="idEquipo" required>
			</div>
			
			<button type="submit" name="sub">Agregar torneo</button>
		</form>		

	</div>

</body>
</html>