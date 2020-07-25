<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('actualizarPartido', 'urn:localhost/2020TW/Servicio/actualizarPartido');

function actualizarPartido ($idPartido, $hora, $fecha, $lugar, $resultadoFinal, $idArbitro)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "UPDATE partido SET hora = '$hora', fecha  = '$fecha', lugar = '$lugar', resultadoFinal  = '$resultadoFinal', idArbitro  = '$idArbitro'  WHERE idPartido = '$idPartido' ");
	
}

$server->register('actualizarPartido',array('idPartido' => 'xsd:string','hora' => 'xsd:string','fecha' => 'xsd:string','lugar' => 'xsd:string','resultadoFinal' => 'xsd:string','idArbitro' => 'xsd:string'),array('return' => 'xsd:string'));

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