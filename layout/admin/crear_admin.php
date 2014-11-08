<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 0;
$fono = "";
$colegio = 0;

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["apellido-box"]))
	$apellido = $_POST["apellido-box"];
if (isset($_POST["mail-box"]))
	$correo = $_POST["mail-box"];
if (isset($_POST["sexo-box"]))
	$sexo = $_POST["sexo-box"];
if (isset($_POST["fono-box"]))
	$fono = "+56" . $_POST["ni-box"] . $_POST["fono-box"];
if (isset($_POST["colegio-box"]))
	$colegio = $_POST["colegio-box"];

if (strlen($nombre) > 0 && strlen($apellido) > 0 && strlen($correo) > 0 && $sexo > 0 && strlen($fono) > 4 && $colegio > 0) {
	if ($consulta = $cliente->consulta_correo_unico($correo)) {
		if ($consulta->num_rows < 1) {
			$datos = array(strtoupper($nombre), strtoupper(apellido), strtoupper($correo), md5("1234"), $sexo, str_replace(" ", "", trim($_POST["fono-box"])), 3, 1, $_SESSION["id"], $colegio, 0, 0);
			if ($id_insert = $cliente->crear_usuario($datos)) {
				$cliente->cerrar_conn();
				header("Location: ver_admin.php?usr=" . $id_insert);
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
						Administrador Colegio Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_admin.php' method='post'>
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
								<div class="input-group">
	      							<div class="input-group-addon">+56</div>
	      							<span class='input-group-addon'>
										<select name='ni-box'>
										  	<option value='9'>9</option>
										  	<option value='2'>2</option>
										</select>
									</span>
									<input type='text' name='fono-box' maxlength='8' onkeypress='return justNumbers(event);' class='form-control' id='fono-box' placeholder='Teléfono' value='<?php echo substr($fono, 4, 8) ?>'>
								</div>
							</div>
						</div>
						<div class='form-group'>
							<label for='colegio-box' class='col-sm-2 control-label'>Colegio</label>
							<div class='col-sm-10'>
								<select name='colegio-box' id='colegio-box' class='form-control'>
									<?php
									$res = $cliente->lista_simple_colegios();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($colegio == $row["id"]) echo "selected"; echo ">" . $row["nombre"]; ?></option>
									<?php
									}
									$cliente->cerrar_conn();
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear</button>
								<a class="btn btn-info" href="listar_admin.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>