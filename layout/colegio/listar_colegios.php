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
		<div class="container-fluid">
			<div class="row">
				<?php include("../menu.php"); ?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="sub-header">
						Lista Usuarios <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) echo "(Clave cambiada exitosamente!)"; ?>
					</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Comuna</th>
									<th>Niveles x curso</th>
									<th class="text-center">Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res = $cliente->listar_colegios_comuna();
								$i=1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["nombre"]; ?></td>
									<td><?php echo $row["comuna"]; ?></td>
									<td><?php echo $row["n_cursos"]; ?></td>
									<td class="text-center">
										<div class="btn-group btn-group-xs">
											<a class="btn btn-success" title="Detalle" href="ver_colegio.php?clg=<?php echo $row["id"]; ?>">
												<i class="glyphicon glyphicon-eye-open"></i>
											</a>
											<a class="btn btn-mini btn-info" title="Editar" href="mod_colegio.php?clg=<?php echo $row["id"]; ?>">
												<i class="glyphicon glyphicon-edit"></i>
											</a>
											<?php
											if ($row["estado"] == 0) {
											?>
											<a class="btn btn-mini btn-success" title="Activar" href="deact_colegio.php?clg=<?php echo $row["id"]; ?>">
												<i class="glyphicon glyphicon-play"></i>
											</a>
											<?php
											} elseif ($row["estado"] == 1) {
											?>
											<a class="btn btn-mini btn-danger" title="Desactivar" href="deact_colegio.php?clg=<?php echo $row["id"] ?>">
												<i class="glyphicon glyphicon-stop"></i>
											</a>
											<?php
											}
											?>
											<a class="btn btn-mini btn-danger" title="Eliminar" data-confirm="Seguro que quieres eliminar este Usuario?" href="elimina_colegio.php?clg=<?php echo $row["id"] ?>">
												<i class="glyphicon glyphicon-trash	"></i>
											</a>
									</div>
									</td>
								</tr>
								<?php
									$i++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>