<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["dct"]))
	$cliente->cambia_estado_documento(0, $_GET["dct"]);

header("Location: listar_documentos.php?exito=3");
?>