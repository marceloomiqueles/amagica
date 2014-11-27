<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$id = 0;
$cant_preg = 0;
$resp = ""; 

if (isset($_POST["pregunta"])) {
	$verdad = true;
	$resp = $_POST["pregunta"];
	// echo count($resp);
	for ($i=0; $i < count($_POST["pregunta"]); $i++) {
		if (strlen($_POST["pregunta"][$i]) == 0) {
			$verdad = false;
			break;
			// echo $i+1 . " sin valor";
		}
	}
	// die();
	if ($verdad) {
		$curso_id = 0;
		$evaluacion = 0;
		$tipo = 0;
		if ($consulta = $cliente->cantidad_preguntas_evaluacion_por_usuario_id(2, $_SESSION["id"])) {
			if ($consulta->num_rows > 0) {
				$row = $consulta->fetch_array(MYSQLI_ASSOC);
				$evaluacion = $row["id"];
				$curso_id = $row["curso_id"];
			}
		}
		// die();
		$cliente->cerrar_conn();
		if ($consulta = $cliente->consulta_evaluaciones_realizadas_por_curso_por_tipo(2, $curso_id)) {
			if($consulta->num_rows < 2) {
				$datos = array(2, 7, $curso_id, $evaluacion);
				if ($id_insert = $cliente->crear_encabezado_evaluacion_prueba($datos)) {
					for ($i=0; $i < count($_POST["pregunta"]); $i++) {
						$datos = array($_POST["pregunta"][$i], $i+1, $id_insert);
						$cliente->insertar_respuesta_evaluacion($datos);
						$cliente->cerrar_conn();
					}
				}
				header("Location: " . $dir_base);
			}
		}
	}
}

if ($respuesta = $cliente->consulta_evaluacion_usuario_id($_SESSION["id"])) {
	if ($respuesta->num_rows > 0) {
		$row = $respuesta->fetch_array(MYSQLI_ASSOC);
		if ($row["eval"] > 1) {
			$cliente->cerrar_conn();
			header("Location: " . $dir_base);
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
	</head>	
	<body>
		<?php include_once("../top-menu.php"); ?>
		<div class='container-fluid'>
			<div class='row'>
				<?php include("../menu.php"); ?>
				<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
					<h2 class='sub-header'>
						Evaluacion Profesor
					</h2>
					<form class='form-horizontal' role='form' action='evaluacion_profesor.php' method='post' enctype='multipart/form-data'>
						<?php
						$consulta = $cliente->consulta_preguntas_evaluacion_por_usuario_id($_SESSION["id"]);
						while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
						?>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Pregunta <?php echo $row["n_orden"] ?></label>
							<div class='col-sm-10'>
								<input type='text' name='pregunta[]' maxlength='45' class='form-control' id='pregunta[]' placeholder='Respuesta'>
							</div>
						</div>
						<?php
						}
						?>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class='btn btn-info' href='<?php echo $dir_base; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>