<?php
// Produccion
// $mysqli = new mysqli("localhost", "amagica_cliente", "q1w2e3r4t5", "amagica");
// $con = mysql_connect('localhost', 'amagica_cliente', 'q1w2e3r4t5');
// mysql_select_db('amagica_clientes', $con);
//*********************************************
// Desarrollo
$mysqli = new mysqli("localhost", "root", "", "amagica");
// $con = mysql_connect('localhost', 'root', '');
// mysql_select_db('amagica', $con);
//*********************************************
mysqli_set_charset($mysqli, 'utf8');
?>