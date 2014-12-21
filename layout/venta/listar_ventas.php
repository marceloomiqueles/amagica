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
						Lista Ventas <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) echo "(Colegio eliminado exitosamente!)"; ?>
					</h2>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Vendedor</th>
									<th>Producto</th>
									<th>Colegio</th>
									<th>Fecha</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($_SESSION["tipo"] == 1)
									$res = $cliente->listar_ventas();
								else
									$res = $cliente->listar_ventas_por_vendedor($_SESSION["id"]);
								$i=1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["vendedor"]; ?></td>
									<td><?php echo $row["producto"]; ?></td>
									<td><?php echo $row["colegio"]; ?></td>
									<td><?php echo $row["fecha_venta"]; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Detalle' href='ver_venta.php?vnt=<?php echo $row["id"]; ?>'>
												<i class='glyphicon glyphicon-eye-open'></i>
											</a>
											<?php
												if ($_SESSION["tipo"] == 1) {
											?>
											<a class='btn btn-mini btn-danger' title='Eliminar' data-confirm='Seguro que quieres eliminar este Usuario?' href='eliminar_venta.php?vnt=<?php echo $row["id"] ?>'>
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