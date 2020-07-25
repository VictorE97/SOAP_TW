<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos'])? $_POST['apellidos'] : '';
$fechaNacimiento = isset($_POST['fechaNacimiento'])? $_POST['fechaNacimiento'] : '';

$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/agregarAdministrador.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('agregarAdministrador',array('nombre' => $nombre,'apellidos' => $apellidos,'fechaNacimiento' => $fechaNacimiento),'http://localhost/2020TW/Servicio/agregarAdministrador'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar Administrador</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Agregar administrador</h1>
	<div>
		<form action="#" method="POST" name='agregarAdministrador'>
			<div>
				<label>Nombre del administrador</label>
				<input type="text" name="nombre" id="nombre" placeholder="Escribe el nombre del administrador" required>
			</div>
			<div>
				<label>Apellidos del administrador:</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Escribe los apellidos del administrador" required>
			</div>
			<div>
				<label>Fecha de nacimineto del administrador:</label>
				<input type="text" name="fechaNacimiento" id="fechaNacimiento" placeholder="Escribe la fecha de nacimiento del administrador" required>
			</div>
			<button type="submit" name="sub">Agregar administrador</button>
		</form>		

	</div>

</body>
</html>