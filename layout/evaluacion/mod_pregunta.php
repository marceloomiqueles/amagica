<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$id = 0;
$eval = 0;
$pregunta = "";
$invertido = 0;

if (isset($_POST["preg-box"]))
	$pregunta = $_POST["preg-box"];
if (isset($_GET["prg"]))
	$id = trim($_GET["prg"]);
if (isset($_POST["id-box"]))
	$id = trim($_POST["id-box"]);
if (isset($_GET["eval"]))
	$eval = trim($_GET["eval"]);
if (isset($_POST["eval-box"]))
	$eval = trim($_POST["eval-box"]);
if (isset($_POST["inv-box"]))
	$invertido = $_POST["inv-box"];

if (strlen($pregunta) > 0 && $id > 0) {
	$datos = array($pregunta, $invertido);
	if ($cliente->actualiza_pregunta_por_id($datos, $id)) {
		header("Location: ver_evaluacion.php?eval=" . $eval);
		die();
	}
}

if (isset($_GET["prg"])) {
	if ($respuesta = $cliente->consulta_pregunta_por_id($id)) {
		if ($respuesta->num_rows > 0) {
			$row = $respuesta->fetch_array(MYSQLI_ASSOC);
			$pregunta = $row["pregunta"];
			$invertido = $row["invertido"];
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
						Modificar Pregunta
					</h2>
					<form class='form-horizontal' role='form' action='mod_pregunta.php' method='post'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Pregunta</label>
							<div class='col-sm-10'>
								<input type='text' name='preg-box' class='form-control' id='preg-box' placeholder='Pregunta' value='<?php echo $pregunta; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id; ?>'>
								<input type='hidden' name='eval-box' value='<?php echo $eval; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Invertido</label>
						    <div class='col-sm-10'>
						      	<div class='checkbox'>
						        	<label>
						          		<input type='checkbox' name='inv-box' <?php if ($invertido) echo "checked"; ?> value='1'>&nbsp;
						        	</label>
						      	</div>
						    </div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class='btn btn-info' href='ver_evaluacion.php?eval=<?php echo $eval; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>