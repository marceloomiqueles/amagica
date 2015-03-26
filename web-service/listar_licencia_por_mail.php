<?php
require("../include/cliente.class.php");

$cliente = new Cliente;
$res = $cliente->listar_cursos_colegio_por_correo($_POST["mail"]);
if ($res->num_rows) {
	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {	
		echo "|" . $row["mail"] . "#" . $row["colegio"] . "#" . $row["licencia"] . "#" . $row["nivel"] . "#" . $row["curso"];
	}
} else {
	echo "0";
}
?>