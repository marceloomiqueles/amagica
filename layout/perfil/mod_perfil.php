<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_POST["nombre-box"]) && isset($_POST["apellido-box"]) && isset($_POST["mail-box"]) && isset($_POST["sexo-box"]) && isset($_POST["fono-box"])) {
	$cambios = array(
		trim($_POST["nombre-box"]), 
		trim($_POST["apellido-box"]), 
		trim($_POST["mail-box"]), 
		trim($_POST["sexo-box"]), 
		str_replace(" ", "", trim($_POST["fono-box"]))
		);
	if ($cliente->actualiza_perfil_id($cambios, $_SESSION["id"])) {
		$_SESSION["nombre"] = trim($_POST["nombre-box"]) . " " . trim($_POST["apellido-box"]);
		header("Location: ver_perfil.php");
	}
	else
		header("Location: mod_perfil.php");
}

if ($consulta = $cliente->consulta_usuario_id($_SESSION["id"])) {
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$apellido = $row["apellido"];
		$mail = $row["mail"];
		if($row["sexo"] == 1)
			$sexo = "Masculino";
		else
			$sexo = "Femenino";
		$fono = substr($row["telefono"], 0, 3) . " " . substr($row["telefono"], 3, 1) . " " . substr($row["telefono"], 4, 4) . " " . substr($row["telefono"], 8, 4);
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
					<form class='form-horizontal' role='form' action='mod_perfil.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='apellido-box' class='col-sm-2 control-label'>Apellido</label>
							<div class='col-sm-10'>
								<input type='text' name='apellido-box' class='form-control' id='apellido-box' placeholder='Apellido' value='<?php echo $apellido; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='mail-box' class='col-sm-2 control-label'>Correo</label>
							<div class='col-sm-10'>	
								<input type='mail' name='mail-box' class='form-control' id='mail-box' placeholder='Correo' value='<?php echo $mail; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='sexo-box' class='col-sm-2 control-label'>Sexo</label>
							<div class='col-sm-10'>
								<select name='sexo-box' class='form-control'>
								  	<option value='1' <?php if ($_SESSION["sexo"] == 1) echo "selected" ?>>Masculino</option>
								  	<option value='2' <?php if ($_SESSION["sexo"] == 2) echo "selected" ?>>Femenino</option>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<input type='text' name='fono-box' class='form-control' id='fono-box' placeholder='Teléfono' value='<?php echo $fono; ?>'>
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