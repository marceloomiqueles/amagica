<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");
$cliente = new Cliente;
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
    	<script type="text/javascript">
    		$(document).ready(function() { 
		        $("#json-table").tablesorter( {sortList: [[0,0]], headers: {8: {sorter: false}}} );
			});
    	</script>
	</head>
	<body>
		<?php include_once("../top-menu.php"); ?>
		<div class='container-fluid'>
			<div class='row'>
				<?php include("../menu.php"); ?>
				<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
					<h2 class='sub-header'>
						Resultado Evaluaciones <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) {echo "(Clave cambiada exitosamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Usuario eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Usuario creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th>Colegio</th>
									<th>Nivel</th>
									<th>Curso</th>
									<th>Idioma</th>
									<th>Fecha</th>
									<th>Tipo</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$tipo = "";
								$eval = "";
								if ($_SESSION["tipo"] == 1) {
									$res = $cliente->consulta_evaluaciones();
								}
								if ($_SESSION["tipo"] == 3) {
									$res = $cliente->consulta_evaluaciones_colegio($_SESSION["id"]);
								}
								if ($_SESSION["tipo"] == 4) {
									$res = $cliente->consulta_evaluaciones_colegio_curso($_SESSION["id"]);
								}
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
									$curso = "A";
									for($b = 0; $b < ($row["curso"] - 1); $b++) {
										$curso++;
									}
									if ($row["tipo"] == 1)
										$tipo = "Estudiante";
									else
										$tipo = "Docente";

									if ($row["eval_numero"] == 1)
										$eval = "INICIAL";
									else
										$eval = "FINAL";
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo "{$row["descr"]} {$eval}"; ?></td>
									<td><?php echo $row["colegio"]; ?></td>
									<td><?php echo $row["nivel"]; ?></td>
									<td><?php echo $curso; ?></td>
									<td><?php echo $row["idioma"]; ?></td>
									<td><?php echo $row["fecha"]; ?></td>
									<td><?php echo $tipo; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Resultado por eje' href='evaluacion_resultado_curso_eje.php?eval=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-th-list'></i>
											</a>
											<a class='btn btn-mini btn-info' title='Resultado por afirmación' href='evaluacion_resultado_curso.php?eval=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-list-alt'></i>
											</a>
										</div>
									</td>
								</tr>
								<?php
									$i++;
								}
								$cliente->cerrar_conn();
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>