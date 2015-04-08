<?php
include_once("../include/header-cache.php");
require("../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../include/login_session.php");

ini_set('memory_limit', '2048M');

$okpost = 0;
if (isset($_POST['solic']) && isset($_POST['lang'] ) && isset($_POST['curso']) && isset($_POST['tipo'])) {
	$solic = $_POST['solic'];
	$lang = $_POST['lang'];
	$curso = $_POST['curso'];
	$tipo = $_POST['tipo'];
	$okpost = 1;	
}

if ($okpost == 1) {
	$linksdescarga = "";

	$zip_link = "";

	if ($lang == 1) {
		//CURSOS FULL ESPAÑOL
		if ($curso == 1) {
			$zip_link = '1robasico_ES.zip';
		}
		if ($curso == 2) {
			$zip_link = '2dobasico_ES.zip';
		}
		if ($curso == 3) {
			$zip_link = '3robasico_ES.zip';
		}
		if ($curso == 4) {
			$zip_link = '4tobasico_ES.zip';
		}
	}
	elseif ($lang == 2) {
		//CURSOS FULL INGLES
		if ($curso == 1) {
			$zip_link = '1robasico_EN.zip';
		}
		if ($curso == 2) {
			$zip_link = '2dobasico_EN.zip';
		}
		if ($curso == 3) {
			$zip_link = '3robasico_EN.zip';
		}
		if ($curso == 4) {
			$zip_link = '4tobasico_EN.zip';
		}
	}

	$cliente = new Cliente;
	$link = "../../Test/gestor.php?archivo=CLIMA_MAGICO_" . $zip_link;
	$cliente->actualiza_ruta_descarga($link, $solic);
}
?>