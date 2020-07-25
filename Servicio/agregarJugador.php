<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('agregarJugador', 'urn:localhost/2020TW/Servicio/agregarJugador');

function agregarJugador ($nombre, $foto, $nick, $numJugador, $posicion, $idEquipo)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "INSERT INTO jugador (nombre, foto, nick, numJugador, posicion, idEquipo) VALUES ('$nombre', '$foto', '$nick', '$numJugador', '$posicion', '$idEquipo') ");
	
}

$server->register('agregarJugador',array('nombre' => 'xsd:string','foto' => 'xsd:string','nick' => 'xsd:string','numJugador' => 'xsd:string','posicion' => 'xsd:string','idEquipo' => 'xsd:string'),array('return' => 'xsd:string'));

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