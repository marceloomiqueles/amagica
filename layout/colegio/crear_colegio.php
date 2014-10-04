<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 0;
$tipo = 0;
$fono = "";

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["apellido-box"]))
	$apellido = $_POST["apellido-box"];
if (isset($_POST["mail-box"]))
	$correo = $_POST["mail-box"];
if (isset($_POST["sexo-box"]))
	$sexo = $_POST["sexo-box"];
if (isset($_POST["tipo-box"]))
	$tipo = $_POST["tipo-box"];
if (isset($_POST["fono-box"]))
	$fono = $_POST["fono-box"];

if (isset($_POST["nombre-box"]) && isset($_POST["apellido-box"]) && isset($_POST["mail-box"]) && isset($_POST["sexo-box"]) && isset($_POST["tipo-box"]) && isset($_POST["fono-box"])) {
	$datos = array(
		trim($_POST["nombre-box"]),
		trim($_POST["apellido-box"]),
		trim($_POST["mail-box"]),
		md5("1234"),
		trim($_POST["sexo-box"]),
		str_replace(" ", "", trim($_POST["fono-box"])),
		trim($_POST["tipo-box"])
		);
	if ($cliente->crear_usuario($datos))
		if ($id_user_created = $cliente->id_crear_usuario())
			header("Location: ver_usuario.php?usr=" . $id_user_created);
	else
		header("Location: mod_perfil.php");
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
						Colegio Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_usuario.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='region-box' class='col-sm-2 control-label'>Región</label>
							<div class='col-sm-10'>
								<select id="region-box" name='region-box' class='form-control'>
									<?php
									$res = $cliente->listar_regiones();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($tipo == $row["id"]) echo "selected"; ?>><?php echo $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='provincia-box' class='col-sm-2 control-label'>Provincia</label>
							<div class='col-sm-10'>
								<select id="provincia-box" name='provincia-box' class='form-control'>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='comuna-box' class='col-sm-2 control-label'>Comuna</label>
							<div class='col-sm-10'>
								<select id="comuna-box" name='comuna-box' class='form-control'>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='calle-box' class='col-sm-2 control-label'>Calle</label>
							<div class='col-sm-10'>
								<input type='text' name='calle-box' class='form-control' id='calle-box' placeholder='Calle'>
							</div>
						</div>
						<div class='form-group'>
							<label for='numero-box' class='col-sm-2 control-label'>Número</label>
							<div class='col-sm-10'>
								<input type='text' name='numero-box' class='form-control' id='numero-box' placeholder='Número'>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<input type='text' name='fono-box' class='form-control' id='fono-box' placeholder='Teléfono'>
							</div>
						</div>
						<div class='form-group'>
							<label for='nivel-box' class='col-sm-2 control-label'>Cursos x nivel</label>
							<div class='col-sm-10'>
								<select id="nivel-box" name='nivel-box' class='form-control'>
									<?php
									for ($i = 1; $i <= 10; $i++) {
									?>
								  	<option value='<?php echo $i; ?>' <?php if ($sexo == $i) echo "selected"; ?>><?php echo $i; ?></option>
								  	<?php
								  	}
								  	?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear Colegio</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    	<script type="text/javascript">
	 		cargaProvincia($("#region-box").val());
    	</script>
	</body>
</html>