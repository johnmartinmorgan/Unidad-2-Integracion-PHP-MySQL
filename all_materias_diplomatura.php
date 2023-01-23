<?php 
include 'php/db.php';

$all_materias = "	SELECT * 
					FROM materias
					LEFT JOIN areas ON materias.area_materia = areas.id_area 
					LEFT JOIN orientaciones ON materias.orientacion_materia = orientaciones.id_orientacion 
					LEFT JOIN docentes ON materias.titular_materia = docentes.id_docente
					WHERE orientacion_materia IS NULL AND area_materia IS NOT NULL
					ORDER BY id_area, cuatrimestre_materia";
$result_all_materias = $conexion -> query($all_materias);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'inc/head.php' ?>
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
	<title>Materias de diplomatura</title>
</head>
<body>

	<?php include 'inc/nav.php' ?>

	<div class="container-fluid">
		<div class="row py-5">
			<div class="col-12">
				<table class="table table-hover" id="tabla">
					<thead>
						<tr>
							<th scope="col">Materia</th>
							<th scope="col">Área</th>
							<th scope="col">Titular</th>
							<th scope="col">Cuatrimestre</th>
							<th scope="col">Régimen</th>
							<th scope="col">Obligatoriedad</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($materia = $result_all_materias -> fetch_assoc()) { ?>
						<tr>
							<td>
								<a href="read_materia.php?id=<?php echo $materia['id_materia'] ?>">
									<?php 
									if ($materia['opt_oblig'] == 'Obligatoria') {
										echo "<b>" . $materia['materia'] . "</b>";
									} else {
										echo $materia['materia'] ;	
									} ?>
								</a>
							</td>
							<td><?php echo $materia['area'] ?></td>
							<td><?php echo $materia['apellido_docente'] ?></td>
							<td><?php echo $materia['cuatrimestre_materia'] ?></td>
							<td><?php echo $materia['regimen_materia'] ?></td>
							<td><?php echo $materia['opt_oblig'] ?></td>

						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
	<script src="js/datatables.js"></script>
	
</body>
</html>