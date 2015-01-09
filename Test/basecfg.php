<?php
include_once("../include/header-cache.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../include/login_session.php");
// Database variables
$dbhost = "localhost";
$dbpass = "Alf_2014";
$dbuser = "amagica_center";
$dbname = "amagica_admin";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) { 
  $okinstall .= "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  $okmysql = 0;
}else{
  $okmysql = 1;
  $okinstall .= "Mysql connect Ok.";
}
//echo $okmysql;
?>