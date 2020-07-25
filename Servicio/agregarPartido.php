<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('agregarPartido', 'urn:localhost/2020TW/Servicio/agregarPartido');

function agregarPartido ($hora, $fecha, $lugar, $resultadoFinal, $idArbitro)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "INSERT INTO partido (hora, fecha, lugar, resultadoFinal, idArbitro) VALUES ('$hora', '$fecha', '$lugar', '$resultadoFinal', $idArbitro') ");
	
}

$server->register('agregarPartido',array('hora' => 'xsd:string','fecha' => 'xsd:string','lugar' => 'xsd:string','resultadoFinal' => 'xsd:string','idArbitro' => 'xsd:string'),array('return' => 'xsd:string'));

if (isset($HTTP_RAW_POST_DATA))
{
	$input = $HTTP_RAW_POST_DATA;
}
else
{
	$input = implode("\r\n", file('php://input'));
}
$server->service($input);
exit;

?>