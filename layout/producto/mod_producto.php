<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$codigo = "";
$desc = "";
$cat = "";
$curso = 0;
$idioma = 0;
$id_box = "";
$n_lic = 0;
$valor = "";
$evaluacion = 0;

if (isset($_POST["codigo-box"]))
	$codigo = trim($_POST["codigo-box"]);
if (isset($_POST["desc-box"]))
	$desc = trim($_POST["desc-box"]);
if (isset($_POST["cat-box"]))
	$cat = trim($_POST["cat-box"]);
if (isset($_POST["curso-box"]))
	$curso = trim($_POST["curso-box"]);
if (isset($_POST["idioma-box"]))
	$idioma = trim($_POST["idioma-box"]);
if (isset($_POST["cantidad-box"]))
	$n_lic = trim($_POST["cantidad-box"]);
if (isset($_POST["valor-box"]))
	$valor = trim($_POST["valor-box"]);
if (isset($_GET["prd"]))
	$id_box = trim($_GET["prd"]);
if (isset($_POST["id-box"]))
	$id_box = trim($_POST["id-box"]);
if (isset($_POST["eval-box"]))
	$evaluacion = $_POST["eval-box"];

if (strlen($codigo) > 0 && strlen($desc) > 0 && $cat > 0 && $curso > 0 && $idioma > 0 && $n_lic > 0 && $valor > 0) {
	$datos = array($cat, $codigo, $desc, $curso, $idioma, $n_lic, $valor, $evaluacion);
	if ($cliente->actualiza_producto_id($datos, $id_box))
		header("Location: ver_producto.php?prd=" . $id_box);
}

if ($consulta = $cliente->consulta_producto($id_box))
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$codigo = $row["codigo"];
		$desc = $row["descr"];
		$cat = $row["categoria_id"];
		$curso = $row["curso"];
		$idioma = $row["idioma_id"];
		$n_lic = $row["n_licencia"];
		$valor = $row["valor"];
		$evaluacion = $row["con_evaluacion"];
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
						Editar Producto
					</h2>
					<form class='form-horizontal' role='form' action='mod_producto.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='codigo-box' class='col-sm-2 control-label'>Código</label>
							<div class='col-sm-10'>
								<input type='text' name='codigo-box' class='form-control' id='codigo-box' placeholder='Código' value='<?php echo $codigo; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id_box; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<input type='text' name='desc-box' class='form-control' id='desc-box' placeholder='Descripción' value='<?php echo $desc; ?>'>
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
									for ($i = 1; $i <= 4; $i++) {
									?>
								  	<option value='<?php echo $i ?>' <?php if ($n_lic == $i) echo "selected"; echo ">" . $i; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='valor-box' class='col-sm-2 control-label'>Valor Producto</label>
							<div class='col-sm-10'>
								<select name='valor-box' id='valor-box' class='form-control'>
									<?php
									for ($i = 1; $i <= 4; $i++) {
									?>
								  	<option value='<?php echo $i ?>' <?php if ($valor == $i) echo "selected"; echo ">" . $i; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Con Evaluación</label>
						    <div class='col-sm-10'>
						      	<div class='checkbox'>
						        	<label>
						          		<input type='checkbox' name='eval-box' <?php if ($evaluacion) echo "checked"; ?> value='1'>&nbsp;
						        	</label>
						      	</div>
						    </div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class="btn btn-info" href="ver_producto.php?prd=<?php echo $id_box; ?>">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>