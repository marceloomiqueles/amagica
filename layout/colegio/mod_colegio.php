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
	$nombre = strtoupper(trim($_POST["nombre-box"]));
if (isset($_POST["region-box"]))
	$region = trim($_POST["region-box"]);
if (isset($_POST["provincia-box"]))
	$provincia = trim($_POST["provincia-box"]);
if (isset($_POST["comuna-box"]))
	$comuna = trim($_POST["comuna-box"]);
if (isset($_POST["calle-box"]))
	$calle = strtoupper(trim($_POST["calle-box"]));
if (isset($_POST["numero-box"]))
	$numero = trim($_POST["numero-box"]);
if (isset($_POST["fono-box"]))
	$fono = "+56" . trim($_POST["ni-box"]) . trim($_POST["fono-box"]);
if (isset($_POST["nivel-box"]))
	$nivel = trim($_POST["nivel-box"]);
if (isset($_GET["clg"]))
	$id_box = trim($_GET["clg"]);
if (isset($_POST["id-box"]))
	$id_box = trim($_POST["id-box"]);

if (strlen($nombre) > 0 && strlen($comuna) > 0 && strlen($calle) > 0 && strlen($numero) > 0 && strlen($fono) == 12 && strlen($nivel) > 0 && $id_box > 0) {
	$cambios = array(
		$comuna, 
		$nombre, 
		$nivel, 
		$calle, 
		$numero, 
		$fono
		);
	if ($cliente->actualiza_colegio_id($cambios, $id_box))
		header("Location: ver_colegio.php?clg=" . $id_box . "&exito=2");
	else
		header("Location: mod_colegio.php?usr=" . $id_box . "&exito=3");
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
		$digito = substr($row["fono"], 3, 1);
		$fono = substr($row["fono"], 4, 8);
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
						Modificar Colegio
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
								<input type='text' name='numero-box' onkeypress='return justNumbers(event);' class='form-control' id='numero-box' placeholder='Número' value='<?php echo $numero; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<div class='input-group'>
									<div class="input-group-addon">+56</div>
	      							<span class='input-group-addon'>
										<select name='ni-box'>
										  	<option value='9' <?php if ($digito == 9) echo "selected" ?>>9</option>
										  	<option value='2' <?php if ($digito == 2) echo "selected" ?>>2</option>
										</select>
									</span>
									<input type='text' maxlength='8' onkeypress='return justNumbers(event);' name='fono-box' class='form-control' id='fono-box' placeholder='Teléfono' value='<?php echo $fono; ?>'>
								</div>
							</div>
						</div>
						<div class='form-group'>
							<label for='nivel-box' class='col-sm-2 control-label'>Cursos</label>
							<div class='col-sm-10'>
								<select name='nivel-box' id='nivel-box' class='form-control'>
									<?php
									$letra = "A";
									for($i = 0; $i <= 10; $i++) {
									?>
								  	<option value='<?php echo $i + 1 ?>' <?php if ($nivel == $i + 1) echo "selected";?>><?php if ($i == 0) echo $letra++; else echo "A - " . $letra++; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class="btn btn-info" href="ver_colegio.php?clg=<?php echo $id_box ?>">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
    	if (isset($_GET["exito"])) {
    		if ($_GET["exito"] == 3) {
    	?>
    			<script type="text/javascript">
    				alert("Datos Ingresados Erroneamente!");
    			</script>
    	<?php
    		}
    	}
    	?>
	</body>
</html>