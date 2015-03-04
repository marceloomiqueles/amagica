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
	$nombre = mb_strtoupper(trim($_POST["nombre-box"]), 'UTF-8');
if (isset($_POST["apellido-box"]))
	$apellido = mb_strtoupper(trim($_POST["apellido-box"]), 'UTF-8');
if (isset($_POST["sexo-box"]))
	$sexo = trim($_POST["sexo-box"]);
if (isset($_POST["fono-box"]))
	$fono = "+56" . trim($_POST["ni-box"]) . trim($_POST["fono-box"]);
if (isset($_POST["colegio-box"]))
	$colegio = trim($_POST["colegio-box"]);
if (isset($_POST["nivel-box"]))
	$nivel = trim($_POST["nivel-box"]);
if (isset($_POST["curso-box"]))
	$curso = trim($_POST["curso-box"]);
if (isset($_GET["usr"]))
	$id_box = trim($_GET["usr"]);
if (isset($_POST["id-box"]))
	$id_box = trim($_POST["id-box"]);

if (strlen($nombre) > 0 && strlen($apellido) > 0 && $sexo > 0 && strlen($fono) > 0 && $id_box > 0 && $colegio > 0 && $nivel > 0 && $curso > 0) {
	$cambios = array(
		$nombre, 
		$apellido, 
		$sexo, 
		4, 
		$fono, 
		$colegio, 
		$nivel, 
		$curso
	);
	if ($cliente->actualiza_usuario_id($cambios, $id_box))
		header("Location: ver_profesor.php?usr=" . $id_box . "&exito=2");
	else
		header("Location: mod_profesor.php?usr=" . $id_box . "&exito=3");
}

if ($consulta = $cliente->consulta_usuario_id($id_box))
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$apellido = $row["apellido"];
		$correo = $row["mail"];
		$tipo = $row["descripcion"];
		$sexo = $row["sexo"];
		$digito = substr($row["telefono"], 3, 1);
		$fono = substr($row["telefono"], 4, 8);
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
						Editar Docente
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
								<p class='form-control-static'><?php echo $correo; ?></p>
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
							<label for='tipo-box' class='col-sm-2 control-label'>Tipo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $tipo; ?></p>
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