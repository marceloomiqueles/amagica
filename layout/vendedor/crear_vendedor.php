<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 1;
$fono = "";

if (isset($_POST["nombre-box"]))
	$nombre = mb_strtoupper(trim($_POST["nombre-box"]), 'UTF-8');
if (isset($_POST["apellido-box"]))
	$apellido = mb_strtoupper(trim($_POST["apellido-box"]), 'UTF-8');
if (isset($_POST["mail-box"]))
	$correo = strtoupper(trim($_POST["mail-box"]));
if (isset($_POST["sexo-box"]))
	$sexo = trim($_POST["sexo-box"]);
if (isset($_POST["fono-box"]))
	$fono = trim($_POST["fono-box"]);

if (strlen($nombre) > 0 && strlen($apellido) > 0 && filter_var($correo, FILTER_VALIDATE_EMAIL) && $sexo > 0 && strlen($fono) == 8) {
	if ($consulta = $cliente->consulta_correo_unico($correo)) {
		if ($consulta->num_rows < 1) {
			$datos = array($nombre, $apellido, $correo, md5("1234"), $sexo,  "+56" . $_POST["ni-box"] . $fono, 2, 1, $_SESSION["id"], 1, 0, 0);
			if ($id_insert = $cliente->crear_usuario($datos)) {
				//print_r($datos);die();
				$cliente->cerrar_conn();
				$cliente->crear_credito($id_insert);
				header("Location: ver_vendedor.php?usr=" . $id_insert . "&exito=1");
			}
		}
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
						Vendedor Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_vendedor.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' maxlength='45' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='apellido-box' class='col-sm-2 control-label'>Apellido</label>
							<div class='col-sm-10'>
								<input type='text' name='apellido-box' maxlength='45' class='form-control' id='apellido-box' placeholder='Apellido' value='<?php echo $apellido ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='mail-box' class='col-sm-2 control-label'>Correo</label>
							<div class='col-sm-10'>	
								<input type='mail' name='mail-box' maxlength='45' class='form-control' id='mail-box' placeholder='Correo' value='<?php echo $correo ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='sexo-box' class='col-sm-2 control-label'>Sexo</label>
							<div class='col-sm-10'>
								<select name='sexo-box' class='form-control'>
								  	<option value='1' <?php if ($sexo == 1) echo "selected" ?>>Masculino</option>
								  	<option value='2' <?php if ($sexo == 2) echo "selected" ?>>Femenino</option>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<div class='input-group'>
									<div class="input-group-addon">+56</div>
	      							<span class='input-group-addon'>
										<select name='ni-box'>
										  	<option value='9'>9</option>
										  	<option value='2'>2</option>
										</select>
									</span>
									<input type='text' name='fono-box' maxlength='8' onkeypress='return justNumbers(event);' class='form-control' id='fono-box' placeholder='Teléfono' value='<?php echo $fono; ?>'>
								</div>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear</button>
								<a class="btn btn-info" href="listar_vendedores.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>