<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/eliminarEquipo.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('eliminarEquipo',array('nombre' => $nombre),'http://localhost/2020TW/Servicio/eliminarEquipo'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eliminar Equipo</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Eliminar equipo</h1>
	<div>
		<form action="#" method="POST" name='eliminarEquipo'>
			<div>
				<label>Nombre del equipo</label>
				<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del equipo" required>
			</div>
			
			
			<button type="submit" name="sub">Eliminar equipo</button>
		</form>		

	</div>

</body>
</html>