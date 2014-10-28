<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["vnt"])) {
	if ($consulta = $cliente->consulta_producto_venta_id($_GET["vnt"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$id_venta = $row["id"];
			$nombre = $row["vendedor"];
			$producto = $row["producto"];
			$colegio = $row["colegio"];
		}
	}
}
else {
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
		<div class="container-fluid">
			<div class="row">
				<?php include("../menu.php"); ?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="sub-header">
						Detalle Venta
					</h2>
					<form class="form-horizontal" role="form">
						<div class='form-group'>
							<label class="col-sm-2 control-label">Vendedor</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $nombre; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label for='colegio-box' class='col-sm-2 control-label'>Colegio</label>
							<div class='col-sm-10'>
								<p class="form-control-static"><?php echo $colegio; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label for='producto-box' class='col-sm-2 control-label'>Producto</label>
							<div class='col-sm-10'>
								<p class="form-control-static"><?php echo $producto; ?></p>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<?php if ($_SESSION["tipo"] == 1) { ?>
								<a class="btn btn-default" href="anular_venta.php?clg=<?php echo $_GET["vnt"] ?>">Modificar</a>
								<?php } ?>
								<a class="btn btn-info" href="listar_ventas.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>