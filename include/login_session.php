<?php
require("header-cache.php");
if (isset($_POST["mail"]) && isset($_POST["pass"])) {
	require("cliente.class.php");
	$cliente = new Cliente;

	// $consulta = $objetoCliente->consulta_usuario("marcelomiqueles@hotmail.com", md5("sa12za23"));
	if ($consulta = $cliente->consulta_usuario_login($_POST["mail"], md5($_POST["pass"]))) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$_SESSION["id"] = $row["id"];
			$_SESSION["nombre"] = $row["nombre"] . " " . $row["apellido"];
			$_SESSION["sexo"] = $row["sexo"];
			// if ($_POST["pass"] == "1234") {
			// 	header ("Location: cambia_clave.php");
			// }
			header ("Location: ../");
		} else {
			session_destroy();
			header ("Location: ../login.php");
		}
	} else {
		session_destroy();
		header ("Location: ../login.php");
	}
} else {
	session_destroy();
	header ("Location: ../login.php");
}
?>