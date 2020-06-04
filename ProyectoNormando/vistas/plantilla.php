<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Proyecto</title>

	<!--PLUGINS DE CSS-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--PLUGINS DE JS-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Efecto Nocturno -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	<!-- Personal -->
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>


	<!--LOGOTIPO-->

	<div class="container-fluid">

		<h3 class="text-center py-3"><img src="./imagenes/LogoBlanco.png"></h3>

	</div>
	<div id="contieneUsuario">
		<p id="nombreUsuario"><i class="fas fa-user" style='color:var(--color); display:inline !important; margin: 0.2em; margin-right:1em;'></i><?php echo ($_SESSION["nombre"]) ?? " "; ?></p>
	</div>
	</div>

	<div class="ModoNocturnoBase" id="cursorPuntero">
		<div class="ModoNocturnoCirculo"></div>
	</div>

	<!--BOTONERA-->

	<div class="container-fluid  bg-light" id="encabezado">

		<div class="container">

			<ul class="nav nav-justified py-2 nav-pills">

				<?php if (isset($_GET["pagina"])) : ?>

					<?php if ($_GET["pagina"] == "registro") : ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=registro">Registrar</a>
						</li>

					<?php else : ?>

						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=registro">Registrar</a>
						</li>

					<?php endif ?>

					<?php if ($_GET["pagina"] == "ingreso") : ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=ingreso">Iniciar Sesión</a>
						</li>

					<?php else : ?>

						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=ingreso">Iniciar Sesión</a>
						</li>

					<?php endif ?>

					<?php if ($_GET["pagina"] == "inicio") : ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=inicio">Registros</a>
						</li>

					<?php else : ?>

						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=inicio">Registros</a>
						</li>

					<?php endif ?>

					<?php if ($_GET["pagina"] == "salir") : ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=salir">Cerrar Sesión</a>
						</li>

					<?php else : ?>

						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=salir">Cerrar Sesión</a>
						</li>

					<?php endif ?>

				<?php else : ?>

					<!-- GET: $_GET["variable"] Variables que se pasan como parámetros Vía URL ( También conocido como cadena de consulta a través de la URL) 
				Cuando es la primera variable se separa con ?
				las que siguen a continuación se separan con &
				-->

					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=registro">Registrar</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=ingreso">Iniciar Sesión</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=inicio">Registros</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=salir">Cerrar Sesión</a>
					</li>

				<?php endif ?>

			</ul>

		</div>

	</div>

	<!--CONTENIDO-->

	<div class="container-fluid">

		<div class="container py-5">

			<?php

			#ISSET: isset() Determina si una variable está definida y no es NULL

			if (isset($_GET["pagina"])) {

				if (
					$_GET["pagina"] == "registro" ||
					$_GET["pagina"] == "ingreso" ||
					$_GET["pagina"] == "inicio" ||
					$_GET["pagina"] == "editar" ||
					$_GET["pagina"] == "salir"
				) {

					include "paginas/" . $_GET["pagina"] . ".php";
				} else {

					include "paginas/error404.php";
				}
			} else {

				include "paginas/registro.php";
			}



			?>

		</div>

	</div>



</body>
<script src="./js/ModoNocturno.js" type="text/javascript"></script>

</html>