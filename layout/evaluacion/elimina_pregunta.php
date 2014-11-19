<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["prg"]) && isset($_GET["eval"])) 
	if ($cliente->cambia_estado_pregunta(2, $_GET["prg"]))
		header("Location: ver_evaluacion.php?eval=" . $_GET["eval"] . "&exito=3");
?>