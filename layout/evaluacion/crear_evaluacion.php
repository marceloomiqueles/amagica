<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$codigo = "";
$desc = "";
$cat = 0;
$curso = 0;
$idioma = 0;
$cantidad = 0;
$valor = 0;

if (isset($_POST["desc-box"]))
	$desc = trim($_POST["desc-box"]);
if (isset($_POST["curso-box"]))
	$curso = trim($_POST["curso-box"]);
if (isset($_POST["idioma-box"]))
	$idioma = trim($_POST["idioma-box"]);

if (strlen($desc) > 0 && $curso > 0 && $idioma > 0) {
	if ($consulta = $cliente->consulta_evaluacion_curso_idioma($curso, $idioma)) {
		if ($consulta->num_rows < 1) {
			$datos = array($desc, $curso, $idioma);
			if ($id_insert = $cliente->crear_encabezado_evaluacion($datos))
				header("Location: ver_producto.php?prd=" . $id_insert);
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
						Nueva Evaluación
					</h2>
					<form class='form-horizontal' role='form' action='crear_evaluacion.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<input type='text' name='desc-box' maxlength='45' class='form-control' id='desc-box' placeholder='Descripción' value='<?php echo $desc; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='curso-box' class='col-sm-2 control-label'>Nivel</label>
							<div class='col-sm-10'>
								<select name='curso-box' id='curso-box' class='form-control'>
								  	<option value='1' <?php if ($curso == 1) echo "selected" ?>>1</option>
								  	<option value='2' <?php if ($curso == 2) echo "selected" ?>>2</option>
								  	<option value='3' <?php if ($curso == 3) echo "selected" ?>>3</option>
								  	<option value='4' <?php if ($curso == 4) echo "selected" ?>>4</option>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='idioma-box' class='col-sm-2 control-label'>Idioma</label>
							<div class='col-sm-10'>
								<select name='idioma-box' id='idioma-box' class='form-control'>
									<?php
									$res = $cliente->listar_idiomas();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($idioma == $row["id"]) echo "selected"; echo ">" . $row["descr"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear</button>
								<a class='btn btn-info' href='listar_productos.php'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>