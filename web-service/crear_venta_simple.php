<?php
// include_once("../include/header-cache.php");
require("../include/cliente.class.php");
// if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$producto = "";
$colegio = 0;
$id_cred = 2;
$cantidad = 1;

if (isset($_POST["producto"]))
	$producto = trim($_POST["producto"]);
if (isset($_POST["colegio"]))
	$colegio = trim($_POST["colegio"]);

if (strlen($producto) > 0 && strlen($colegio) > 0) {
	$ok = 0;
	if ($consulta = $cliente->consulta_valor_producto($producto)) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$valor = $row["valor"];
		if ($consulta = $cliente->consulta_colegio_producto_tipo($colegio, $producto, 1)) {
			if ($consulta->num_rows < 1) {
				$consulta = $cliente->consulta_colegio_simple($colegio);
				$row = $consulta->fetch_array(MYSQLI_ASSOC);
				$n_cursos = $row["n_cursos"];
				$datos = array($producto, $colegio, $id_cred);
				if ($id_insert = $cliente->crear_venta($datos)) {
					$cliente->cerrar_conn();
					$consulta = $cliente->consulta_producto_simple($producto);
					$row = $consulta->fetch_array(MYSQLI_ASSOC);
					$duracion = $row["duracion"];
					$nivel = $row["curso"];
					$idioma = $row["idioma_id"];
					for ($i = 1; $i <= $n_cursos; $i++) {
						$datos = array($producto, $duracion, 1, $nivel, $i, $idioma, $colegio);
						if ($id_licencia = $cliente->crear_licencia($datos)) {
							$cliente->cerrar_conn();
							$cliente->actualiza_n_solicitud_licencia(md5($id_licencia), $id_licencia);
							$cliente->cerrar_conn();
							if ($id_licencia_venta = $cliente->crear_venta_licencia($id_insert, $id_licencia)) {
								$cliente->cerrar_conn();
								echo "*" . md5($id_licencia) . "*";
							}
						} else {
							echo "Ha ocurrido un error";
						}
					}
				}
			} else {
				echo "¡Producto ya vendido!";
			}
		}
	}
} else {
	echo "¡Faltan Datos!";
}
?>