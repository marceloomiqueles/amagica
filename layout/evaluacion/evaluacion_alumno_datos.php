<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

$cliente = new Cliente;

$consulta = $cliente->consulta_preguntas_por_evaluacion_id(1, $_SESSION["test_id"], $_SESSION["id"]);

$arr = array();
$while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
	$arr[] = array(
		'id' => $row["id"],
		'n_orden' => $row["n_orden"],
		'pregunta' => $row["pregunta"],
		'estado' => $row["estado"],
		'evaluacion_id' => $row["evaluacion_id"],
		'invertido' => $row["invertido"] 
		);
}

echo '' . json_encode($arr) . '';
?>