<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: ../../include/login_session.php");
}
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
	if ($cliente->crear_usuario($datos)) {
		if ($id_user_created = $cliente->id_crear_usuario()) {
			header("Location: ver_usuario.php?usr=" . $id_user_created);
		}
	}
	else
		header("Location: mod_perfil.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset='utf-8'>
		<title>A-Magica</title>
		<link rel='stylesheet' type='text/css' href='../../css/bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='../../css/dashboard.css'>
	</head>
	<body>
		<?php
		 include_once("../top-menu.php");
		?>
		<div class='container-fluid'>
			<div class='row'>
				<?php
				include("../menu.php");
				?>
				<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
					<h2 class='sub-header'>
						Perfil
					</h2>
					<form class='form-horizontal' role='form' action='crear_usuario.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='apellido-box' class='col-sm-2 control-label'>Apellido</label>
							<div class='col-sm-10'>
								<input type='text' name='apellido-box' class='form-control' id='apellido-box' placeholder='Apellido' value='<?php echo $apellido ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='mail-box' class='col-sm-2 control-label'>Correo</label>
							<div class='col-sm-10'>	
								<input type='mail' name='mail-box' class='form-control' id='mail-box' placeholder='Correo' value='<?php echo $correo ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='sexo-box' class='col-sm-2 control-label'>Sexo</label>
							<div class='col-sm-10'>
								<select name='sexo-box' class='form-control'>
								  	<option value='1' <?php if ($sexo == 1) echo "selected" ?>>Hombre</option>
								  	<option value='2' <?php if ($sexo == 2) echo "selected" ?>>Mujer</option>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='tipo-box' class='col-sm-2 control-label'>Tipo Usuario</label>
							<div class='col-sm-10'>
								<select name='tipo-box' class='form-control'>
									<?php
									$res = $cliente->listar_tipo_usuario();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($tipo == $row["id"]) echo "selected"; echo ">" . $row["descripcion"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<input type='text' name='fono-box' class='form-control' id='fono-box' placeholder='Teléfono'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script type='text/javascript' src='../../js/bootstrap.js'></script>
	</body>
</html>