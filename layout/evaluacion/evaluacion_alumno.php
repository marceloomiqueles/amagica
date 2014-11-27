<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$id = 0;
$curso_id = 0;
$mail = "";
$n_eval = 0;
// die();
if ($consulta = $cliente->consulta_evaluacion_por_usuario_id(1, $_SESSION["id"])) {
	$n_eval = $consulta->num_rows;
	$row = $consulta->fetch_array(MYSQLI_ASSOC);
	$ahora = $row["ahora"];
	$tiempo_final = $row["tiempo_final"];
	// die();
	if ($n_eval < 2) {
		// echo "{$ahora} <= {$tiempo_final}";die();
		if ($ahora >= $tiempo_final) {
			$evaluacion = 0;
			$curso_id = 0;
			if ($consulta = $cliente->cantidad_preguntas_evaluacion_por_usuario_id(1 ,$_SESSION["id"])) {
				// echo $_SESSION["id"];
				if ($consulta->num_rows > 0) {
					// die();
					$row = $consulta->fetch_array(MYSQLI_ASSOC);
					$evaluacion = $row["id"];
					$curso_id = $row["curso_id"];
				}
			}
			$cliente->cerrar_conn();
			$datos = array(1, 7, $curso_id, $evaluacion, 1);
			// print_r($datos);die();
			if (!$id_insert = $cliente->crear_encabezado_evaluacion_prueba($datos)) {
				header("Location: " . $dir_base);
				// die();
			}
		}
	}
}

if ($consulta = $cliente->consulta_correo_usuario_id($_SESSION["id"])) {
	$row = $consulta->fetch_array(MYSQLI_ASSOC);
	$mail = $row["mail"];
}

if ($n_eval == 0){
	$n_eval = 1;
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
						Evaluacion <?php echo $n_eval; ?> - Alumno
					</h2>
					<form class='form-horizontal' role='form' action='evaluacion_profesor.php' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Dirección</label>
							<div class='col-sm-10'>
								<p class='form-control-static'>
									<a href='http://www.descargamagica.cl/CLIENTES/' target='_blank'>
										http://www.descargamagica.cl/CLIENTES/
									</a>
								</p>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Usuario</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $mail; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label for='desc-box' class='col-sm-2 control-label'>Contraseña</label>
							<div class='col-sm-10'>
								<p class='form-control-static'>1234</p>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class='btn btn-info' href='<?php echo $dir_base; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>