<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: ../../include/login_session.php");
}
$cliente = new Cliente;

$nombre = "";
$region = 0;
$provincia = 0;
$comuna = 0;
$calle = 0;
$numero = "";
$fono = "";
$nivel = 0;
$id_box = "";

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["region-box"]))
	$region = $_POST["region-box"];
if (isset($_POST["provincia-box"]))
	$provincia = $_POST["provincia-box"];
if (isset($_POST["comuna-box"]))
	$comuna = $_POST["comuna-box"];
if (isset($_POST["calle-box"]))
	$calle = $_POST["calle-box"];
if (isset($_POST["numero-box"]))
	$numero = $_POST["numero-box"];
if (isset($_POST["fono-box"]))
	$fono_box = $_POST["fono-box"];
if (isset($_POST["nivel-box"]))
	$nivel_box = $_POST["nivel-box"];
if (isset($_GET["clg"]))
	$id_box = $_GET["clg"];
if (isset($_POST["id-box"]))
	$id_box = $_POST["id-box"];

if (isset($_POST["nombre-box"]) && isset($_POST["comuna-box"]) && isset($_POST["calle-box"]) && isset($_POST["numero-box"]) && isset($_POST["fono-box"]) && isset($_POST["nivel-box"]) && isset($_POST["id-box"])) {
	$cambios = array(
		trim($_POST["comuna-box"]), 
		trim($_POST["nombre-box"]), 
		trim($_POST["nivel-box"]), 
		trim($_POST["calle-box"]), 
		trim($_POST["numero-box"]), 
		str_replace(" ", "", trim($_POST["fono-box"]))
		);
	if ($cliente->actualiza_colegio_id($cambios, $_POST["id-box"])) {
		header("Location: ver_colegio.php?clg=" . $_POST["id-box"]);
	}
	else
		header("Location: mod_colegio.php?clg=" . $_POST["id-box"]);
}

if ($consulta = $cliente->consulta_colegio_id($id_box)) {
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$region = $row["region_id"];
		$provincia = $row["provincia_id"];
		$comuna = $row["comuna_id"];
		$calle = $row["calle"];
		$numero = $row["numero"];
		$nivel = $row["n_cursos"];
		$fono = substr($row["fono"], 0, 3) . " " . substr($row["fono"], 3, 1) . " " . substr($row["fono"], 4, 4) . " " . substr($row["fono"], 8, 4);
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
						Perfil
					</h2>
					<form class='form-horizontal' role='form' action='mod_colegio.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id_box; ?>'>
							</div>
						</div>						
						<div class='form-group'>
							<label for='region-box' class='col-sm-2 control-label'>Región</label>
							<div class='col-sm-10'>
								<select name='region-box' onchange='cargaProvincia()' id='region-box' class='form-control'>
									<?php
									$res = $cliente->listar_regiones();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($region == $row["id"]) echo "selected"; echo ">" . $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='provincia-box' class='col-sm-2 control-label'>Provincia</label>
							<div class='col-sm-10'>
								<select name='provincia-box' onchange='cargaComuna()' id='provincia-box' class='form-control'>
									<?php
									$res = $cliente->listar_provincias_por_region($region);
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($provincia == $row["id"]) echo "selected";?>><?php echo $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='comuna-box' class='col-sm-2 control-label'>Comuna</label>
							<div class='col-sm-10'>
								<select name='comuna-box' id='comuna-box' class='form-control'>
									<?php
									$res = $cliente->listar_comunas_por_provincia($provincia);
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($comuna == $row["id"]) echo "selected";?>><?php echo $row["nombre"]; ?></option>
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
								<select name='nivel-box' id='nivel-box' class='form-control'>
									<?php
									for($i = 1; $i <= 10; $i++) {
									?>
								  	<option value='<?php echo $i ?>' <?php if ($nivel == $i) echo "selected";?>><?php echo $i; ?></option>
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