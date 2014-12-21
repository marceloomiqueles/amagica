<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["nt"]) && isset($_GET["clg"])) 
	if ($cliente->cambia_estado_nota_colegio(2, $_GET["nt"]))
		header("Location: ver_colegio.php?clg=" . $_GET["clg"] . "&exito=3");
?>