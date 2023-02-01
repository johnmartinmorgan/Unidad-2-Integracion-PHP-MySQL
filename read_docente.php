<?php

include 'php/db.php';
include 'php/funciones.php';

$id = $_GET['id'];
$id = limpiarId($id);

$buscar_id = "SELECT * FROM docentes WHERE id_docente = $id";
$result = $conexion -> query($buscar_id);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.min.css">
	<title>Docente id <?php echo $id ?></title>
</head>
<body>
	<?php include 'inc/nav.php' ?>
	<div class="container py-3">
		<div class="row py-3">
			<h2 class="display-5">Docente id <?php echo $id ?></h2>
			<ul>
				<?php while ($docente = $result -> fetch_assoc()) { ?>
					<li>Nombre: <?php echo utf8_encode($docente['nombre_docente'] . " " . $docente['apellido_docente']) ?></li>
					<li>Contacto: <?php echo utf8_encode($docente['contacto_docente']) ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>