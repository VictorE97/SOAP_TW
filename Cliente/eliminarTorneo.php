<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/eliminarTorneo.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('eliminarTorneo',array('nombre' => $nombre),'http://localhost/2020TW/Servicio/eliminarTorneo'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eliminar Torneo</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Eliminar torneo</h1>
	<div>
		<form action="#" method="POST" name='eliminarTorneo'>
			<div>
				<label>Nombre del torneo</label>
				<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del torneo" required>
			</div>
			
			
			<button type="submit" name="sub">Eliminar torneo</button>
		</form>		

	</div>

</body>
</html>