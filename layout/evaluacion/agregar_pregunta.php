<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$desc = "";
$invertido = 0;
$id = 0;

if (isset($_POST["desc-box"]))
	$desc = trim($_POST["desc-box"]);
if (isset($_POST["inv-box"]))
	$invertido = trim($_POST["inv-box"]);
if (isset($_GET["eval"]))
	$id = trim($_GET["eval"]);
if (isset($_POST["id-box"]))
	$id = trim($_POST["id-box"]);
// echo strlen($desc) . " " . $id;die();
if (strlen($desc) > 0 && $id > 0) {
	$datos = array(0, $desc, 1, $id, $invertido);
	// die();
	if ($id_insert = $cliente->crear_pregunta_evaluacion($datos)) {
		header("Location: ver_evaluacion.php?eval=" . $id);
		die();
	}
}
if (!isset($_GET["eval"])) {
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
						Pregunta Nueva
					</h2>
					<form class='form-horizontal' role='form' action='agregar_pregunta.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Pregunta</label>
							<div class='col-sm-10'>
								<input type='text' name='desc-box' class='form-control' id='desc-box' placeholder='Descripción' value='<?php echo $desc; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Invertido</label>
						    <div class='col-sm-10'>
						      	<div class='checkbox'>
						        	<label>
						          		<input type='checkbox' name='inv-box' value='1'>&nbsp;
						        	</label>
						      	</div>
						    </div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear</button>
								<a class='btn btn-info' href='ver_evaluacion.php?eval=<?php echo $id; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>