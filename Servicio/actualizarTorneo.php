<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('actualizarTorneo', 'urn:localhost/2020TW/Servicio/actualizarTorneo');

function actualizarTorneo ($idTorneo, $fecha, $nombre, $idEquipo)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "UPDATE torneo SET fecha = '$fecha', nombre  = '$nombre', idEquipo = '$idEquipo'  WHERE idTorneo = '$idTorneo' ");
	
}

$server->register('actualizarTorneo',array('idTorneo' => 'xsd:string','fecha' => 'xsd:string','nombre' => 'xsd:string','idEquipo' => 'xsd:string'),array('return' => 'xsd:string'));

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