<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$desc = "";
$cat = 0;
$prod = 0;

if (isset($_POST["desc-box"]))
	$desc = trim($_POST["desc-box"]);
if (isset($_POST["cat-box"]))
	$cat = trim($_POST["cat-box"]);
if (isset($_POST["prod-box"]))
	$prod = trim($_POST["prod-box"]);

if (strlen($desc) > 0 && $cat > 0 && $prod > 0 && isset($_FILES["file-box"])) {
	$uploadfile = '../../Descargas/' . basename($_FILES['file-box']['name']);
	$target_dir = $dir_base . 'Descargas/' . basename($_FILES['file-box']['name']); 

	if (move_uploaded_file($_FILES['file-box']['tmp_name'], $uploadfile)) {
	    $datos = array(
			$prod,
			$desc,
			$target_dir,
			1
			);
		if ($id_insert = $cliente->crear_documento($datos))
			header("Location: ver_documento.php?dct=" . $id_insert);
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
						Producto Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_documento.php' method='post' enctype='multipart/form-data'>
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
							    <p class='help-block'>Example block-level help text here.</p>
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