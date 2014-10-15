<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["crd"]))
	if($consulta = $cliente->consulta_cantidad_credito_id($_GET["crd"])) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		if ($row["cantidad"] > 0) {
			$cliente->actualiza_credito_usuario($row["cantidad"] - 1, $_GET["crd"]);
			$cliente->cerrar_conn();
			$datos = array($_SESSION["id"], $_GET["crd"], 2, 1);
			$cliente->crear_venta_credito($datos);
			$cliente->cerrar_conn();
		}
	}

header("Location: manejar_credito.php");
?>