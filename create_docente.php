<?php 

include 'php/db.php';

$all_docentes = "SELECT * FROM docentes ORDER BY apellido_docente ASC";
$result_all_docentes = $conexion -> query($all_docentes);

if (isset($_POST['create'])) {

	$stmt = $conexion -> prepare("INSERT INTO docentes (apellido_docente, nombre_docente, contacto_docente) VALUES (?, ?, ?)");
	$stmt -> bind_param("sss", $apellido_docente, $nombre_docente, $contacto_docente);

	$apellido_docente = utf8_decode(htmlspecialchars($_POST['apellido_docente']));
	$nombre_docente = utf8_decode(htmlspecialchars($_POST['nombre_docente']));

	// Estructura de control selectiva:
	if ($_POST['contacto_docente'] == '') {
		$contacto_docente = NULL;
	} else {
		$contacto_docente = utf8_decode(htmlspecialchars($_POST['contacto_docente']));
	}
	
	$stmt -> execute();

	header("Location: create_docente.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
	<title>morgan_john</title>
</head>

<body>

	<?php include 'inc/nav.php' ?>

	<div class="container">
		<div class="row pt-3 mt-3">
			<div class="alert alert-success">
				El formulario de la derecha usa el método <b>POST</b> para agregar docentes a la base de datos, reflejada en la tabla de la izquierda. <br> <br> Los links de esa tabla llevan a una página que hace uso del método <b>GET</b> para mostrar toda la información sobre el docente.
			</div>
		</div>
		<div class="row py-5 g-3">
			<div class="col-md-6 col-sm-12 px-3">
				<table class="table table-hover" id="tabla">
					<thead>
						<tr>
							<th scope="col">Docente</th>
							<th scope="col">Eliminar</th>
						</tr>
					</thead>
					<tbody>

						<!-- Estructura de control repetitiva -->
						<?php while ($docente = $result_all_docentes -> fetch_assoc()) { ?>
						<tr>
							<td>
								<a href="read_docente.php?id=<?php echo $docente['id_docente'] ?>">
									<?php echo $docente['apellido_docente'] . ", " . $docente['nombre_docente']; ?>
								</a>
							</td>
							<td>
								<a href="delete_docente.php?id=<?php echo $docente['id_docente'] ?>">
									<i class="bi bi-trash text-danger"></i>
								</a>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
			<div class="col-md-6 col-sm-12">
				<form action="" method="POST">
					<h1>Crear docente</h1>
					<div class="col-12 mt-3">
						<label class="form-label">Apellido del docente</label>
						<input name="apellido_docente" type="text" class="form-control">
					</div>
					<div class="col-12 mt-3">
						<label class="form-label">Nombre del docente</label>
						<input name="nombre_docente" type="text" class="form-control">
					</div>
					<div class="col-12 mt-3">
						<label class="form-label">Mail del docente</label>
						<input name="contacto_docente" type="email" class="form-control">
					</div>
					<div class="col-12">
						<button type="submit" name="create" class="btn btn-success mt-3">Crear docente</button>
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