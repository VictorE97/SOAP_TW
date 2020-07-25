<?php
require_once('../Lib/nusoap.php');


$server = new soap_server();
$server->configureWSDL('agregarAdministrador', 'urn:localhost/2020TW/Servicio/agregarEquipo');

function agregarAdministrador ($nombre, $apellidos, $fechaNacimiento)
{
	include ("../Conexion/Conexion.php");//Aqui debes poner tu archivo de conexion
	$sql = mysqli_query($conn, "INSERT INTO administrador (nombre, apellidos, fechaNacimiento) VALUES ('$nombre', '$apellidos', '$fechaNacimiento') ");
	
}

$server->register('agregarAdministrador',array('nombre' => 'xsd:string','apellidos' => 'xsd:string','fechaNacimiento' => 'xsd:string'),array('return' => 'xsd:string'));

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