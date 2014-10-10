<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: ../../include/login_session.php");
}
$cliente = new Cliente;

if (isset($_POST["oldpass-box"]) && isset($_POST["newpass-box"]) && isset($_POST["newpass2-box"])) {
	if(strlen(trim($_POST["oldpass-box"])) > 0 && strlen(trim($_POST["newpass-box"])) > 0 && strlen(trim($_POST["newpass2-box"])) > 0) {
		if ($_POST["newpass-box"] == $_POST["newpass2-box"]) {
			if ($consulta = $cliente->consulta_usuario_pass_correcta(md5($_POST["oldpass-box"]), $_SESSION["id"])) {
				if ($consulta->num_rows > 0) {
					$datos = array($_POST["newpass-box"], $_POST["oldpass-box"]);
					if($cliente->actualiza_pass_usuario($datos, $_SESSION["id"])) {
						header("Location: mod_pass.php?exito=1");
					}
				}
			}
		}
	}
}

if ($consulta = $cliente->consulta_usuario_id($_SESSION["id"])) {
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$apellido = $row["apellido"];
		$mail = $row["mail"];
		if($row["sexo"] == 1)
			$sexo = "Hombre";
		else
			$sexo = "Mujer";
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
						Contraseña <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) echo "modificada correctamente!" ?>
					</h2>
					<form class='form-horizontal' role='form' action='mod_pass.php' method='post'>
						<div class='form-group'>
							<label for='oldpass-box' class='col-sm-2 control-label'>Clave Actual</label>
							<div class='col-sm-10'>
								<input type='password' name='oldpass-box' class='form-control' id='oldpass-box' placeholder='Clave Actual'>
							</div>
						</div>
						<div class='form-group'>
							<label for='newpass-box' class='col-sm-2 control-label'>Clave Nueva</label>
							<div class='col-sm-10'>
								<input type='password' name='newpass-box' class='form-control' id='newpass-box' placeholder='Clave Nueva'>
							</div>
						</div>
						<div class='form-group'>
							<label for='newpass2-box' class='col-sm-2 control-label'>Repita Clave Nueva</label>
							<div class='col-sm-10'>	
								<input type='password' name='newpass2-box' class='form-control' id='newpass2-box' placeholder='Repita Clave Nueva'>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Modificar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>