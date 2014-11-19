<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: ../../include/login_session.php");
}
$cliente = new Cliente;
if (isset($_GET["eval"])) {
	if ($consulta = $cliente->consulta_evaluacion_por_id($_GET["eval"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$descr = $row["descr"];
			$curso = $row["nivel"];
			$idioma = $row["idioma"];
			if ($row["tipo"] == 1) {
				$tipo = "Alumno";
			} else {
				$tipo = "Profesor";
			}
			$cliente->cerrar_conn();
		}
	}
}
else {
	header("Location: listar_evaluaciones.php");
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
						Detalle Evaluacion <?php echo $tipo; ?>
					</h2>
					<form class='form-horizontal' role='form'>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Descripción</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $descr; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Nivel</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $curso; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Idioma</label>
							<div class='col-sm-10'>	
								<p class='form-control-static'><?php echo $idioma; ?></p>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Tipo</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo $tipo; ?></p>
							</div>
						</div>
						<?php
						$cont = 0;
						$consulta = $cliente->lista_preguntas_evaluacion_id($_GET["eval"]);
						while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
						?>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Pregunta <?php echo ++$cont; ?></label>
							<div class='col-sm-10'>
								<div class='row'>
									<div class="col-md-10">
										<p class='form-control-static'><?php echo $row["pregunta"]; ?></p>
									</div>
									<div class="col-md-2">
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-mini btn-info' title='Editar' href='mod_pregunta.php?prg=<?php echo $row["id"] ?>&eval=<?php echo $_GET["eval"] ?>'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<a class='btn btn-mini btn-danger' title='Eliminar' data-confirm='Seguro que quieres eliminar este Usuario?' href='elimina_pregunta.php?prg=<?php echo $row["id"] ?>&eval=<?php echo $_GET["eval"] ?>'>
												<i class='glyphicon glyphicon-trash	'></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Agregar</label>
							<div class='col-sm-10'>
								<a class='btn btn-success' href='agregar_pregunta.php?eval=<?php echo $_GET["eval"] ?>'>
									<span class='glyphicon glyphicon-plus'></span>
								</a>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<?php if ($_SESSION["tipo"] == 1) { ?>
								<a class='btn btn-default' href='mod_evaluacion.php?eval=<?php echo $_GET["eval"] ?>'>Modificar</a>
								<?php } ?>
								<a class="btn btn-info" href="listar_evaluaciones.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>