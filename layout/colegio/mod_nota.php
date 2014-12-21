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
if (isset($_GET["nt"]))
	$id = trim($_GET["nt"]);
if (isset($_POST["id-box"]))
	$id = trim($_POST["id-box"]);
if (isset($_GET["clg"]))
	$eval = trim($_GET["clg"]);
if (isset($_POST["eval-box"]))
	$eval = trim($_POST["eval-box"]);

if (strlen(trim($pregunta)) > 0 && $id > 0) {
	if ($cliente->actualiza_nota_colegio($pregunta, $id)) {
		header("Location: ver_colegio.php?clg=" . $eval);
		die();
	}
}

if (isset($_GET["nt"])) {
	if ($respuesta = $cliente->consulta_nota_colegio_por_id($id)) {
		if ($respuesta->num_rows > 0) {
			$row = $respuesta->fetch_array(MYSQLI_ASSOC);
			$nota = $row["descr"];
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
						Modificar Nota
					</h2>
					<form class='form-horizontal' role='form' action='mod_nota.php' method='post'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Nota</label>
							<div class='col-sm-10'>
								<textarea type='text' name='preg-box' maxlength='2000' class='form-control' id='preg-box' placeholder='Nota...'><?php echo $nota; ?></textarea>
								<input type='hidden' name='id-box' value='<?php echo $id; ?>'>
								<input type='hidden' name='eval-box' value='<?php echo $eval; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class='btn btn-info' href='ver_colegio.php?clg=<?php echo $eval; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>