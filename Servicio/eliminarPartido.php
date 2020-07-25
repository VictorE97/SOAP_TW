<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('eliminarPartido', 'urn:localhost/2020TW/Servicio/eliminarPartido');

function eliminarPartido ( $idPartido)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "DELETE FROM partido WHERE idPartido = '$idPartido'");
	
}

$server->register('eliminarPartido',array('idPartido' => 'xsd:string'));

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