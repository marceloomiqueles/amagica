<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
require("../../mail/PHPMailerAutoload.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 0;
$fono = "";
$colegio = 0;
$nivel = 0;
$curso = 0;

if (isset($_POST["nombre-box"]))
	$nombre = mb_strtoupper(trim($_POST["nombre-box"]), 'UTF-8');
if (isset($_POST["apellido-box"]))
	$apellido = mb_strtoupper(trim($_POST["apellido-box"]), 'UTF-8');
if (isset($_POST["mail-box"]))
	$correo = mb_strtoupper(trim($_POST["mail-box"]), 'UTF-8');
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

if (strlen($nombre) > 0 && strlen($apellido) > 0 && filter_var($correo, FILTER_VALIDATE_EMAIL) && $sexo > 0 && $fono > 7 && $colegio > 0 && $nivel > 0 && $curso > 0) {
	if ($res = $cliente->consulta_correo_unico($correo)) {
		if ($res->num_rows < 1) {
			$datos = array($nombre, $apellido, $correo, md5("1234"), $sexo, str_replace(" ", "", $fono), 4, 1, $_SESSION["id"], $colegio, $nivel, $curso);
			if ($id_insert = $cliente->crear_usuario($datos)) {
				$cliente->cerrar_conn();
				$consulta = $cliente->consulta_usuario_por_id($id_insert);
				$row = $consulta->fetch_array(MYSQLI_ASSOC);
				//Create a new PHPMailer instance
				$mail->CharSet = "UTF-8";
				//Set who the message is to be sent from
				$mail->setFrom('info@descargamagica.cl', 'Clima Mágico Info');
				//Set an alternative reply-to address
				$mail->addReplyTo('info@descargamagica.cl', 'Clima Mágico Info');
				//Set who the message is to be sent to
				$mail->addAddress($row["mail"], $row["nombre"] . ' ' . $row["apellido"]);
				//Set the subject line
				$mail->Subject = 'Registro Clima Mágico';
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$html = '<!DOCTYPE html>
				<html>
					<head>
						<meta charset="UTF-8">
					  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					  	<title>Registro Inicial</title>
					</head>
					<body>
					  	<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
					    	<h1>Bienvenido a Clima Mágico</h1>
						    <div align="center">
						    </div>
						    <p><strong>Estas son sus credenciales de acceso</strong></p>
						    <p>
						    Usuario: ' . {$row["mail"]} . '
						    <br>
						    Password: 1234
						    <br>
						    Link Ingreso: <a href="http://descargamagica.cl/CLIENTES/login.php" target="_blak">http://www.descargamagica.cl/CLIENTES/login.php</a>
						    </p>
						    <p>Este correo es generado automáticamente, por favor no responder.</p>
					  	</div>
					</body>
				</html>
				';

				$mail->msgHTML($html);
				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';

				//send the message, check for errors
				if (!$mail->send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
					header("Location: ver_profesor.php?usr=" . $id_insert . "&exito=1");
				}
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
						Docente Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_profesor.php' method='post'>
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
								<?php
								if ($_SESSION["tipo"] == 3) {
									$res = $cliente->consulta_colegio_id($_SESSION["colegio"]);
									$row = $res->fetch_array(MYSQLI_ASSOC);
								?>
								<p class='form-control-static'><?php echo $row["nombre"]; ?></p>
								<input type='hidden' name='colegio-box' value='<?php echo $row["id"] ?>'>
								<?php
								} else {
								?>
								<select name='colegio-box' onchange='cargaCurosPorColegio()' id='colegio-box' class='form-control'>
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
								<?php
								}
								?>
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
								<button type='submit' class='btn btn-default'>Crear</button>
								<a class="btn btn-info" href="listar_profesores.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>