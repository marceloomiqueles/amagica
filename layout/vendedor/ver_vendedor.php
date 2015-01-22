<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: ../../include/login_session.php");
}
$cliente = new Cliente;
if (isset($_GET["usr"])) {
	if ($consulta = $cliente->consulta_usuario_id($_GET["usr"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$nombre = $row["nombre"];
			$apellido = $row["apellido"];
			$mail = $row["mail"];
			$tipo = $row["descripcion"];
			if($row["sexo"] == 1)
				$sexo = "Masculino";
			else
				$sexo = "Femenino";
			$fono = substr($row["telefono"], 0, 3) . " " . substr($row["telefono"], 3, 1) . " " . substr($row["telefono"], 4, 4) . " " . substr($row["telefono"], 8, 4);
			$cliente->cerrar_conn();
		}
	}
}
else {
	header("Location: listar_vendedores.php");
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
						Detalle Vendedor
					</h2>
					<form class='form-horizontal' role='form'>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $nombre; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Apellido</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $apellido; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Correo</label>
							<div class='col-sm-10'>	
								<p class='form-control-static'><?php echo $mail; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Sexo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $sexo; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Tipo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $tipo; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $fono; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<a class='btn btn-default' href='mod_vendedor.php?usr=<?php echo $_GET["usr"] ?>'>Modificar</a>
								<a class="btn btn-info" href="listar_vendedores.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
    	if (isset($_GET["exito"])) {
    		if ($_GET["exito"] == 1) {
    	?>
    			<script type="text/javascript">
    				alert("Vendedor Creado Correctamente!");
    			</script>
    	<?php
    		}
    		if ($_GET["exito"] == 2) {
    	?>

    			<script type="text/javascript">
    				alert("Vendedor Actualizado Correctamente!");
    			</script>
    	<?php
    		}
    	}
    	?>
	</body>
</html>