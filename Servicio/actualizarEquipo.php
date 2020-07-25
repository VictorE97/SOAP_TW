<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('actualizarEquipo', 'urn:localhost/2020TW/Servicio/actualizarEquipo');

function actualizarEquipo ($idEquipo, $nombre, $slogan, $partidosGanados, $partidosEmpatados, $partidosPerdidos)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "UPDATE equipo SET nombre = '$nombre', slogan  = '$slogan', partidosGanados = '$partidosGanados', partidosEmpatados  = '$partidosEmpatados', partidosPerdidos  = '$partidosPerdidos'  WHERE idEquipo = '$idEquipo' ");
	
}

$server->register('actualizarEquipo',array('idEquipo' => 'xsd:string','nombre' => 'xsd:string','slogan' => 'xsd:string','partidosGanados' => 'xsd:string','partidosEmpatados' => 'xsd:string','partidosPerdidos' => 'xsd:string'),array('return' => 'xsd:string'));

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