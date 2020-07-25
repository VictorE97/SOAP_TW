<?php
require_once('../Lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', '0'); 
include ("../Conexion/Conexion.php"); //Igual aqui tu conexion a la base de datos

$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
$foto = isset($_POST['foto'])? $_POST['foto'] : '';
$nick = isset($_POST['nick'])? $_POST['nick'] : '';
$numJugador = isset($_POST['numJugador'])? $_POST['numJugador'] : '';
$posicion = isset($_POST['posicion'])? $_POST['posicion'] : '';
$idEquipo = isset($_POST['idEquipo'])? $_POST['idEquipo'] : '';


$oSoap = new nusoap_client ('http://localhost:8080/2020TW/Servicio/agregarJugador.php?wsdl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$resultado = $oSoap->call('agregarJugador',array('nombre' => $nombre,'foto' => $foto,'nick' => $nick,'numJugador' => $numJugador,'posicion' => $posicion,'idEquipo' => $idEquipo),'http://localhost/2020TW/Servicio/agregarJugador'); //Nuevamente la ubicacion de tu archivo PHP

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar Jugador</title>
	<meta charset="utf-8">
</head>
<body>

	<h1>Agregar Jugador</h1>
	<div>
		<form action="#" method="POST" name='agregarJugador'>
			<div>
				<label>Nombre:</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
			</div>
			<div>
				<label>Foto:</label>
				<input type="text" name="foto" id="foto" placeholder="Foto" required>
			</div>
			<div>
				<label>Nick</label>
				<input type="text" name="nick" id="nick" placeholder="Nick" required>
			</div>
			<div>
				<label>Numero del jugador</label>
				<input type="text" name="numJugador" id="numJugador" placeholder="# de jugador" required>
			</div>
			<div>
				<label>Posicion</label>
				<input type="text" name="posicion" id="posicion" placeholder="Posicion" required>
			</div>
			<div>
				<label>idEquipo</label>
				<input type="text" name="idEquipo" id="idEquipo" placeholder="idEquipo" required>
			</div>
			
			<button type="submit" name="sub">Agregar jugador</button>
		</form>		

	</div>

</body>
</html>