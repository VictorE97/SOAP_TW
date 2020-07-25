<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('actualizarArbitro', 'urn:localhost/2020TW/Servicio/actualizarArbitro');

function actualizarArbitro ($idArbitro, $nombre, $apellidos)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "UPDATE arbitro SET nombre = '$nombre', apellidos  = '$apellidos' WHERE idArbitro = '$idArbitro' ");
	
}

$server->register('actualizarArbitro',array('idArbitro' => 'xsd:string','nombre' => 'xsd:string','apellidos' => 'xsd:string'),array('return' => 'xsd:string'));

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