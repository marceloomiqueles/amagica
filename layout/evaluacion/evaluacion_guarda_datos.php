<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

$cliente = new Cliente;

if (isset($_POST["respuesta"]) && isset($_POST["preg"]) && isset($_POST["eval"]) && isset($_POST["lista"])) {
	$datos = array($_POST["respuesta"], $_POST["eval"], $_POST["preg"], $_POST["lista"], 1);
	// print_r($datos);
	if (!$cliente->insertar_respuesta_alumno($datos)) echo "Ocurrió un error";
} else {
	echo "Falta un valor";
}
?>