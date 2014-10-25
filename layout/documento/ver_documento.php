<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["dct"])) {
	if ($consulta = $cliente->consulta_documento($_GET["dct"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$desc = $row["descr"];
			$cat = $row["categoria"];
			$prod = $row["producto"];
			$down_file = $row["ruta"];
		}
	}
}
else {
	header("Location: listar_documentos.php");
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
						Detalle Documento
					</h2>
					<form class='form-horizontal' role='form'>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $desc; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Categoría</label>
							<div class='col-sm-10'>	
								<p class='form-control-static'><?php echo $cat; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Producto</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $prod; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Archivo Descarga</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $down_file; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<a class='btn btn-default' href='mod_documento.php?dct=<?php echo $_GET["dct"] ?>'>Modificar</a>
								<a class="btn btn-info" href="listar_documentos.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>