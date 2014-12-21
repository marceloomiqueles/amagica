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
		        $("#json-table").tablesorter( {sortList: [[0,0]], headers: {5: {sorter: false}}} );
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
						Lista Administrador Colegio <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) {echo "(Clave cambiada exitosamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Usuario eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Usuario creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th>Nivel</th>
									<th>Idioma</th>
									<th>Tipo</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res = $cliente->listar_evaluaciones_activas();
								$i = 1;
								$tipo = "";
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
									if ($row["tipo"] == 1)
										$tipo = "Alumno";
									else
										$tipo = "Profesor";
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["descr"]; ?></td>
									<td><?php echo $row["nivel"]; ?></td>
									<td><?php echo $row["idioma"]; ?></td>
									<td><?php echo $tipo; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Detalle' href='ver_evaluacion.php?eval=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-eye-open'></i>
											</a>
											<a class='btn btn-mini btn-info' title='Editar' href='mod_evaluacion.php?eval=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<a class='btn btn-mini btn-danger' title='Eliminar' data-confirm='Seguro que quieres eliminar este Usuario?' href='elimina_evaluacion.php?eval=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-trash	'></i>
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