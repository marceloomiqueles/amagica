<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["clg"])) 
	$cliente->cambia_estado_colegio(0, $_GET["clg"]);

header("Location: listar_colegios.php?exito=1");
?>