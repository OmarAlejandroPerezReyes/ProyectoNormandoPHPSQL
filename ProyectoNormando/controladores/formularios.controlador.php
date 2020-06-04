<?php

class ControladorFormularios
{

	/*Registro*/

	static public function ctrRegistro()
	{

		if (isset($_POST["registroNombre"])) {

			$tabla = "registros";

			$datos = array(
				"nombre" => $_POST["registroNombre"],
				"email" => $_POST["registroEmail"],
				"password" => md5($_POST["registroPassword"])
			);

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;
		}
	}

	/*Seleccionar Registros*/

	static public function ctrSeleccionarRegistros($i, $valor)
	{

		$tabla = "registros";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $i, $valor);

		return $respuesta;
	}

	/*Ingreso*/
	public function ctrIngreso()
	{

		if (isset($_POST["ingresoEmail"])) {

			$tabla = "registros";
			$i = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $i, $valor);
			if ($respuesta == true) {
				if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == md5($_POST["ingresoPassword"])) {

					$_SESSION["validarIngreso"] = true;
					$_SESSION["nombre"] = $respuesta['nombre'];
					$_SESSION["idActual"] = $respuesta['id'];
					echo '
				<script>
					if ( window.history.replaceState ) window.history.replaceState( null, null, window.location.href );
					window.location = "index.php?pagina=inicio";
				</script>';
				} else {
					echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
				}
			} else {
				echo '<div class="alert alert-danger">Error al ingresar al sistema, el email no se encuentra registrado</div>';
			}
		}
	}

	/*Actualizar Registro*/
	static public function ctrActualizarRegistro()
	{

		if (isset($_POST["actualizarNombre"])) {
			$password = (md5($_POST["actualizarPassword"]) != "") ? md5($_POST["actualizarPassword"]) : $_POST["passwordActual"];
			$tabla = "registros";
			$datos = array(
				"id" => $_POST["idUsuario"],
				"nombre" => $_POST["actualizarNombre"],
				"email" => $_POST["actualizarEmail"],
				"password" => $password
			);
			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
			if (($_SESSION['nombreActualizar'] ?? "") == $_SESSION["nombre"]) {
				$_SESSION["nombre"] = $datos['nombre'];
			}
			return $respuesta;
		}
	}

	/*Eliminar Registro*/
	public function ctrEliminarRegistro()
	{

		if (isset($_POST["eliminarRegistro"])) {
			if (isset($_POST['confirmarEliminacion'])) {
				$tabla = "registros";
				$valor = $_POST["eliminarRegistro"];
				if ($_POST["eliminarRegistro"] == $_SESSION["idActual"]) {
					$_SESSION["nombre"] = " ";
					$_SESSION["validarIngreso"] = false;
				}
				$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
				if ($respuesta) {

					echo '<script>
					
					if ( window.history.replaceState ) window.history.replaceState( null, null, window.location.href );
					window.location = "index.php?pagina=inicio";
					
					</script>';
				}
			}
		}
	}
}
