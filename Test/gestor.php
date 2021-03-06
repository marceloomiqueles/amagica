<?php
include_once("../include/header-cache.php");
require("../include/cliente.class.php");

if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../include/login_session.php");

ini_set('memory_limit', '2048M');

$okpost = 0;
if (isset($_GET['archivo']) && isset($_GET["solic"])) {
    $archivo = $_GET['archivo'];
    $solic = $_GET["solic"];
    $okpost = 1;	
}

// include_once('basecfg.php');

if ($okpost == 1) {
    $cliente = new Cliente();

    $cliente->cera_random_token_por_solicitud($solic);

    $filename = '../../../DESCARGASUSUARIO/' . $archivo;
    $filename = realpath($filename);
    $file_extension = strtolower(substr(strrchr($filename,"."), 1));
    switch ($file_extension) {
        case "pdf": $ctype = "application/pdf"; break;
        case "exe": $ctype = "application/octet-stream"; break;
        case "zip": $ctype = "application/zip"; break;
        case "doc": $ctype = "application/msword"; break;
        case "xls": $ctype = "application/vnd.ms-excel"; break;
        case "ppt": $ctype = "application/vnd.ms-powerpoint"; break;
        case "gif": $ctype = "image/gif"; break;
        case "png": $ctype = "image/png"; break;
        case "jpe": case "jpeg": case "jpg": $ctype = "image/jpg"; break;
        default: $ctype = "application/force-download";
    }
    if (!file_exists($filename)) {
        die("NO FILE HERE");
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . @filesize($filename));
    set_time_limit(0);
    @readfile("$filename") or die("File not found.");
} else {
    echo "Variables no halladas";
}
?>