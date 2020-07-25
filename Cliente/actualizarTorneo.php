<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$idTorneo = isset($_POST['idTorneo'])? $_POST['idTorneo'] : '';
$fecha = isset($_POST['fecha'])? $_POST['fecha'] : '';
$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$idEquipo = isset($_POST['idEquipo'])? $_POST['idEquipo'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/actualizarTorneo.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('actualizarTorneo',array('idTorneo' => $idTorneo,'fecha' => $fecha,'nombre' => $nombre,'idEquipo' => $idEquipo),'http://localhost/2020TW/Servicio/actualizarTorneo'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Actualizar Torneo</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Actualizar torneo</h1>
	<div>
		<form action="#" method="POST" name='actualizarTorneo'>
			<div>
				<label>Id  del torneo</label>
				<input type="text" name="idTorneo" id="idTorneo" placeholder="Id Torneo" required>
			</div>
			<div>
				<label>Fecha</label>
				<input type="text" name="fecha" id="fecha" placeholder="Fecha" required>
			</div>
			<div>
				<label>Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
			</div>
			<div>
				<label>Id Equipo</label>
				<input type="text" name="idEquipo" id="idEquipo" placeholder="Id Equipo" required>
			</div>
			<button type="submit" name="sub">Actualizar torneo</button>
		</form>		

	</div>

</body>
</html>