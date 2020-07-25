<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['idPartido'])? $_POST['idPartido'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/eliminarPartido.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('eliminarPartido',array('idPartido' => $idPartido),'http://localhost/2020TW/Servicio/eliminarPartido'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eliminar Partido</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Eliminar partido</h1>
	<div>
		<form action="#" method="POST" name='eliminarPartido'>
			<div>
				<label>Id del partido</label>
				<input type="text" name="idPartido" id="idPartido" placeholder="Escribe el id del partido" required>
			</div>
			
			
			<button type="submit" name="sub">Eliminar partido</button>
		</form>		

	</div>

</body>
</html>