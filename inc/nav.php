<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Bibliotecología y Ciencias de la Información</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navegacion" aria-controls="navegacion" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navegacion">
			<ul class="navbar-nav mb-2 mb-lg-0">

				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
				</li>

				<!-- <li class="nav-item">
					<a class="nav-link" href="#">Búsqueda avanzada</a>
				</li> -->

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Crear</a>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" href="create_materia.php">Crear materia</a>
						</li>
						<li>
							<a class="dropdown-item" href="create_docente.php">Crear docente</a>
						</li>
						<!-- <li>
							<a class="dropdown-item" href="create_apunte.php">Crear apunte</a>
						</li>
						<li>
							<a class="dropdown-item" href="create_autor.php">Crear autor</a>
						</li> -->
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ver</a>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" href="all_materias_diplomatura.php">Ver materias de diplomatura</a>
						</li>
						<li>
							<a class="dropdown-item" href="all_materias_licenciatura.php">Ver materias de licenciatura</a>
						</li>
						<!-- <li>
							<a class="dropdown-item" href="all_docentes.php">Ver docentes</a>
						</li> -->
						<!-- <li>
							<a class="dropdown-item" href="all_apuntes.php">Ver apuntes</a>
						</li>
						<li>
							<a class="dropdown-item" href="all_autores.php">Ver autores</a>
						</li> -->
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>