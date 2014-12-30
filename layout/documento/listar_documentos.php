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
						Lista Documentos <?php if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Documento eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Documento creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th>Producto</th>
									<th>Categoría</th>
									<th>Idioma</th>
									<th class='text-center'>Curso</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($_SESSION["tipo"] == 1) 
									$res = $cliente->listar_documentos();	
								else
									$res = $cliente->listar_documentos_usuario($_SESSION["id"]);
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["descr"]; ?></td>
									<td><?php echo $row["producto"]; ?></td>
									<td><?php echo $row["categoria"]; ?></td>
									<td><?php echo $row["idioma"]; ?></td>
									<td class='text-center'><?php echo $row["curso"]; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-success' title='Detalle' href='<?php echo $row["ruta"] ?>' target='_blank'>
												<i class='glyphicon glyphicon-download'></i>
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