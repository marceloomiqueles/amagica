<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["prd"])) {
	$res = $cliente->consulta_estado_producto($_GET["prd"]);
	$row = $res->fetch_array(MYSQLI_ASSOC);
	if ($row["estado"] == 1)
		$cliente->cambia_estado_producto(2, $_GET["prd"]);
	if ($row["estado"] == 2)
		$cliente->cambia_estado_producto(1, $_GET["prd"]);
}
header("Location: listar_productos.php?exito=2");
?>