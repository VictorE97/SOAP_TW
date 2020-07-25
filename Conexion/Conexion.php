<?php
    $servername ="localhost";
	$username="root";
	$password="123456";
	$dbname ="torneofutbol";

	$conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die("conexion fallida: ".$conn->connect_error);
    }
?>