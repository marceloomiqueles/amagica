<?php
include_once("../include/header-cache.php");
require("../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

ini_set('memory_limit', '2048M');

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

$okpost = 0;
if (isset($_POST['solic']) && isset($_POST['lang']) && isset($_POST['curso'])) {
	$solic = $_POST['solic'];
	$cliente = substr(md5(rand(0, 1000000)), 0, 7);
	$lang = $_POST['lang'];
	$curso = $_POST['curso'];
	$okpost = 1;	
}	
// include_once('basecfg.php');
if ($okpost == 1) {
	$linksdescarga = "";
	if ($curso == 1) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMEROBASICO/';
		$zip_link = 'Alfombra_Magica_1robasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/Alfombra_Magica_1robasico_' . $cliente . ".zip";
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
		$linksdescarga .= 'http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link;
	}
	if ($curso == 2) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDOBASICO/';
		$zip_link = 'Alfombra_Magica_2dobasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/Alfombra_Magica_2dobasico_' . $cliente . ".zip";
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
		$linksdescarga .= 'http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link;
	}
	if ($curso == 3) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCEROBASICO/';
		$zip_link = 'Alfombra_Magica_3robasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/Alfombra_Magica_3robasico_' . $cliente . ".zip";
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
		$linksdescarga .= 'http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link;
	}
	if($curso == 4) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTOBASICO/';
		$zip_link = 'Alfombra_Magica_4tobasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/Alfombra_Magica_4tobasico_' . $cliente . ".zip";
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
		$linksdescarga .= 'http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link;
	}

	$cliente = new Cliente;

	$cliente->actualiza_ruta_descarga($linksdescarga, $solic);

	echo "ok";

}

?>