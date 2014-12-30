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
		        $("#json-table").tablesorter( {sortList: [[0,0]], headers: {0: {sorter: false}}} );
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
									<th>Producto</th>
									<th>Fecha</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res = $cliente->consulta_software_comprado_profesor($_SESSION["id"]);
								$i=1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["descr"]; ?></td>
									<td><?php echo $row["fecha_venta"]; ?></td>
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