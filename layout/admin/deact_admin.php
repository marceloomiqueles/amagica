<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["usr"])) {
	$res = $cliente->consulta_estado_usuario($_GET["usr"]);
	$row = $res->fetch_array(MYSQLI_ASSOC);
	if ($row["estado"] == 1)
		$cliente->cambia_estado_usuario(2, $_GET["usr"]);
	if ($row["estado"] == 2)
		$cliente->cambia_estado_usuario(1, $_GET["usr"]);
}
header("Location: listar_admin.php?exito=2");
?>