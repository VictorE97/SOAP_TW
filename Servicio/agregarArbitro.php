<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('agregarArbitro', 'urn:localhost/2020TW/Servicio/agregarArbitro');

function agregarArbitro ($nombre, $apellidos)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "INSERT INTO arbitro (nombre, apellidos) VALUES ('$nombre', '$apellidos') ");
	
}

$server->register('agregarArbitro',array('nombre' => 'xsd:string','apellidos' => 'xsd:string'),array('return' => 'xsd:string'));

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