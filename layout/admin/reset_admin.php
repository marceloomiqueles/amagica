<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
require("../../mail/PHPMailerAutoload.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php"); 

$cliente = new Cliente;

if (isset($_GET["usr"])) {
	$datos = array("1234");
	$cliente->reinicia_pass_usuario($datos, $_GET["usr"]);
	$consulta = $cliente->consulta_usuario_por_id($_GET["usr"]);
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
		header("Location: listar_admin.php?exito=1");
	}
}
header("Location: listar_admin.php?exito=1");
?>