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
$valor = "";
$evaluacion = 1;
$documento = 1;
$duracion = 12;
$web = 1;

if (isset($_POST["codigo-box"]))
	$codigo = mb_strtoupper(trim($_POST["codigo-box"]), 'UTF-8');
if (isset($_POST["desc-box"]))
	$desc = mb_strtoupper(trim($_POST["desc-box"]), 'UTF-8');
if (isset($_POST["cat-box"]))
	$cat = trim($_POST["cat-box"]);
if (isset($_POST["curso-box"]))
	$curso = trim($_POST["curso-box"]);
if (isset($_POST["idioma-box"]))
	$idioma = trim($_POST["idioma-box"]);
if (isset($_POST["cantidad-box"]))
	$cantidad = trim($_POST["cantidad-box"]);
if (isset($_POST["valor-box"]))
	$valor = trim($_POST["valor-box"]);
if (isset($_POST["eval-box"]))
	$evaluacion = $_POST["eval-box"];
if (isset($_POST["doc-box"]))
	$documento = $_POST["doc-box"];
if (isset($_POST["dura-box"]))
	$duracion = $_POST["dura-box"];
if (isset($_POST["web-box"]))
	$web = $_POST["web-box"];

if (strlen($codigo) > 0 && strlen($desc) > 0 && $cat > 0 && $curso > 0 && $idioma > 0 && $cantidad > 0 && $valor > 0) {
	$datos = array($cat, $codigo, $desc, $curso, $idioma, $valor, $cantidad, $evaluacion, $documento, $duracion, $web);
	if ($id_insert = $cliente->crear_producto($datos))
		header("Location: ver_producto.php?prd=" . $id_insert . "&exito=1");
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
						Producto Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_producto.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='codigo-box' class='col-sm-2 control-label'>Código</label>
							<div class='col-sm-10'>
								<input type='text' name='codigo-box' maxlength='45' class='form-control' id='codigo-box' placeholder='Código' value='<?php echo $codigo; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<input type='text' name='desc-box' maxlength='45' class='form-control' id='desc-box' placeholder='Descripción' value='<?php echo $desc; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='cat-box' class='col-sm-2 control-label'>Categoría</label>
							<div class='col-sm-10'>
								<select name='cat-box' id='cat-box' class='form-control'>
									<?php
									$res = $cliente->listar_categorias();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($cat == $row["id"]) echo "selected"; echo ">" . $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='curso-box' class='col-sm-2 control-label'>Curso</label>
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
							<label for='cantidad-box' class='col-sm-2 control-label'>Cant. Licencias</label>
							<div class='col-sm-10'>
								<select name='cantidad-box' id='cantidad-box' class='form-control'>
									<?php
									for ($i = 1; $i <= 10; $i++) {
									?>
								  	<option value='<?php echo $i ?>' <?php if ($cantidad == $i) echo "selected"; echo ">" . $i; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='valor-box' class='col-sm-2 control-label'>Valor Producto</label>
							<div class='col-sm-10'>
								<input type='text' maxlength='6' onkeypress='return justNumbers(event);' name='valor-box' class='form-control' id='valor-box' placeholder='Valor' value='<?php echo $valor; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='dura-box' class='col-sm-2 control-label'>Duración (Meses)</label>
							<div class='col-sm-10'>
								<select name='dura-box' id='dura-box' class='form-control'>
									<?php
									for ($i = 1; $i <= 128; $i++) {
									?>
								  	<option value='<?php echo $i ?>' <?php if ($i == $duracion) echo "selected"; echo ">" . $i; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='eval-box' class='col-sm-2 control-label'>Con Evaluación</label>
						    <div class='col-sm-10'>
						      	<div class='checkbox'>
						        	<label>
						          		<input type='checkbox' name='eval-box' <?php if ($evaluacion) echo "checked"; ?> value='1'>&nbsp;
						        	</label>
						      	</div>
						    </div>
						</div>
						<div class='form-group'>
							<label for='doc-box' class='col-sm-2 control-label'>Con Documento</label>
						    <div class='col-sm-10'>
						      	<div class='checkbox'>
						        	<label>
						          		<input type='checkbox' name='doc-box' <?php if ($documento) echo "checked"; ?> value='1'>&nbsp;
						        	</label>
						      	</div>
						    </div>
						</div>
						<div class='form-group'>
							<label for='web-box' class='col-sm-2 control-label'>Web</label>
						    <div class='col-sm-10'>
						      	<div class='checkbox'>
						        	<label>
						          		<input type='checkbox' name='web-box' <?php if ($web) echo "checked"; ?> value='1'>&nbsp;
						        	</label>
						      	</div>
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