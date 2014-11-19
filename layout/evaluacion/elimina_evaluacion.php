<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["eval"])) 
	$cliente->cambia_estado_evaluacion(0, $_GET["eval"]);

header("Location: listar_evaluaciones.php?exito=3");
?>