<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["dct"])) {
	$res = $cliente->consulta_estado_documento($_GET["dct"]);
	$row = $res->fetch_array(MYSQLI_ASSOC);
	if ($row["estado"] == 1)
		$cliente->cambia_estado_documento(2, $_GET["dct"]);
	if ($row["estado"] == 2)
		$cliente->cambia_estado_documento(1, $_GET["dct"]);
}
header("Location: listar_documentos.php?exito=2");
?>