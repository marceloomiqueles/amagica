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

if (isset($_POST["codigo-box"]))
	$codigo = $_POST["codigo-box"];
if (isset($_POST["desc-box"]))
	$desc = $_POST["desc-box"];
if (isset($_POST["cat-box"]))
	$cat = $_POST["cat-box"];
if (isset($_POST["curso-box"]))
	$curso = $_POST["curso-box"];
if (isset($_POST["idioma-box"]))
	$idioma = $_POST["idioma-box"];
if (isset($_GET["prd"]))
	$id_box = $_GET["prd"];
if (isset($_POST["id-box"]))
	$id_box = $_POST["id-box"];

if (isset($_POST["codigo-box"]) && isset($_POST["desc-box"]) && isset($_POST["cat-box"]) && isset($_POST["curso-box"]) && isset($_POST["idioma-box"]) && isset($_POST["id-box"])) {
	$cambios = array(
		trim($_POST["cat-box"]), 
		trim($_POST["codigo-box"]), 
		trim($_POST["desc-box"]), 
		trim($_POST["curso-box"]), 
		trim($_POST["idioma-box"])
	);
	if ($cliente->actualiza_producto_id($cambios, $id_box))
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
						Perfil
					</h2>
					<form class='form-horizontal' role='form' action='mod_producto.php' method='post'>
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
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>