<?php
include_once("../include/header-cache.php");
require("../include/cliente.class.php");

ini_set('memory_limit', '2048M');

$okpost = 0;
if (isset($_POST['solic']) && isset($_POST['lang']) && isset($_POST['curso'])) {
	$solic = $_POST['solic'];
	$cliente = substr(md5(rand(0, 1000000)), 0, 7);
	$lang = $_POST['lang'];
	$curso = $_POST['curso'];
	$okpost = 1;	
}

class Utils {
  	public static function listDirectory($dir) {
	    $result = array();
	    $root = scandir($dir);
	    foreach ($root as $value) {
	      	if ($value === '.' || $value === '..') {
				continue;
	      	}
	      	if (is_file("$dir$value")) {
	        	$result[] = "$dir$value";
	        	continue;
	      	}
	      	if (is_dir("$dir$value")) {
	        	$result[] = "$dir$value/";
	      	}
	      	foreach (self::listDirectory("$dir$value/") as $value) {
	        	$result[] = $value;
	      	}
	    }
	    return $result;
  	}
}

function marcaNumeroLicencia($directorio) {
	$directory = $directorio;
	$files = glob($directory . "*.html");
	foreach ($files as $text) {
		$stemp = file_get_contents($text);
		preg_match('/var cliente = "(.*?)"/', $stemp, $match);
		$rep = $match[1];
		$st2 = str_replace($rep, $cliente, $stemp);
		$st3 = <<<DON
$st2
DON;
		$myfile = fopen($text, "w") or die("Unable to open file!");
		$txt = $st3;
		fwrite($myfile, $txt);
		fclose($myfile);
	}
}

function zippingFile($source, $link, $file, $urlTxt) {
	set_time_limit(1000);
	$source_dir = $source;
	$zip_link = $link;
	$zip_file = $file;
	$file_list = Utils::listDirectory($source_dir);
	$zip = new ZipArchive();
	if ($zip->open($zip_file, ZIPARCHIVE::CREATE) === true) {
		foreach ($file_list as $file) {
			if ($file !== $zip_file) {
				$zip->addFile($file, substr($file, strlen($source_dir)));
			}
		}
		$zip->close();
	}
	//return $linksdescarga .= '<a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >' . $urlTxt . '</a>';
	return $zip_link;
}

if ($okpost == 1) {
	//PRIMERO
	for ($i = 1; $i < 12; $i++) {
		marcaNumeroLicencia("../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO/CLASES-PRIMERO/Clase" . $i . "/");
	}
	//SEGUNDO
	for ($i = 1; $i < 12; $i++) {
		marcaNumeroLicencia("../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO/CLASES-SEGUNDO/Clase" . $i . "/");
	}
	//TERCERO
	for ($i = 1; $i < 12; $i++) {
		marcaNumeroLicencia("../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO/CLASES-TERCERO/Clase" . $i . "/");
	}
	//CUARTO
	for ($i = 1; $i < 12; $i++) {
		marcaNumeroLicencia("../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO/CLASES-CUARTO/Clase" . $i . "/");
	}
	//PRODUCTOS ZIPPING
	//CURSOS FULL
	$zip_link = "";
	if ($curso == 1) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO/', 'AMagica_1robasico_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1robasico_' . $cliente . ".zip", "Alfombra Magica Primero Basico");
	}
	if ($curso == 2) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO/', 'AMagica_2dobasico_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2dobasico_' . $cliente . ".zip", "Alfombra Magica Segundo Basico");
	}
	if ($curso == 3) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO/', 'AMagica_3robasico_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3robasico_' . $cliente . ".zip", "Alfombra Magica Tercero Basico");
	}
	if ($curso == 4) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO/', 'AMagica_4tobasico_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4tobasico_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico");
	}
	//CURSOS MULTIMEDIA
	if ($curso == 111) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_M/', 'AMagica_1robasico_M_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1robasico_M_' . $cliente . ".zip", "Alfombra Magica Primero Basico Multimedia");
	}
	if ($curso == 222) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_M/', 'AMagica_2dobasico_M_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2dobasico_M_' . $cliente . ".zip", "Alfombra Magica Segundo Basico Multimedia");
	}
	if ($curso == 333) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_M_/', 'AMagica_3robasico_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3robasico_M_' . $cliente . ".zip", "Alfombra Magica Tercero Basico Multimedia");
	}
	if ($curso == 444) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_M/', 'AMagica_4tobasico_M_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4tobasico_M_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico Multimedia");
	}
	//CURSOS INDIVIDUALES
	if ($curso == 11) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_IDENTIDAD/', 'AMagica_1ro_Identidad_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1ro_Identidad_' . $cliente . ".zip", "Alfombra Magica Primero Basico Multimedia Identidad");
	}
	if ($curso == 12) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_AUTOESTIMA/', 'AMagica_1ro_Autoestima_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1ro_Autoestima_' . $cliente . ".zip", "Alfombra Magica Primero Basico Multimedia Autoestima");
	}
	if ($curso == 13) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_AUTOCUIDADO/', 'AMagica_1ro_Autocuidado_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1ro_Autocuidado_' . $cliente . ".zip", "Alfombra Magica Primero Basico  Multimedia Autocuidado");
	}
	if ($curso == 14) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_VALORES/', 'AMagica_1ro_Valores_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1ro_Valores_' . $cliente . ".zip", "Alfombra Magica Primero Basico Multimedia Valores");
	}
	if ($curso == 15) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_CONFLICTOS/', 'AMagica_1ro_Conflictos_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_1ro_Conflictos_' . $cliente . ".zip", "Alfombra Magica Primero Basico Multimedia Manejo de conflictos");
	}
	if ($curso == 21) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_IDENTIDAD/', 'AMagica_2do_Identidad_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2do_Identidad_' . $cliente . ".zip", "Alfombra Magica Segundo Basico Multimedia Identidad");
	}
	if ($curso == 22) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_AUTOESTIMA/', 'AMagica_2do_Autoestima_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2do_Autoestima_' . $cliente . ".zip", "Alfombra Magica Segundo Basico Multimedia Autoestima");
	}
	if ($curso == 23) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_AUTOCUIDADO/', 'AMagica_2do_Autocuidado_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2do_Autocuidado_' . $cliente . ".zip", "Alfombra Magica Segundo Basico Multimedia Autocuidado");
	}
	if ($curso == 24) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_VALORES/', 'AMagica_2do_Valores_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2do_Valores_' . $cliente . ".zip", "Alfombra Magica Segundo Basico Multimedia Valores");
	}
	if ($curso == 25) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_CONFLICTOS/', 'AMagica_2do_Conflictos_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_2do_Conflictos_' . $cliente . ".zip", "Alfombra Magica Segundo Basico Multimedia Manejo de conflictos");
	}
	if ($curso == 31) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_IDENTIDAD/', 'AMagica_3ro_Identidad_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3ro_Identidad_' . $cliente . ".zip", "Alfombra Magica Tercero Basico Multimedia Identidad");
	}
	if ($curso == 32) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_AUTOESTIMA/', 'AMagica_3ro_Autoestima_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3ro_Autoestima_' . $cliente . ".zip", "Alfombra Magica Tercero Basico Multimedia Autoestima");
	}
	if ($curso == 33) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_AUTOCUIDADO/', 'AMagica_3ro_Autocuidado_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3ro_Autocuidado_' . $cliente . ".zip", "Alfombra Magica Tercero Basico Multimedia Autocuidado");
	}
	if ($curso == 34) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_VALORES/', 'AMagica_3ro_Valores_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3ro_Valores_' . $cliente . ".zip", "Alfombra Magica Tercero Basico Multimedia Valores");
	}
	if ($curso == 35) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_CONFLICTOS/', 'AMagica_3ro_Conflictos_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_3ro_Conflictos_' . $cliente . ".zip", "Alfombra Magica Tercero Basico Multimedia Manejo de conflictos");
	}
	if ($curso == 41) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_IDENTIDAD/', 'AMagica_4to_Identidad_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4to_Identidad_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico Multimedia Identidad");
	}
	if ($curso == 42) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_AUTOESTIMA/', 'AMagica_4to_Autoestima_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4to_Autoestima_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico Multimedia Autoestima");
	}
	if ($curso == 43) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_AUTOCUIDADO/', 'AMagica_4to_Autocuidado_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4to_Autocuidado_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico Multimedia Autocuidado");
	}
	if ($curso == 44) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_VALORES/', 'AMagica_4to_Valores_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4to_Valores_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico Multimedia Valores");
	}
	if ($curso == 45) {
		$zip_link = zippingFile('../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_CONFLICTOS/', 'AMagica_4to_Conflictos_' . $cliente . ".zip", '../../../DESCARGASUSUARIO/AMagica_4to_Conflictos_' . $cliente . ".zip", "Alfombra Magica Cuarto Basico Multimedia Manejo de conflictos");
	}
	$cliente = new Cliente;
	$link = "http://www.descargamagica.cl/CLIENTES/Test/gestor.php?archivo=" . $zip_link;
	$cliente->actualiza_ruta_descarga($link, $solic);
}
?>