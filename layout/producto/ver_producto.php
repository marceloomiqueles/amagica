<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["prd"])) {
	if ($consulta = $cliente->consulta_producto($_GET["prd"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$codigo = $row["codigo"];
			$desc = $row["descr"];
			$cat = $row["categoria"];
			$curso = $row["curso"];
			$idioma = $row["idioma"];
			$cant_lic = $row["n_licencia"];
			$valor = $row["valor"];
			if ($row["con_evaluacion"]) 
				$evaluacion = "Sí";
			else
				$evaluacion = "No";
		}
	}
}
else {
	header("Location: listar_productos.php");
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
						Detalle Producto
					</h2>
					<form class='form-horizontal' role='form'>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Código</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $codigo; ?></p>
							</div>
						</div>
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
							<label class='col-sm-2 control-label'>Curso</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $curso; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Idioma</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $idioma; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Cant. Licencias</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $cant_lic; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Valor Producto</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $valor; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Con Evaluación</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $evaluacion; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<a class='btn btn-default' href='mod_producto.php?prd=<?php echo $_GET["prd"] ?>'>Modificar</a>
								<a class="btn btn-info" href="listar_productos.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>