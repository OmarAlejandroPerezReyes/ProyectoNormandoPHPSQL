<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" id="fondo" method="post">

		<div class="form-group">
			
			<div class="input-group">				
				<input type="text" class="form-control" id="nombre" name="registroNombre" autocomplete="off" required>
				<label class="LabelInput" for="nombre">Nombre:</label>
			</div>
			
		</div>

		<div class="form-group">
			
			<div class="input-group">
				<input type="email" class="form-control" id="email" name="registroEmail" autocomplete="off" required>
				<label  class="LabelInput"for="email">Correo:</label>
			</div>
			
		</div>

		<div class="form-group">
			
			<div class="input-group">
				
				<input type="password" class="form-control" id="pwd" name="registroPassword" autocomplete="off" required>
				<label  class="LabelInput"for="pwd">Contraseña:</label>

			</d>

		</div>

		<?php 

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
		=============================================*/
		
		// $registro = new ControladorFormularios();
		// $registro -> ctrRegistro();

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
		=============================================*/

		$registro = ControladorFormularios::ctrRegistro();

		if($registro == true){

			echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
		
		}

		?>
		
		<button type="submit" class="btn btn-primary">Enviar</button>

	</form>

</div>