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
	$fono = "+56" . trim($_POST["ni-box"]) . trim($_POST["fono-box"]);

if (strlen($nombre) > 0 && strlen($apellido) > 0 && filter_var($correo, FILTER_VALIDATE_EMAIL) && $sexo > 0 && strlen($fono) == 8) {
	if ($consulta = $cliente->consulta_correo_unico($correo)) {
		if ($consulta->num_rows < 1) {
			$datos = array($nombre,	$apellido, $correo, md5("1234"), $sexo, $fono, 1, 2, $_SESSION["id"], 1, 0, 0, 0);
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

				$cliente->cerrar_conn();
				//send the message, check for errors
				if (!$mail->send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
					header("Location: ver_usuario.php?usr=" . $id_insert . "&exito=1");
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
						Administrador Nuevo
					</h2>
					<form class='form-horizontal' role='form' action='crear_usuario.php' method='post'>
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
							<label for='tipo-box' class='col-sm-2 control-label'>Tipo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'>Administrador Sistema</p>
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
								<a class="btn btn-info" href="listar_usuarios.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>