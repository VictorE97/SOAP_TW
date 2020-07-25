<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('actualizarJugador', 'urn:localhost/2020TW/Servicio/actualizarJugador');

function actualizarJugador ($nombre, $foto, $nick, $numJugador, $posicion, $idEquipo)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "UPDATE jugador SET nombre = '$nombre', foto  = '$foto', nick = '$nick', numJugador  = '$numJugador', posicion  = '$posicion', idEquipo  = '$idEquipo'  WHERE idJugador = '$idJugador' ");
	
}

$server->register('actualizarJugador',array('idJugador' => 'xsd:string','nombre' => 'xsd:string','foto' => 'xsd:string','nick' => 'xsd:string','numJugador' => 'xsd:string','posicion' => 'xsd:string','idEquipo' => 'xsd:string'),array('return' => 'xsd:string'));

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