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
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Rol</th>
									<th>Colegio</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($_SESSION["tipo"] == 1) {
									$res = $cliente->listar_usuarios_por_tipo(3);
								} else {
									$res = $cliente->listar_usuarios_por_tipo_creado_por(3, $_SESSION["id"]);
								}
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["nombre"]; ?></td>
									<td><?php echo $row["descripcion"]; ?></td>
									<td><?php echo $row["nombre_colegio"]; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Detalle' href='ver_admin.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-eye-open'></i>
											</a>
											<?php if ($_SESSION["tipo"] == 1) { ?>
											<a class='btn btn-mini btn-info' title='Editar' href='mod_admin.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<?php
												if ($row["estado"] == 2) {
											?>
											<a class='btn btn-mini btn-success' title='Activar' href='deact_admin.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-play'></i>
											</a>
											<?php
												} elseif ($row["estado"] == 1) {
											?>
											<a class='btn btn-mini btn-danger' title='Desactivar' href='deact_admin.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-stop'></i>
											</a>
											<?php
												}
											?>
											<a class='btn btn-mini btn-warning' title='Reiniciar Clave' href='reset_admin.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-refresh'></i>
											</a>
											<a class='btn btn-mini btn-danger' title='Eliminar' data-confirm='Seguro que quieres eliminar este Usuario?' href='elimina_admin.php?usr=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-trash	'></i>
											</a>
											<?php } ?>
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