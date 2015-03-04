<?php
error_reporting(-1);
// include_once("../include/header-cache.php");
require("../include/cliente.class.php");
// if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$res = $cliente->lista_simple_colegios();
while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
	echo $row["id"]  . "," . htmlentities($row["nombre"]) . ";";
}
?>