<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php"); 

$cliente = new Cliente;

if (isset($_GET["usr"])) {
	$datos = array("1234");
	$cliente->reinicia_pass_usuario($datos, $_GET["usr"]);
}
header("Location: listar_admin.php?exito=1");
?>