<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$id = 0;
$curso_id = 0;
$mail = "";
$n_eval = 0;
$tipo_eval = 0;
if ($consulta = $cliente->consulta_evaluacion_por_usuario_id(1, $_SESSION["id"])) {
	$n_eval = $consulta->num_rows;
	$row = $consulta->fetch_array(MYSQLI_ASSOC);
	$ahora = $row["ahora"];
	$tiempo_final = $row["tiempo_final"];
	if ($n_eval < 1) {
		if ($n_eval == 0) {
			$tipo_eval = 1;
		} else {
			$tipo_eval = 2;
		}
		if ($ahora >= $tiempo_final) {
			$n_eval++;
			$evaluacion = 0;
			$curso_id = 0;
			if ($consulta = $cliente->cantidad_preguntas_evaluacion_por_usuario_id(1 ,$_SESSION["id"])) {
				if ($consulta->num_rows > 0) {
					$row = $consulta->fetch_array(MYSQLI_ASSOC);
					$evaluacion = $row["id"];
					$curso_id = $row["curso_id"];
				}
			}
			$cliente->cerrar_conn();
			$qry = $cliente->id_ultima_licencia_por_usuario_id($_SESSION["id"]);
			$row = $qry->fetch_array(MYSQLI_ASSOC);
			$id_lic = $row["id"];
			$datos = array(1, 7, $curso_id, $evaluacion, 1, $tipo_eval, $id_lic);
			if (!$id_insert = $cliente->crear_encabezado_evaluacion_prueba($datos)) {
				header("Location: " . $dir_base);
			}
		}
	} else {
		?>
		<script type="text/javascript">
			alert("Evaluación Realizada");
		</script>
		<?php
		header("Location: " . $dir_base);
	}
}

if ($consulta = $cliente->consulta_correo_usuario_id($_SESSION["id"])) {
	$row = $consulta->fetch_array(MYSQLI_ASSOC);
	$mail = $row["mail"];
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
						Evaluacion Inicial - Estudiante
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
							<label for='desc-box' class='col-sm-2 control-label'>&nbsp;</label>
							<div class='col-sm-10'>
								<p class='form-control-static'>
									Felicitaciones usted ha activado la evaluación para su curso, tiene duración de 7 días después del cual se desactivará para que pueda activar la evaluación final.
									<br/>
									<br/>
									Entregue la dirección URL, usuario, contraseña a sus estudiantes para comenzar la evaluación.
								</p>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<a class='btn btn-info' href='<?php echo $dir_base; ?>'>Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>