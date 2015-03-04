<?php
// include_once("../include/header-cache.php");
require("../include/cliente.class.php");
// if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$comuna = 347;
$calle = "";
$numero = 0;
$fono = "";
$nivel = 0;
$estado = 0;

if (isset($_POST["nombre"]))
	$nombre = strtoupper(trim($_POST["nombre"]));
if (isset($_POST["cursos"]))
	$nivel = trim($_POST["cursos"]);

$estado = 1;

if (strlen($nombre) > 0 && strlen($nivel) > 0) {
	$datos = array(
		$nombre,
		$comuna,
		$calle,
		$numero,
		$fono,
		$nivel,
		$estado,
		1
		);
	if ($id_insert = $cliente->crear_colegio($datos)) {
		$cliente->cerrar_conn();
		for ($i = 1; $i <= 4; $i++) {
			for ($z = 1; $z <= $nivel; $z++) {
				$datos = array($id_insert, $i, $z);
				$cliente->crear_curso($datos);
				$cliente->cerrar_conn();
			}
		}
		echo $id_insert;
	} else {
		echo "Ha ocurrido un error";
	}

} else {
	echo "¡Faltan Datos!";
}
?>