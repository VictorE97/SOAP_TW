<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$hora = isset($_POST['hora'])? $_POST['hora'] : '';
$fecha = isset($_POST['fecha'])? $_POST['fecha'] : '';
$lugar = isset($_POST['lugar'])? $_POST['lugar'] : '';
$resultadoFinal = isset($_POST['resultadoFinal'])? $_POST['resultadoFinal'] : '';
$idArbitro = isset($_POST['idArbitro'])? $_POST['idArbitro'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/agregarPartido.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('agregarPartido',array('hora' => $hora,'fecha' => $fecha,'lugar' => $lugar,'resultadoFinal' => $resultadoFinal,'idArbitro' => $idArbitro),'http://localhost/2020TW/Servicio/agregarPartido'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar Partido</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Agregar Partido</h1>
	<div>
		<form action="#" method="POST" name='agregarPartido'>
			<div>
				<label>Hora: </label>
				<input type="text" name="hora" id="hora" placeholder="Hora" required>
			</div>
			<div>
				<label>Fecha:</label>
				<input type="text" name="fecha" id="fecha" placeholder="Fecha" required>
			</div>
			<div>
				<label>Lugar:</label>
				<input type="text" name="lugar" id="lugar" placeholder="Lugar" required>
			</div>
			<div>
				<label>Resultado Final:</label>
				<input type="text" name="resultadoFinal" id="resultadoFinal" placeholder="Resultado Final" required>
			</div>
			<div>
				<label>Id Arbitro:</label>
				<input type="text" name="idArbitro" id="idArbitro" placeholder="Id Arbitro" required>
			</div>
			<button type="submit" name="sub">Agregar partido</button>
		</form>		

	</div>

</body>
</html>