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
						Lista productos <?php if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Producto eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Producto creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Codigo</th>
									<th>Descripción</th>
									<th>Categoría</th>
									<th class='text-center'>Cant x Lic.</th>
									<th>Idioma</th>
									<th class='text-center'>Curso</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res = $cliente->listar_productos_eliminados();
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["codigo"]; ?></td>
									<td><?php echo $row["descr"]; ?></td>
									<td><?php echo $row["categoria"]; ?></td>
									<td class='text-center'><?php echo $row["n_licencia"]; ?></td>
									<td><?php echo $row["idioma"]; ?></td>
									<td class='text-center'><?php echo $row["curso"]; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Detalle' href='ver_producto.php?prd=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-eye-open'></i>
											</a>
											<a class='btn btn-mini btn-info' title='Editar' href='mod_producto.php?prd=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-edit'></i>
											</a>
											<?php
											if ($row["estado"] == 2) {
											?>
											<a class='btn btn-mini btn-success' title='Activar' href='deact_producto.php?prd=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-play'></i>
											</a>
											<?php
											} elseif ($row["estado"] == 1) {
											?>
											<a class='btn btn-mini btn-danger' title='Desactivar' href='deact_producto.php?prd=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-stop'></i>
											</a>
											<?php
											}
											?>
											<a class='btn btn-mini btn-warning' title='Eliminar' data-confirm='Seguro que quieres eliminar este producto?' href='elimina_producto.php?prd=<?php echo $row["id"] ?>'>
												<i class='glyphicon glyphicon-trash	'></i>
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