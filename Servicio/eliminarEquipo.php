<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('eliminarEquipo', 'urn:localhost/2020TW/Servicio/eliminarEquipo');

function eliminarEquipo ( $nombre)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "DELETE FROM equipo WHERE nombre = '$nombre'");
	
}

$server->register('eliminarEquipo',array('nombre' => 'xsd:string'));

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