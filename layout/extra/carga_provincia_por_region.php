<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$res = $cliente->listar_provincias_por_region($_POST["id"]);
while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
?>
<option value='<?php echo $row["id"] ?>' ><?php echo $row["nombre"]; ?></option>
<?php
}
?>