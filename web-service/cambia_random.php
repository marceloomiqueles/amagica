<?php
require("../include/cliente.class.php");

$cliente = new Cliente;

if (isset($_POST["licencia"]) && strlen($_POST["licencia"]) == 32) {
	if ($cliente->actualiza_random_licencia("", $_POST["licencia"]) && $cliente->actualiza_token_licencia("", $_POST["licencia"])) {
		
		echo "ok";
	} else {
		echo "Ha ocurrido un error";
	}

} else {
	echo "Datos Inconsistentes";
}
?>