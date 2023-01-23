<?php 

function limpiarId($id) {
	$id = trim($id);
	$id = stripslashes($id);
	$id = htmlspecialchars($id);
	return $id;
}

?>