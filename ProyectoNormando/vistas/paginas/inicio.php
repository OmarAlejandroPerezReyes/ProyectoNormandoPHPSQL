<?php

if (!isset($_SESSION["validarIngreso"])) {

	echo '<script>window.location = "index.php?pagina=ingreso";</script>';

	return;
} else {

	if ($_SESSION["validarIngreso"] != true) {

		echo '<script>window.location = "index.php?pagina=ingreso";</script>';

		return;
	}
}

$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);


?>


<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach ($usuarios as $key => $value) : ?>

			<tr>
				<td><?php echo ($key + 1); ?></td>
				<td><?php echo $value["nombre"]; ?></td>
				<td><?php echo $value["email"]; ?></td>
				<td><?php
					$dia = substr($value["fecha"], 0, -8);
					$mes = substr($value["fecha"], 3, -5);
					$ano = substr($value["fecha"], 6, 9);
					echo "$dia.$mes.$ano";
					?></td>
				<td>

					<div class="btn-group">

						<div class="px-1">

							<a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="Editar"><i class="fas fa-pencil-alt" style='color:green'></i></a>

						</div>

						<form method="post">

							<input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">

							<button type="submit" class="Borrar" onclick="return window.confirm('¿Estás seguro de eliminar el usuario?');" name="confirmarEliminacion"><i class="fas fa-trash-alt" style='color:red'></i></button>

							<?php

							$eliminar = new ControladorFormularios();
							$eliminar->ctrEliminarRegistro();

							?>

						</form>

					</div>


				</td>
			</tr>

		<?php endforeach ?>

	</tbody>
</table>