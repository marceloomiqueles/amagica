<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["prd"]))
	$cliente->cambia_estado_producto(0, $_GET["prd"]);

header("Location: listar_productos.php?exito=3");
?>