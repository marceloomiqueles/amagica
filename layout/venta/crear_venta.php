<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$producto = "";
$colegio = 0;
$id_cred = "";
$cantidad = 0;

if (isset($_POST["producto-box"]))
	$producto = trim($_POST["producto-box"]);
if (isset($_POST["colegio-box"]))
	$colegio = trim($_POST["colegio-box"]);
if (isset($_POST["id_cred"]))
	$id_cred = trim($_POST["id_cred"]);
if (isset($_POST["cantidad-box"]))
	$cantidad = trim($_POST["cantidad-box"]);

if ($producto > 0 && $colegio > 0 && $id_cred > 0 && $cantidad > 0) {
	$ok = 0;
	if ($consulta = $cliente->consulta_valor_producto($producto)) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$valor = $row["valor"];
		if ($cantidad >= $valor) {
			if ($cantidad > 0) {
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
										?>
						                <script type="text/javascript">
						                    loadDESCARGA('http://descargamagica.cl/CLIENTES/Test/descargaok.php', '<?php echo md5($id_licencia); ?>', '<?php echo $idioma; ?>', '<?php echo $curso; ?>');
						                    
						                    function loadDESCARGA(php_file, solicitud, lenguaje, curso) {
						                        alert("Estamos generando su descarga. Por favor espere y no cierre la ventana hasta que se le indique que el proceso ha finalizado. Gracias"); //O colcale un gif animado de preload
						                        var datastring= "solicitud="+solicitud+"&lenguaje="+lenguaje+"&curso="+curso;
						                        var urlfile = php_file + "?x=" + parseInt(Math.random() * 1000000);
						                        var request =  get_XmlHttpx();
						                        request.open("POST", urlfile , true);
						                        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						                        request.setRequestHeader("Content-length", datastring.length);
						                        request.send(datastring);
						                        request.onreadystatechange = function() {
						                            //alert(request.readyState);
						                            if (request.readyState == 4) { //respuesta ok
						                                //alert(request.responseText);
						                            }
						                        }
						                    }

						                    //Request multiplataforma
						                    function get_XmlHttpx() {
						                        var xmlHttp = null;
						                        try{
						                            // Opera 8.0+, Firefox, Safari
						                            xmlHttp = new XMLHttpRequest();
						                        } catch (e) {
						                            // Internet Explorer Browsers
						                            try{
						                                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
						                            } catch (e) {
						                                try{
						                                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
						                                } catch (e) {
						                                    // Something went wrong
						                                    alert("AJAX no soportado");
						                                    return false;
						                                }
						                            }
						                        }
						                        return xmlHttp;
						                    }
						                </script>
						                <?php										
										$ok = 1;
									} else {
										$ok = 0;
									}
								}
							}
							if ($ok) {
								$cliente->actualiza_credito_usuario($cantidad - $valor, $id_cred);
								$cliente->cerrar_conn();
								header("Location: ver_venta.php?vnt=" . $id_insert);
							}
						}
					}
				}
			}
		}
	}
}
if ($consulta = $cliente->consulta_usuario_id($_SESSION["id"])) {
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"] . " " . $row["apellido"];
		$id_cred = $row["credito_id"];
		$cantidad = $row["cantidad"];
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
	</head>
	<body>
		<?php include_once("../top-menu.php"); ?>
		<div class='container-fluid'>
			<div class='row'>
				<?php include("../menu.php"); ?>
				<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
					<h2 class='sub-header'>
						Venta Nueva
					</h2>
					<form class='form-horizontal' role='form' action='crear_venta.php' method='post'>
						<div class='form-group'>
							<label class="col-sm-2 control-label">Vendedor</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $nombre; ?></p>
								<input type='hidden' name='id_cred' value='<?php echo $id_cred; ?>'>
								<input type='hidden' name='cantidad-box' value='<?php echo $cantidad; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='colegio-box' class='col-sm-2 control-label'>Colegio</label>
							<div class='col-sm-10'>
								<select id='colegio-box' onchange='cargaProductos()' name='colegio-box' class='form-control'>
									<?php
									$res = $cliente->lista_simple_colegios();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' ><?php echo $row["nombre"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label for='producto-box' class='col-sm-2 control-label'>Producto</label>
							<div class='col-sm-10'>
								<select id='producto-box' name='producto-box' class='form-control'>
									<?php
									$res = $cliente->listar_productos();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' ><?php echo $row["descr"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Crear Venta</button>
								<a class="btn btn-info" href="listar_ventas.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>