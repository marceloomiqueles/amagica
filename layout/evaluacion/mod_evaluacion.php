<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$desc = "";
$curso = 0;
$idioma = 0;
$tipo = "";
$id = 0;
$tipo_id = 0;

if (isset($_POST["desc-box"]))
	$desc = trim($_POST["desc-box"]);
if (isset($_POST["curso-box"]))
	$curso = trim($_POST["curso-box"]);
if (isset($_POST["idioma-box"]))
	$idioma = trim($_POST["idioma-box"]);
if (isset($_POST["tipo-box"]))
	$tipo_id = trim($_POST["tipo-box"]);
if (isset($_GET["eval"]))
	$id = trim($_GET["eval"]);
if (isset($_POST["id-box"]))
	$id = trim($_POST["id-box"]);

if (strlen($desc) > 0 && $id > 0) {
	if ($cliente->actualiza_encabezado_evaluacion($desc, $id)) {
		header("Location: ver_evaluacion.php?eval=" . $id);
		die();
	}
}

if (isset($_GET["eval"])) {
	if ($respuesta = $cliente->consulta_evaluacion_por_id($id)) {
		if ($respuesta->num_rows > 0) {
			$row = $respuesta->fetch_array(MYSQLI_ASSOC);
			$desc = $row["descr"];
			$curso = $row["nivel"];
			if ($row["idioma"] == 1)
				$idioma = "Español";
			else
				$idioma = "Inglés";
			$tipo_id = $row["idioma_id"];
			if ($row["tipo"] == 1) {
				$tipo = "Alumno";
			} else {
				$tipo = "Profesor";
			}
		}
	}
} else {
	header("Location: listar_evaluaciones.php");	
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
						Modificar Evaluación
					</h2>
					<form class='form-horizontal' role='form' action='mod_evaluacion.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<input type='text' name='desc-box' maxlength='45' class='form-control' id='desc-box' placeholder='Descripción' value='<?php echo $desc; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id; ?>'>
								<input type='hidden' name='tipo-box' value='<?php echo $tipo_id; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='curso-box' class='col-sm-2 control-label'>Nivel</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $curso;?></p>
							</div>
						</div>
						<div class='form-group'>
							<label for='idioma-box' class='col-sm-2 control-label'>Idioma</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $idioma;?></p>
							</div>
						</div>
						<div class='form-group'>
							<label for='tipo-box' class='col-sm-2 control-label'>Tipo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $tipo;?></p>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class='btn btn-info' href='ver_evaluacion.php?eval=<?php echo $id; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>