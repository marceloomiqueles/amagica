<?php
include_once("../include/header-cache.php");
require("../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

ini_set('memory_limit', '2048M');

$okpost = 0;
// if (isset($_POST['solic']) && isset($_POST['lang']) && isset($_POST['curso'])  && isset($_POST['mail'])) {
if (isset($_POST['solic']) && isset($_POST['lang']) && isset($_POST['curso'])) {
	$solic = $_POST['solic'];
	$cliente = substr(md5(rand(0, 1000000)), 0, 7);
	$lang = $_POST['lang'];
	$curso = $_POST['curso'];
	// $email = $_POST['mail'];
	$okpost = 1;	
}

class Utils {
  	public static function listDirectory($dir) {
	    $result = array();
	    $root = scandir($dir);
	    foreach($root as $value) {
	      	if($value === '.' || $value === '..') {
				continue;
	      	}
      		if(is_file("$dir$value")) {
	        	$result[] = "$dir$value";
	        	continue;
	      	}
	      	if(is_dir("$dir$value")) {
	        	$result[] = "$dir$value/";
	      	}
	      	foreach(self::listDirectory("$dir$value/") as $value) {
	        	$result[] = $value;
	      	}
	    }
	    return $result;
  	}
}

if ($okpost == 1) {
	//MARCADO CON NUMERO DE LICENCIA
	$clientetxt = "NUEVO_CLIENTE2014";
	$htmls = array();
	//PRIMERO
	for($i = 1; $i < 12; $i++){
		$directory = "../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO/CLASES-PRIMERO/Clase" . $i . "/";
		$files = glob($directory . "*.html");
		foreach ($files as $text) {
			$stemp = file_get_contents($text);
			preg_match('/var cliente = "(.*?)"/', $stemp, $match);
			$rep = $match[1];
			$st2 = str_replace($rep, $clientetxt, $stemp);
			$st3 = <<<DON
$st2
DON;
			$myfile = fopen($text, "w") or die("Unable to open file!");
			$txt = $st3;
			fwrite($myfile, $txt);
			fclose($myfile);	
			$ar = basename($text);
			$htmls[] = $ar;
		}
	}
	//SEGUNDO
	for ($i = 1; $i < 12; $i++) {
		$directory = "../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO/CLASES-SEGUNDO/Clase" . $i . "/";
		$files = glob($directory . "*.html");
		foreach($files as $text) {
			$stemp = file_get_contents($text);
			preg_match('/var cliente = "(.*?)"/', $stemp, $match);
			$rep = $match[1];
			$st2 = str_replace($rep, $clientetxt, $stemp);
			$st3 = <<<DON
$st2
DON;
			$myfile = fopen($text, "w") or die("Unable to open file!");
			$txt = $st3;
			fwrite($myfile, $txt);
			fclose($myfile);
			$ar = basename($text);
			$htmls[] = $ar;
		}
	}
	//TERCERO
	for($i = 1; $i < 12; $i++) {
		$directory = "../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO/CLASES-TERCERO/Clase" . $i . "/";
		$files = glob($directory . "*.html");
		foreach ($files as $text) {
			$stemp = file_get_contents($text);
			preg_match('/var cliente = "(.*?)"/', $stemp, $match);
			$rep = $match[1];
			$st2 = str_replace($rep, $clientetxt, $stemp);
			$st3 = <<<DON
$st2
DON;
			$myfile = fopen($text, "w") or die("Unable to open file!");
			$txt = $st3;
			fwrite($myfile, $txt);
			fclose($myfile);	
			$ar = basename($text);
			$htmls[] = $ar;
		}
	}
	//CUARTO
	for ($i = 1; $i < 12; $i++) {
		$directory = "../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO/CLASES-CUARTO/Clase" . $i . "/";
		$files = glob($directory . "*.html");
		foreach ($files as $text) {
			$stemp = file_get_contents($text);
			preg_match('/var cliente = "(.*?)"/', $stemp, $match);
			$rep = $match[1];
			$st2 = str_replace($rep, $clientetxt, $stemp);
			$st3 = <<<DON
$st2
DON;
			$myfile = fopen($text, "w") or die("Unable to open file!");
			$txt = $st3;
			fwrite($myfile, $txt);
			fclose($myfile);
			$ar = basename($text);
			$htmls[] = $ar;
		}
	}
	//PRODUCTOS ZIPPING
	//CURSOS FULL
	$linksdescarga = "";
	$zip_link = "";
	if ($curso == 1) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO/';
		$zip_link = 'AMagica_1robasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1robasico_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico</a> ';
		$progreso = "Primero Basico Zip ok: \n\r";
		echo $progreso;
		myFlush($progreso); 
		sleep(1); 
	}
	if ($curso == 2) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO/';
		$zip_link = 'AMagica_2dobasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2dobasico_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico</a> ';
	}
	if ($curso == 3) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO/';
		$zip_link = 'AMagica_3robasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3robasico_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico</a> ';
	}
	if ($curso == 4) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO/';
		$zip_link = 'AMagica_4tobasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4tobasico_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico</a> ';
	}
	//CURSOS MULTIMEDIA
	if ($curso == 111) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_M/';
		$zip_link = 'AMagica_1robasico_M_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1robasico_M_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico Multimedia</a> ';				   
	}
	if ($curso == 222) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_M/';
		$zip_link = 'AMagica_2dobasico_M_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2dobasico_M_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico  Multimedia</a> ';
	}
	if ($curso == 333) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_M_/';
		$zip_link = 'AMagica_3robasico_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3robasico_M_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico Multimedia</a> ';
	}
	if ($curso == 444) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_M/';
		$zip_link = 'AMagica_4tobasico_M_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4tobasico_M_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico  Multimedia</a> ';
	}
	//CURSOS INDIVIDUALES
	if ($curso == 11) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_IDENTIDAD/';
		$zip_link = 'AMagica_1ro_Identidad_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1ro_Identidad_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico  Multimedia Identidad</a> ';
	}
	if ($curso == 12) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_AUTOESTIMA/';
		$zip_link = 'AMagica_1ro_Autoestima_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1ro_Autoestima_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico  Multimedia Autoestima</a> ';
	}
	if ($curso == 13) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_AUTOCUIDADO/';
		$zip_link = 'AMagica_1ro_Autocuidado_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1ro_Autocuidado_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico  Multimedia Autocuidado</a> ';
	}
	if ($curso == 14) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_VALORES/';
		$zip_link = 'AMagica_1ro_Valores_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1ro_Valores_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico  Multimedia Valores</a> ';
	}
	if ($curso == 15) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_PRIMERO_BASICO_CONFLICTOS/';
		$zip_link = 'AMagica_1ro_Conflictos_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_1ro_Conflictos_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Primero Basico  Multimedia Manejo de conflictos</a> ';
	}
	if ($curso == 21) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_IDENTIDAD/';
		$zip_link = 'AMagica_2do_Identidad_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2do_Identidad_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico  Multimedia Identidad</a> ';
	}
	if ($curso == 22) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_AUTOESTIMA/';
		$zip_link = 'AMagica_2do_Autoestima_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2do_Autoestima_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico  Multimedia Autoestima</a> ';
	}
	if ($curso == 23) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_AUTOCUIDADO/';
		$zip_link = 'AMagica_2do_Autocuidado_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2do_Autocuidado_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico  Multimedia Autocuidado</a> ';
	}
	if ($curso == 24) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_VALORES/';
		$zip_link = 'AMagica_2do_Valores_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2do_Valores_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico  Multimedia Valores</a> ';
	}
	if ($curso == 25) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_SEGUNDO_BASICO_CONFLICTOS/';
		$zip_link = 'AMagica_2do_Conflictos_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_2do_Conflictos_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Segundo Basico  Multimedia Manejo de conflictos</a> ';
	}
	if ($curso == 31) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_IDENTIDAD/';
		$zip_link = 'AMagica_3ro_Identidad_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3ro_Identidad_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico  Multimedia Identidad</a> ';
	}
	if ($curso == 32) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_AUTOESTIMA/';
		$zip_link = 'AMagica_3ro_Autoestima_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3ro_Autoestima_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico  Multimedia Autoestima</a> ';
	}
	if ($curso == 33) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_AUTOCUIDADO/';
		$zip_link = 'AMagica_3ro_Autocuidado_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3ro_Autocuidado_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico  Multimedia Autocuidado</a> ';
	}
	if ($curso == 34) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_VALORES/';
		$zip_link = 'AMagica_3ro_Valores_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3ro_Valores_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico  Multimedia Valores</a> ';
	}
	if ($curso == 35) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_TERCERO_BASICO_CONFLICTOS/';
		$zip_link = 'AMagica_3ro_Conflictos_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_3ro_Conflictos_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Tercero Basico  Multimedia Manejo de conflictos</a> ';
	}
	if ($curso == 41) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_IDENTIDAD/';
		$zip_link = 'AMagica_4to_Identidad_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4to_Identidad_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico  Multimedia Identidad</a> ';
	}
	if ($curso == 42) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_AUTOESTIMA/';
		$zip_link = 'AMagica_4to_Autoestima_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4to_Autoestima_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico  Multimedia Autoestima</a> ';
	}
	if ($curso == 43) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_AUTOCUIDADO/';
		$zip_link = 'AMagica_4to_Autocuidado_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4to_Autocuidado_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico  Multimedia Autocuidado</a> ';
	}
	if ($curso == 44) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_VALORES/';
		$zip_link = 'AMagica_4to_Valores_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4to_Valores_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico  Multimedia Valores</a> ';
	}
	if ($curso == 45) {
		set_time_limit(1000);
		$source_dir = '../../../BASEPROGRAMA/ALFOMBRA_MAGICA_CUARTO_BASICO_CONFLICTOS/';
		$zip_link = 'AMagica_4to_Conflictos_' . $cliente . ".zip";
		$zip_file = '../../../DESCARGASUSUARIO/AMagica_4to_Conflictos_' . $cliente . ".zip";
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
		$linksdescarga .= ' <a href="http://www.descargamagica.cl/acciones/gestor.php?archivo=' . $zip_link . '" >Alfombra Magica Cuarto Basico  Multimedia Manejo de conflictos</a> ';
	}
	$cliente = new Cliente;
	$link = "http://www.descargamagica.cl/acciones/gestor.php?archivo=" . $zip_link;
	$cliente->actualiza_ruta_descarga($link, $solic);
}
?>