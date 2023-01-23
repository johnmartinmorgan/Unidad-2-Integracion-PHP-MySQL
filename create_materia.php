<?php 

include 'php/db.php';

$all_materias = "SELECT * FROM materias ORDER BY materia ASC";
$result_all_materias = $conexion -> query($all_materias);

$all_areas = "SELECT * FROM areas ORDER BY area ASC";
$result_all_areas = $conexion -> query($all_areas);

$all_orientaciones = "SELECT * FROM orientaciones ORDER BY orientacion ASC";
$result_all_orientaciones = $conexion -> query($all_orientaciones);

$all_docentes = "SELECT * FROM docentes ORDER BY apellido_docente ASC";
$result_all_docentes = $conexion -> query($all_docentes);

if (isset($_POST['create'])) {

	$stmt = $conexion -> prepare("	INSERT INTO materias 
									(materia, 
									area_materia, 
									orientacion_materia,
									cuatrimestre_materia,
									regimen_materia,
									opt_oblig,
									descripcion_materia,
									titular_materia,
									adjunto_materia,
									jtp_materia,
									auxiliar_1_materia,
									auxiliar_2_materia,
									contacto_materia,
									fecha_actualizacion) 
									VALUES 
									(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$stmt -> bind_param(	"siissssiiiiiss", 
							$materia, 
							$area_materia, 
							$orientacion_materia,
							$cuatrimestre_materia, 
							$regimen_materia, 
							$opt_oblig,
							$descripcion_materia, 
							$titular_materia,
							$adjunto_materia,
							$jtp_materia,
							$auxiliar_1_materia,
							$auxiliar_2_materia,
							$contacto_materia,
							$fecha_actualizacion
						);

	$materia = htmlspecialchars($_POST['materia']);

	if($_POST['area_materia'] == '') {
		$area_materia = NULL;
	} else {
		$area_materia = $_POST['area_materia'];
	}	
	
	if($_POST['orientacion_materia'] == '') {
		$orientacion_materia = NULL;
	} else {
		$orientacion_materia = $_POST['orientacion_materia'];
	}

	if($_POST['cuatrimestre_materia'] == '') {
		$cuatrimestre_materia = NULL;
	} else {
		$cuatrimestre_materia = $_POST['cuatrimestre_materia'];
	}

	if($_POST['opt_oblig'] == '') {
		$opt_oblig = NULL;
	} else {
		$opt_oblig = $_POST['opt_oblig'];
	}

	if($_POST['descripcion_materia'] == '') {
		$descripcion_materia = NULL;
	} else {
		$descripcion_materia = $_POST['descripcion_materia'];
	}

	if($_POST['regimen_materia'] == '') {
		$regimen_materia = NULL;
	} else {
		$regimen_materia = $_POST['regimen_materia'];
	}

	if($_POST['titular_materia'] == '') {
		$titular_materia = NULL;
	} else {
		$titular_materia = $_POST['titular_materia'];
	}

	if($_POST['adjunto_materia'] == '') {
		$adjunto_materia = NULL;
	} else {
		$adjunto_materia = $_POST['adjunto_materia'];
	}

	if($_POST['jtp_materia'] == '') {
		$jtp_materia = NULL;
	} else {
		$jtp_materia = $_POST['jtp_materia'];
	}

	if($_POST['auxiliar_1_materia'] == '') {
		$auxiliar_1_materia = NULL;
	} else {
		$auxiliar_1_materia = $_POST['auxiliar_1_materia'];
	}

	if($_POST['auxiliar_2_materia'] == '') {
		$auxiliar_2_materia = NULL;
	} else {
		$auxiliar_2_materia = $_POST['auxiliar_2_materia'];
	}

	if($_POST['contacto_materia'] == '') {
		$contacto_materia = NULL;
	} else {
		$contacto_materia = htmlspecialchars($_POST['contacto_materia']);
	}
	
	$fecha_actualizacion = htmlspecialchars($_POST['fecha_actualizacion']);
	
	$stmt -> execute();

	header("Location: create_materia.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.min.css">
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
	<title>Crear materia</title>
</head>

<body>

	<?php include 'inc/nav.php' ?>

	<div class="container">
		<div class="row py-5 g-3">
			<div class="col-md-5 col-sm-12 px-3">
				<table class="table table-hover" id="tabla">
					<thead>
						<tr>
							<th scope="col">Materia</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($materia = $result_all_materias -> fetch_assoc()) { ?>
						<tr>
							<td>
								<a href="read_materia.php?id=<?php echo $materia['id_materia'] ?>"><?php echo $materia['materia'] ?></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-7 col-sm-12">
				<form action="" method="POST">
					<h1>Crear materia</h1>
					<div class="row">
						<div class="col-12 mt-3">
							<label class="form-label">Materia</label>
							<input name="materia" type="text" class="form-control" required>
						</div>
						<div class="col-6 mt-3">
							<label class="form-label">Área</label>
							<select name="area_materia" class="form-select">
								<option value="" selected>Solo se dicta en una licenciatura</option>
								<?php while ($area = $result_all_areas -> fetch_assoc()) { ?>
								<option value="<?php echo $area['id_area']?>"><?php echo $area['area'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-6 mt-3">
							<label class="form-label">Orientación</label>
							<select name="orientacion_materia" class="form-select">
								<option value="" selected>Solo se dicta en la diplomatura</option>
								<?php while ($orientacion = $result_all_orientaciones -> fetch_assoc()) { ?>
								<option value="<?php echo $orientacion['id_orientacion']?>"><?php echo $orientacion['orientacion'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-4 mt-3">
							<label class="form-label">Cuatrimestre</label>
							<select name="cuatrimestre_materia" class="form-select">
								<option value="">Cuatrimestre no determinado</option>
								<option value="1.°">1.°</option>
								<option value="2.°">2.°</option>
								<option value="1.° y 2.°">1.° y 2.°</option>
							</select>
						</div>
						<div class="col-4 mt-3">
							<label class="form-label">Régimen de cursada</label>
							<select name="regimen_materia" class="form-select">
								<option value="EF">EF</option>
								<option value="PD">PD</option>
							</select>
						</div>
						<div class="col-4 mt-3">
							<label class="form-label">Obligatoriedad</label>
							<select name="opt_oblig" class="form-select">
								<option value="Optativa">Optativa</option>
								<option value="Obligatoria">Obligatoria</option>
							</select>
						</div>
						<div class="col-6 mt-3">
							<label class="form-label">Titular</label>
							<select name="titular_materia" class="form-select">
								<option value="" selected>Docente no identificado</option>
								<?php foreach ($result_all_docentes as $docente_titular) { ?>
								<option value="<?php echo $docente_titular['id_docente']?>"><?php echo $docente_titular['apellido_docente'] . ", " . $docente_titular['nombre_docente'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-6 mt-3">
							<label class="form-label">Adjunto</label>
							<select name="adjunto_materia" class="form-select">
								<option value="" selected>Docente no identificado</option>
								<?php foreach ($result_all_docentes as $docente_adjunto) { ?>
								<option value="<?php echo $docente_adjunto['id_docente']?>"><?php echo $docente_adjunto['apellido_docente'] . ", " . $docente_adjunto['nombre_docente'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-4 mt-3">
							<label class="form-label">JTP</label>
							<select name="jtp_materia" class="form-select">
								<option value="" selected>Docente no identificado</option>
								<?php foreach ($result_all_docentes as $docente_jtp) { ?>
								<option value="<?php echo $docente_jtp['id_docente']?>"><?php echo $docente_jtp['apellido_docente'] . ", " . $docente_jtp['nombre_docente'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-4 mt-3">
							<label class="form-label">Auxiliar 1.°</label>
							<select name="auxiliar_1_materia" class="form-select">
								<option value="" selected>Docente no identificado</option>
								<?php foreach ($result_all_docentes as $docente_auxiliar_1) { ?>
								<option value="<?php echo $docente_auxiliar_1['id_docente']?>"><?php echo $docente_auxiliar_1['apellido_docente'] . ", " . $docente_auxiliar_1['nombre_docente'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-4 mt-3">
							<label class="form-label">Auxiliar 2.°</label>
							<select name="auxiliar_2_materia" class="form-select">
								<option value="" selected>Docente no identificado</option>
								<?php foreach ($result_all_docentes as $docente_auxiliar_2) { ?>
								<option value="<?php echo $docente_auxiliar_2['id_docente']?>"><?php echo $docente_auxiliar_2['apellido_docente'] . ", " . $docente_auxiliar_2['nombre_docente'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-12 mt-3">
							<label class="form-label">Contacto de la materia</label>
							<input name="contacto_materia" type="email" class="form-control">
						</div>
						<div class="col-12 mt-3">
							<label class="form-label">Actualización de datos</label>
							<select name="fecha_actualizacion" class="form-control">
								<option value="Enero <?php echo date("Y") ?>">
								Enero <?php echo date("Y") ?>
								</option>
								<option value="Febrero <?php echo date("Y") ?>">
								Febrero <?php echo date("Y") ?>
								</option>
								<option value="Marzo <?php echo date("Y") ?>">
								Marzo <?php echo date("Y") ?>
								</option>
								<option value="Abril <?php echo date("Y") ?>">
								Abril <?php echo date("Y") ?>
								</option>
								<option value="Mayo <?php echo date("Y") ?>">
								Mayo <?php echo date("Y") ?>
								</option>
								<option value="Junio <?php echo date("Y") ?>">
								Junio <?php echo date("Y") ?>
								</option>
								<option value="Julio <?php echo date("Y") ?>">
								Julio <?php echo date("Y") ?>
								</option>
								<option value="Agosto <?php echo date("Y") ?>">
								Agosto <?php echo date("Y") ?>
								</option>
								<option value="Septiembre <?php echo date("Y") ?>">
								Septiembre <?php echo date("Y") ?>
								</option>
								<option value="Octubre <?php echo date("Y") ?>">
								Octubre <?php echo date("Y") ?>
								</option>
								<option value="Noviembre <?php echo date("Y") ?>">
								Noviembre <?php echo date("Y") ?>
								</option>
								<option value="Diciembre <?php echo date("Y") ?>">
								Diciembre <?php echo date("Y") ?>
								</option>
							</select>
						</div>

						<div class="col-12 mt-3">
							<label class="form-label">Descripción de la materia</label>
							<textarea name="descripcion_materia" class="form-control"></textarea>
						</div>

						<div class="col-12 mt-3">
							<button type="submit" name="create" class="btn btn-success mt-3">Crear materia</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
	<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
	<script src="js/datatables.js"></script>
	
</body>
</html>