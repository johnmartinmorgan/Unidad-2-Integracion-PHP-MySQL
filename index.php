<?php 

include 'php/db.php';

$stmt_areas = "SELECT area FROM areas";
$result_areas = $conexion -> query($stmt_areas);

$stmt_orientaciones = "SELECT orientacion FROM orientaciones";
$result_orientaciones = $conexion -> query($stmt_orientaciones);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'inc/head.php' ?>
	<title>Bibliotecología y Ciencias de la Información</title>
</head>
<body>
	<?php include 'inc/nav.php' ?>
	<div class="container">
		<div class="row pt-3 mt-3">
			<div class="alert alert-warning" role="alert">
				El error en los acentos se debe a un cotejamiento incorrecto de la base de datos.
			</div>
			<div class="alert alert-success" role="alert">
				"Insertar y mostrar registros provenientes de la BD" se observa en: <a href="create_materia.php">Crear materia</a> y <a href="create_docente.php">Crear docente</a>
			</div>
		</div>
		<div class="row py-3 my-3">
			<div class="col-md-12 col-lg-6">
				
				<h2>Áreas</h2>
				<ol>
				<?php
				while ($area = $result_areas -> fetch_assoc()) { ?>
					<li><?php echo $area['area'] ?></li>
				<?php } ?>
				</ol>
			</div>

			<div class="col-md-12 col-lg-6">
				<h2>Orientaciones</h2>
				<ul>
				<?php
				while ($orientacion = $result_orientaciones -> fetch_assoc()) { ?>
					<li><?php echo $orientacion['orientacion'] ?></li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<div class="row pb-3 my-3 g-3">
			<h2>Correlatividades</h2>
			<div class="col-md-12 col-lg-4">
				<b>Fundamentos de la Bibliotecología y la Ciencia de la Información</b> es previa a:
				<br>
				<ul>
					<li>Clasificación del conocimiento</li>
					<li>Fuentes de información generales</li>
					<li>Automatización en unidades de información</li>
					<li>Administración de unidades de información</li>
				</ul>
			</div>
			<div class="col-md-12 col-lg-4">
				<b>Búsqueda y utilización de la información</b> es previa a:
				<ul>
					<li>Clasificación del conocimiento</li>
					<li>Fuentes de información generales</li>
				</ul>
			</div>
			<div class="col-md-12 col-lg-4">
			<b>Administración de unidades de información</b> es previa a:
				<ul>
					<li>Automatización en unidades de información</li>
				</ul>
			</div>
			<div class="col-md-12 col-lg-4">
				<b>Principios de catalogación</b> es previa a:
				<ul>
					<li>Automatización en unidades de información</li>
				</ul>
			</div>
			<div class="col-md-12 col-lg-4">
				<b>Fuentes de información generales</b> es previa a:
				<ul>
					<li>Servicio de referencia e información</li>
				</ul>
			</div>
			<div class="col-md-12 col-lg-4">
				<b>Métodos de investigación en Bibliotecología y Ciencia de la Información</b> es previa a:
				<ul>
					<li>Elaboración de proyectos de investigación en Bibliotecología y Ciencia de la Información</li>
				</ul>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>