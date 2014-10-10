<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["clg"])) {
	$res = $cliente->consulta_estado_colegio($_GET["clg"]);
	$row = $res->fetch_array(MYSQLI_ASSOC);
	if ($row["estado"] == 1)
		$cliente->cambia_estado_colegio(2, $_GET["clg"]);
	if ($row["estado"] == 2)
		$cliente->cambia_estado_colegio(1, $_GET["clg"]);

}
header("Location: listar_colegios.php?exito=2");
?>