<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$colegio;
$nivel;
$curso;

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
						Lista Descargas <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) {echo "(Clave cambiada exitosamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Usuario eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Usuario creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table class='table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th>Colegio</th>
									<th>Nivel</th>
									<th>Curso</th>
									<th>Idioma</th>
									<th class='text-center'>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($_SESSION["tipo"] == 1)
									$res = $cliente->consulta_descargas();
								elseif ($_SESSION["tipo"] == 3)
									$res = $cliente->consulta_descargas_colegio($_SESSION["id"]);
								elseif ($_SESSION["tipo"] == 4)
									$res = $cliente->consulta_descargas_colegio_curso($_SESSION["id"]);
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
									$curso = "A";
									for($b = 0; $b < ($row["curso"] - 1); $b++) {
										$curso++;
									}
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["producto"]; ?></td>
									<td><?php echo $row["colegio"]; ?></td>
									<td><?php echo $row["nivel"]; ?></td>
									<td><?php echo $curso; ?></td>
									<td><?php echo $row["idioma"]; ?></td>
									<td class='text-center'>
										<div class='btn-group btn-group-xs'>
											<a class='btn btn-mini btn-success' title='Descargar' data-confirm='Seguro que quieres eliminar este Usuario?' href='<?php echo $row["link_d"] . "&solic=" . $row["n_solicitud"]; ?>'>
												<i class='glyphicon glyphicon-download'></i>
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