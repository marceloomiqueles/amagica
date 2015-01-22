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
		        $("#json-table").tablesorter( {sortList: [[0,0]], headers: {2: {sorter: false}, 6: {sorter: false}}} );
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
						Lista Docentes <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) {echo "(Clave cambiada exitosamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Usuario eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Usuario creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Rol</th>
									<th>Colegio</th>
									<th class='text-center'>Nivel</th>
									<th class='text-center'>Curso</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($_SESSION["tipo"] == 1) {
									$res = $cliente->listar_usuarios_por_tipo(4);
								} 
								if ($_SESSION["tipo"] == 3) {
									$res = $cliente->listar_usuarios_por_tipo_creado_por(4, $_SESSION["id"]); 
								}
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
									$curso = "A";
									for($i = 0; $i < ($row["curso"] - 1); $i++) {
										$curso++;
									}
								?>
								<tr>
									<td><?php echo ++$i; ?></td>
									<td><?php echo $row["nombre"]; ?></td>
									<td><?php echo $row["descripcion"]; ?></td>
									<td><?php echo $row["nombre_colegio"]; ?></td>
									<td class='text-center'><?php echo $row["nivel"]; ?></td>
									<td class='text-center'><?php echo $curso; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Detalle' href='ver_profesor.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-eye-open'></i>
											</a>
											<?php if ($_SESSION["tipo"] == 1) { ?>
											<a class='btn btn-mini btn-info' title='Editar' href='mod_profesor.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<?php
												if ($row["estado"] == 2) {
											?>
											<a class='btn btn-mini btn-success' title='Activar' href='deact_profesor.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-play'></i>
											</a>
											<?php
												} elseif ($row["estado"] == 1) {
											?>
											<a class='btn btn-mini btn-danger' title='Desactivar' href='deact_profesor.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-stop'></i>
											</a>
											<?php
												}
											}
											if ($_SESSION["tipo"] == 3 || $_SESSION["tipo"] == 1) {
											?>
											<a class='btn btn-mini btn-warning' title='Reiniciar Clave' href='reset_profesor.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-refresh'></i>
											</a>
											<?php
												}
												if ($_SESSION["tipo"] == 1) {
											?>
											<a class='btn btn-mini btn-danger' title='Eliminar' data-confirm='Seguro que quieres eliminar este Usuario?' href='elimina_profesor.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-trash	'></i>
											</a>
											<?php } ?>
										</div>
									</td>
								</tr>
								<?php
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