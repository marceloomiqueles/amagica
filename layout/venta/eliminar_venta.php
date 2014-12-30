<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["vnt"])) {
	$cliente->cambia_estado_venta(0, $_GET["vnt"]);
	$cliente->cambia_estado_licencia_venta_id(0, $_GET["vnt"]);
}

header("Location: listar_ventas.php?exito=3");
?>