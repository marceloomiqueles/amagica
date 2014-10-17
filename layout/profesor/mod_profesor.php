<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 0;
$tipo = 0;
$fono = "";
$colegio = 0;
$nivel = 0;
$curso = 0;
$id_box = "";

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["apellido-box"]))
	$apellido = $_POST["apellido-box"];
if (isset($_POST["mail-box"]))
	$correo = $_POST["mail-box"];
if (isset($_POST["sexo-box"]))
	$sexo = $_POST["sexo-box"];
if (isset($_POST["fono-box"]))
	$fono = $_POST["fono-box"];
if (isset($_POST["colegio-box"]))
	$colegio = $_POST["colegio-box"];
if (isset($_POST["nivel-box"]))
	$nivel = $_POST["nivel-box"];
if (isset($_POST["curso-box"]))
	$curso = $_POST["curso-box"];
if (isset($_GET["usr"]))
	$id_box = $_GET["usr"];
if (isset($_POST["id-box"]))
	$id_box = $_POST["id-box"];

if (isset($_POST["nombre-box"]) && isset($_POST["apellido-box"]) && isset($_POST["mail-box"]) && isset($_POST["sexo-box"]) && isset($_POST["fono-box"]) && isset($_POST["id-box"]) && isset($_POST["colegio-box"]) && isset($_POST["nivel-box"]) && isset($_POST["curso-box"])) {
	$cambios = array(trim($_POST["nombre-box"]), trim($_POST["apellido-box"]), trim($_POST["mail-box"]), trim($_POST["sexo-box"]), 4, str_replace(" ", "", trim($_POST["fono-box"])), trim($_POST["colegio-box"]), trim($_POST["nivel-box"]), trim($_POST["curso-box"]));
	if ($cliente->actualiza_usuario_id($cambios, $id_box))
		header("Location: ver_profesor.php?usr=" . $id_box);
	else
		header("Location: mod_profesor.php?usr=" . $id_box);
}

if ($consulta = $cliente->consulta_usuario_id($id_box))
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$apellido = $row["apellido"];
		$mail = $row["mail"];
		$tipo = $row["descripcion"];
		$sexo = $row["sexo"];
		$fono = substr($row["telefono"], 0, 3) . " " . substr($row["telefono"], 3, 1) . " " . substr($row["telefono"], 4, 4) . " " . substr($row["telefono"], 8, 4);
		$colegio = $row["colegio_id"];
		$nivel = $row["nivel"];
		$curso = $row["curso"];
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
						Editar Profesor
					</h2>
					<form class='form-horizontal' role='form' action='mod_profesor.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<input type='text' name='nombre-box' class='form-control' id='nombre-box' placeholder='Nombre' value='<?php echo $nombre; ?>'>
								<input type='hidden' name='id-box' value='<?php echo $id_box; ?>'>
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
								  	<option value='1' <?php if ($sexo == 1) echo "selected" ?>>Hombre</option>
								  	<option value='2' <?php if ($sexo == 2) echo "selected" ?>>Mujer</option>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='tipo-box' class='col-sm-2 control-label'>Tipo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $tipo; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label for='fono-box' class='col-sm-2 control-label'>Teléfono</label>
							<div class='col-sm-10'>
								<input type='text' name='fono-box' class='form-control' id='fono-box' placeholder='Teléfono' value='<?php echo $fono; ?>'>
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
							<label for='nivel-box' class='col-sm-2 control-label'>Nivel</label>
							<div class='col-sm-10'>
								<select name='nivel-box' id='nivel-box' class='form-control'>
									<?php
									for ($i = 1; $i <= 4; $i++) {
									?>
								  	<option value='<?php echo $i ?>' <?php if ($nivel == $i) echo "selected"; echo ">" . $i; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='curso-box' class='col-sm-2 control-label'>Curso</label>
							<div class='col-sm-10'>
								<select id='curso-box' name='curso-box' class='form-control'>
									<?php
									$letra = "A";
									for($i = 0; $i <= 10; $i++) {
									?>
								  	<option value='<?php echo $i + 1 ?>' <?php if ($nivel == $i + 1) echo "selected";?>><?php echo $letra++; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class="btn btn-info" href="ver_profesor.php?usr=<?php echo $id_box ?>">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>