<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$desc = "";
$cat = 0;
$prod = 0;
$id_box = "";

if (isset($_POST["desc-box"]))
	$desc = trim($_POST["desc-box"]);
if (isset($_POST["cat-box"]))
	$cat = trim($_POST["cat-box"]);
if (isset($_POST["prod-box"]))
	$prod = trim($_POST["prod-box"]);
if (isset($_POST["old-file-box"]))
	$ruta = trim($_POST["old-file-box"]);
if (isset($_GET["dct"]))
	$id_box = $_GET["dct"];
if (isset($_POST["id-box"]))
	$id_box = $_POST["id-box"];

if ($_FILES["file-box"]["name"] != "") {
	$uploadfile = '../../Descargas/' . basename($_FILES['file-box']['name']);
	$target_dir = $dir_base . 'Descargas/' . basename($_FILES['file-box']['name']); 

	if (move_uploaded_file($_FILES['file-box']['tmp_name'], $uploadfile)) {
		$ruta = $target_dir;
	}
}

if (strlen($desc) > 0 && $cat > 0 && $prod > 0) {
	$datos = array(
		$prod,
		$desc,
		$ruta,
		1
	);

	if ($cliente->actualiza_documento_id($datos, $id_box))
		header("Location: ver_documento.php?dct=" . $id_box);
}

if ($consulta = $cliente->consulta_documento($_GET["dct"])) {
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$desc = $row["descr"];
		$cat = $row["categoria_id"];
		$prod = $row["producto_id"];
		$ruta = $row["ruta"];
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
						Editar Documento
					</h2>
					<form class='form-horizontal' role='form' action='mod_documento.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<input type='text' name='desc-box' class='form-control' id='desc-box' placeholder='Descripción' value='<?php echo $desc; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id_box; ?>'>
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
							<label for='prod-box' class='col-sm-2 control-label'>Producto</label>
							<div class='col-sm-10'>
								<select name='prod-box' id='prod-box' class='form-control'><?php
									$res = $cliente->listar_productos();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($prod == $row["id"]) echo "selected"; echo ">" . $row["descr"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
						    <label for='file-box' class='col-sm-2 control-label'>Archivo Descarga</label>
						    <div class='col-sm-10'>
							    <input type='file' name='file-box' id='file-box'>
							    <input type='hidden' name='old-file-box' value='<?php echo $ruta; ?>'>
							    <p class='help-block'>Example block-level help text here.</p>
						    </div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class="btn btn-info" href="ver_documento.php?dct=<?php echo $id_box; ?>">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>