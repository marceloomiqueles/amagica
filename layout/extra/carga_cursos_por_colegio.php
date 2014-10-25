<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$res = $cliente->listar_cursos_por_colegio($_POST["id"]);
while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
	$letra = "A";
?>
<option value='<?php echo $row["id"] ?>'><?php echo $letra++; ?></option>
<?php
}
?>