<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "bibliotecologia";

$servername = "localhost";
$username = "morganya_john";
$password = "EDWsHso%^x_i";
$dbname = "morganya_morgan_john";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion -> connect_error) {
	die("Conexión fallida: " . $conexion -> connect_error);
}

?> 