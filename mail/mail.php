<?php
require("../../include/cliente.class.php");
require 'PHPMailerAutoload.php';

$cliente = new Cliente;

if ($consulta = $cliente->consulta_usuario_por_id($_GET["id"])) {
	$row = $consulta->fetch_array(MYSQLI_ASSOC);

}


function SendMail($html) {
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	$mail->CharSet = "UTF-8";
	//Set who the message is to be sent from
	$mail->setFrom('info@descargamagica.cl', 'Clima Mágico Info');
	//Set an alternative reply-to address
	$mail->addReplyTo('info@descargamagica.cl', 'Clima Mágico Info');
	//Set who the message is to be sent to
	$mail->addAddress('marcelomiqueles@hotmail.com', 'Marcelo Miqueles');
	//Set the subject line
	$mail->Subject = 'Registro Clima Mágico';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body

	// $html = '<!DOCTYPE html>
	// <html>
	// 	<head>
	// 		<meta charset="UTF-8">
	// 	  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	// 	  	<title>Registro Inicial</title>
	// 	</head>
	// 	<body>
	// 	  	<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
	// 	    	<h1>Bienvenido a Clima Mágico</h1>
	// 		    <div align="center">
	// 		    </div>
	// 		    <p><strong>Estas son sus credenciales de acceso</strong></p>
	// 		    <p>
	// 		    Usuario: {$correo};
	// 		    <br>
	// 		    Password: 1234
	// 		    <br>
	// 		    Link Ingreso: <a href="http://descargamagica.cl/CLIENTES/login.php" target="_blak">http://www.descargamagica.cl/CLIENTES/login.php</a>
	// 		    </p>
	// 		    <p>Este correo es generado automáticamente, por favor no responder.</p>
	// 	  	</div>
	// 	</body>
	// </html>
	// ';

	$mail->msgHTML($html);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';

	//send the message, check for errors
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}
}