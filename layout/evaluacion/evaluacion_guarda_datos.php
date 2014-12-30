<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

$cliente = new Cliente;

if (isset($_POST["respuesta"]) && isset($_POST["invertido"]) && isset($_POST["preg"]) && isset($_POST["eval"]) && isset($_POST["lista"])) {
	$valor = $_POST["respuesta"];
	if ($_POST["invertido"] == 1 && $valor == 1)
		$valor = 0;
	elseif ($_POST["invertido"] == 1 && $valor == 0)
		$valor = 1;
	$datos = array($valor, $_POST["eval"], $_POST["preg"], $_POST["lista"], 1, $_POST["invertido"]);
	// print_r($datos);
	if (!$cliente->insertar_respuesta_alumno($datos)) echo "Ocurrió un error";
} else {
	echo "Falta un valor";
}
?>