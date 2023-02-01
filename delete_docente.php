<?php

include 'php/db.php';
include 'php/funciones.php';

$id = $_GET['id'];
$id = limpiarId($id);

$delete_docente = "DELETE FROM docentes WHERE id_docente = $id";

if ($conexion -> query($delete_docente) === TRUE) {
	echo "Borrado con éxito!";
	header("Location: create_docente.php");
} else {
	echo "Error: " . $conexion -> error;
}

?>