<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["usr"])) 
	$cliente->cambia_estado_usuario(0, $_GET["usr"]);

header("Location: listar_admin.php?exito=3");
?>