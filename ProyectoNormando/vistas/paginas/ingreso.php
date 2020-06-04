<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" id="fondo" method="post">

		<div class="form-group">

			<div class="input-group">

				<input type="email" class="form-control" id="email" name="ingresoEmail" required>
				<label class="LabelInput" for="email">Correo:</label>

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">

				<input type="password" class="form-control" id="pwd" name="ingresoPassword" required>
				<label class="LabelInput" for="email">Contraseña:</label>

			</div>

		</div>

		<?php

		$ingreso = new ControladorFormularios();
		$ingreso->ctrIngreso();

		?>

		<button type="submit" class="btn btn-primary">Ingresar</button>

	</form>

</div>