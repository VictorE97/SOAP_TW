<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$idArbitro = isset($_POST['idEquipo'])? $_POST['idEquipo'] : '';
$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos'])? $_POST['apellidos'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/actualizarArbitro.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('actualizarArbitro',array('idEquipo' => $idEquipo,'nombre' => $nombre,'apellidos' => $apellidos),'http://localhost/2020TW/Servicio/actualizarArbitrp'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Actualizar Arbitro</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Actualizar arbitro</h1>
	<div>
		<form action="#" method="POST" name='actualizarArbitro'>
			<div>
				<label>Id  del arbitro</label>
				<input type="text" name="idArbitro" id="idArbitro" placeholder="Escribe id del arbitro" required>
			</div>
			<div>
				<label>Nombre del arbitro</label>
				<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del arbitro" required>
			</div>
			<div>
				<label>Apellidos del arbitro:</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del arbitro" required>
			</div>
			<button type="submit" name="sub">Actualizar arbitro</button>
		</form>		

	</div>

</body>
</html>