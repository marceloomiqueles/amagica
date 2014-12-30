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
						Resultado Alumnos Colegio <?php echo ""; ?> <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) {echo "(Clave cambiada exitosamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Usuario eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Usuario creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Nº Lista</th>
									<th>Identidad</th>
									<th>Autoestima</th>
									<th>Valores</th>
									<th>Manejo de Conflictos</th>
									<th>Cooperación y Pertenencia</th>
									<th>Proteccion y Cuidado</th>
									<th>Manejo de Convivencia</th>
									<th>Fecha</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$tipo = "";
								$res = $cliente->consulta_alumnos_de_evaluacion($_GET["eval"]);
								$i = 1;
								while($row = $res->fetch_array(MYSQLI_ASSOC)) {
									$d1 = 0; $d2 = 0; $d3 = 0; $d4 = 0; $d5 = 0; $d6 = 0; $d7 = 0;
									$resp = $cliente->consulta_respuestas_alumnos_evaluacion($_GET["eval"], $row["n_alumno"]);
									$cont = 1;
									while ($rows = $resp->fetch_array(MYSQLI_ASSOC)) {
										switch ($cont) {
											case 1: $d1 += $rows["respuesta"]; break;
											case 2: $d1 += $rows["respuesta"]; break;
											case 3: $d1 += $rows["respuesta"]; break;
											case 4: $d2 += $rows["respuesta"]; break;
											case 5: $d2 += $rows["respuesta"]; break;
											case 6: $d2 += $rows["respuesta"]; break;
											case 7: $d3 += $rows["respuesta"]; break;
											case 8: $d3 += $rows["respuesta"]; break;
											case 9: $d3 += $rows["respuesta"]; break;
											case 10: $d4 += $rows["respuesta"]; break;
											case 11: $d4 += $rows["respuesta"]; break;
											case 12: $d4 += $rows["respuesta"]; break;
											case 13: $d5 += $rows["respuesta"]; break;
											case 14: $d5 += $rows["respuesta"]; break;
											case 15: $d5 += $rows["respuesta"]; break;
											case 16: $d6 += $rows["respuesta"]; break;
											case 17: $d6 += $rows["respuesta"]; break;
											case 18: $d6 += $rows["respuesta"]; break;
											case 19: $d7 += $rows["respuesta"]; break;
											case 20: $d7 += $rows["respuesta"]; break;
											case 21: $d7 += $rows["respuesta"]; break;
										}
										$cont++;
									}
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row["n_alumno"]; ?></td>
									<td><?php if ($d1 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php if ($d2 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php if ($d3 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php if ($d4 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php if ($d5 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php if ($d6 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php if ($d7 <= 1) echo "Preocupante"; else echo "Adecuado"; ?></td>
									<td><?php echo $row["fecha_evaluacion"]; ?></td>
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