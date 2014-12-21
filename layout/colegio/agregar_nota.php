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
if (isset($_GET["clg"]))
	$id = trim($_GET["clg"]);
if (isset($_POST["id-box"]))
	$id = trim($_POST["id-box"]);
// echo strlen($desc) . " " . $id;die();
if (strlen($desc) > 0 && $id > 0) {
	$datos = array($desc, 1, $id);
	// die();
	if ($id_insert = $cliente->crear_nota_colegio($datos)) {
		header("Location: ver_colegio.php?clg=" . $id);
		die();
	}
}
if (!isset($_GET["clg"])) {
	header("Location: listar_colegios.php");
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
						Nota Nueva
					</h2>
					<form class='form-horizontal' role='form' action='agregar_nota.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Nota</label>
							<div class='col-sm-10'>
								<textarea name='desc-box' maxlength='2000' rows='4' class='form-control' id='desc-box' placeholder='Nota...' value='<?php echo $desc; ?>'></textarea>
								<input type='hidden' name='id-box' value='<?php echo $id; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Agregar</button>
								<a class='btn btn-info' href='ver_colegio.php?clg=<?php echo $id; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>