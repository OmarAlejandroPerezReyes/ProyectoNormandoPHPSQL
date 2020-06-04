<?php

if (isset($_GET["id"])) {

	$item = "id";
	$valor = $_GET["id"];

	$usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
	$_SESSION['nombreActualizar'] = $usuario['nombre'];
}

?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" id="fondo" method="post">

		<div class="form-group">

			<div class="input-group">

				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" id="nombre" name="actualizarNombre" required>
				<label class="LabelInput" for="pwd">Nombre:</label>

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">

				<input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" id="email" name="actualizarEmail" required>
				<label class="LabelInput" for="pwd">Correo:</label>

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">

				<input type="password" class="form-control" id="pwd" name="actualizarPassword" required>
				<label class="LabelInput" for="pwd">Contraseña:</label>

				<input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
				<input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

			</div>

		</div>

		<?php

		$actualizar = ControladorFormularios::ctrActualizarRegistro();

		if ($actualizar == true) {

			echo '<script>

			if ( window.history.replaceState ) {

				window.history.replaceState( null, null, window.location.href );

			}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido actualizado</div>


			<script>

				setTimeout(function(){
				
					window.location = "index.php?pagina=inicio";

				},3000);

			</script>

			';
		}

		?>

		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>