<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

if (isset($_GET["clg"])) {
	if ($consulta = $cliente->consulta_colegio_id($_GET["clg"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$nombre = $row["nombre"];
			$region = $row["region"];
			$provincia = $row["provincia"];
			$comuna = $row["comuna"];
			$calle = $row["calle"];
			$numero = $row["numero"];
			$fono = substr($row["fono"], 0, 3) . " " . substr($row["fono"], 3, 1) . " " . substr($row["fono"], 4, 4) . " " . substr($row["fono"], 8, 4);
			$cursos = "A";
			$letra = $cursos;
			for($i = 0; $i < ($row["n_cursos"] - 1); $i++) {
				$letra++;
			}
			if ($row["n_cursos"] > 1) {
				$cursos = $cursos . " - " . $letra;
			}
		}
	}
}
else {
	header("Location: listar_colegios.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
	</head>
	<body>
		<?php include_once("../top-menu.php"); ?>
		<div class="container-fluid">
			<div class="row">
				<?php include("../menu.php"); ?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="sub-header">
						Detalle Colegio
					</h2>
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $nombre; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Región</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $region; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Provincia</label>
							<div class="col-sm-10">	
								<p class="form-control-static"><?php echo $provincia; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Comuna</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $comuna; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Calle</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $calle; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Número</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $numero; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $fono; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Cursos</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $cursos; ?></p>
							</div>
						</div>
						<?php
						$cont = 0;
						$consulta = $cliente->consulta_notas_colegio_activas_por_colegio($_GET["clg"]);
						while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
						?>
						<div class='form-group'>
							<label class='col-sm-2 control-label'>Nota <?php echo ++$cont; ?></label>
							<div class='col-sm-10'>
								<div class='row'>
									<div class="col-md-10">
										<p class='form-control-static'><?php echo $row["descr"]; ?></p>
									</div>
									<div class="col-md-2">
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-mini btn-info' title='Editar' href='mod_nota.php?nt=<?php echo $row["id"] ?>&clg=<?php echo $_GET["clg"] ?>'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<a class='btn btn-mini btn-danger' title='Eliminar' data-confirm='Seguro que quieres eliminar este Usuario?' href='elimina_nota.php?nt=<?php echo $row["id"] ?>&clg=<?php echo $_GET["clg"] ?>'>
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
							<label class='col-sm-2 control-label'>Agregar Nota</label>
							<div class='col-sm-10'>
								<a class='btn btn-success' href='agregar_nota.php?clg=<?php echo $_GET["clg"] ?>'>
									<span class='glyphicon glyphicon-plus'></span>
								</a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<?php if ($_SESSION["tipo"] == 1) { ?>
								<a class="btn btn-default" href="mod_colegio.php?clg=<?php echo $_GET["clg"] ?>">Modificar</a>
								<?php } ?>
								<a class="btn btn-info" href="listar_colegios.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>