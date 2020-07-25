<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos'])? $_POST['apellidos'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/agregarArbitro.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('agregarArbitro',array('nombre' => $nombre,'apellidos' => $apellidos),'http://localhost/2020TW/Servicio/agregarArbitro'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar Arbitro</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Agregar arbitro</h1>
	<div>
		<form action="#" method="POST" name='agregarArbitro'>
			<div>
				<label>Nombre del arbitro</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre del arbitro" required>
			</div>
			<div>
				<label>Apellidos del arbitro:</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del arbitro" required>
			</div>
			<button type="submit" name="sub">Agregar arbitro</button>
		</form>		

	</div>

</body>
</html>