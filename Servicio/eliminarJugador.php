<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('eliminarJugador', 'urn:localhost/2020TW/Servicio/eliminarJugador');

function eliminarJugador ( $nombre)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "DELETE FROM jugador WHERE nombre = '$nombre'");
	
}

$server->register('eliminarJugador',array('nombre' => 'xsd:string'));

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