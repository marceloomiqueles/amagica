<?php
// include_once("../include/header-cache.php");
require("../include/cliente.class.php");
// if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 0;
$fono = "";
$colegio = 0;

if (isset($_POST["nombre"]))
	$nombre = strtoupper(trim($_POST["nombre"]));
if (isset($_POST["apellido"]))
	$apellido = strtoupper(trim($_POST["apellido"]));
if (isset($_POST["mail"]))
	$correo = strtoupper(trim($_POST["mail"]));
if (isset($_POST["colegio"]))
	$colegio = trim($_POST["colegio"]);

if (strlen($nombre) > 0 && strlen($apellido) > 0 && strlen($correo) > 0 && $colegio > 0) {
	if ($consulta = $cliente->consulta_correo_unico($correo)) {
		if ($consulta->num_rows < 1) {
			$datos = array($nombre, $apellido, $correo, md5("1234"), $sexo, $fono, 3, 1, 1, $colegio, 0, 0);
			if ($id_insert = $cliente->crear_usuario($datos)) {
				$cliente->cerrar_conn();
				echo $id_insert;
			} else {
				echo "Ha ocurrido un error";
			}
		} else {
			echo "¡Correo Existente!";
		}
	}
} else {
	echo "¡Faltan Datos!";
}
?>