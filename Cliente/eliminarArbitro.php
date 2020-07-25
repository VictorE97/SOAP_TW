<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/eliminarArbitro.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('eliminarArbitro',array('nombre' => $nombre),'http://localhost/2020TW/Servicio/eliminarArbitro'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eliminar Arbitro</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Eliminar arbitro</h1>
	<div>
		<form action="#" method="POST" name='eliminarArbitro'>
			<div>
				<label>Nombre del arbitro</label>
				<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del arbitro" required>
			</div>
			
			
			<button type="submit" name="sub">Eliminar arbitro</button>
		</form>		

	</div>

</body>
</html>