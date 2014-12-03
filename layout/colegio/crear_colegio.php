<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$comuna = 0;
$calle = "";
$numero = 0;
$fono = "";
$nivel = 0;

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["comuna-box"]))
	$comuna = $_POST["comuna-box"];
if (isset($_POST["calle-box"]))
	$calle = $_POST["calle-box"];
if (isset($_POST["numero-box"]))
	$numero = $_POST["numero-box"];
if (isset($_POST["fono-box"]))
	$fono = $_POST["fono-box"];
if (isset($_POST["nivel-box"]))
	$nivel = $_POST["nivel-box"];

if (isset($_POST["nombre-box"]) && isset($_POST["comuna-box"]) && isset($_POST["calle-box"]) && isset($_POST["numero-box"]) && isset($_POST["fono-box"]) && isset($_POST["nivel-box"])) {
	$datos = array(
		trim($_POST["nombre-box"]),
		trim($_POST["comuna-box"]),
		trim($_POST["calle-box"]),
		trim($_POST["numero-box"]),
		str_replace(" ", "", trim($_POST["fono-box"])),
		trim($_POST["nivel-box"]),
		"2",
		trim($_SESSION["id"])
		);
	if ($id_insert = $cliente->crear_colegio($datos)) {
		$cliente->cerrar_conn();
		for ($i = 1; $i <= 4; $i++) {
			for ($z = 1; $z <= $nivel; $z++) {
				$datos = array($id_insert, $i, $z);
				$cliente->crear_curso($datos);
				$cliente->cerrar_conn();
			}
		}
		header("Location: ver_colegio.php?clg=" . $id_insert);
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
						Crear Colegio
					</h2>
					<form class='form-horizontal' role='form' action='crear_colegio.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='region-box' class='col-sm-2 control-label'>Región</label>
							<div class='col-sm-10'>
								<select id='region-box' onchange='cargaProvincia()' name='region-box' class='form-control'>
									<?php
									$res = $cliente->listar_regiones();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' ><?php echo $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='provincia-box' class='col-sm-2 control-label'>Provincia</label>
							<div class='col-sm-10'>
								<select id='provincia-box' onchange='cargaComuna();' name='provincia-box' class='form-control'>
									<?php
									$res = $cliente->listar_provincias_por_region(1);
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>'><?php echo $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='comuna-box' class='col-sm-2 control-label'>Comuna</label>
							<div class='col-sm-10'>
								<select id='comuna-box' name='comuna-box' class='form-control'>
									<?php
									$res = $cliente->listar_comunas_por_provincia(3);
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>'><?php echo $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='calle-box' class='col-sm-2 control-label'>Calle</label>
							<div class='col-sm-10'>
								<input type='text' name='calle-box' class='form-control' id='calle-box' placeholder='Calle' value='<?php echo $calle; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='numero-box' class='col-sm-2 control-label'>Número</label>
							<div class='col-sm-10'>
								<input type='text' name='numero-box' class='form-control' id='numero-box' placeholder='Número' value='<?php echo $numero; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<input type='text' name='fono-box' class='form-control' id='fono-box' placeholder='Teléfono' value='<?php echo $fono; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='nivel-box' class='col-sm-2 control-label'>Cursos x nivel</label>
							<div class='col-sm-10'>
								<select id='nivel-box' name='nivel-box' class='form-control'>
									<?php
									for ($i = 1; $i <= 10; $i++) {
									?>
								  	<option value='<?php echo $i; ?>' <?php if ($nivel == $i) echo "selected"; ?>><?php echo $i; ?></option>
								  	<?php
								  	}
								  	?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear Colegio</button>
								<a class="btn btn-info" href="listar_colegios.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>