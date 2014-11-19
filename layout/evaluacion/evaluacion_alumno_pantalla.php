<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
// if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
// 	header ("Location: ../../include/login_session.php");
// }
$cliente = new Cliente;
// if (isset($_GET["eval"])) {
// 	if ($consulta = $cliente->consulta_evaluacion_por_id($_GET["eval"])) {
// 		if ($consulta->num_rows > 0) {
// 			$row = $consulta->fetch_array(MYSQLI_ASSOC);
// 			$descr = $row["descr"];
// 			$curso = $row["nivel"];
// 			$idioma = $row["idioma"];
// 			if ($row["tipo"] == 1) {
// 				$tipo = "Alumno";
// 			} else {
// 				$tipo = "Profesor";
// 			}
// 			$cliente->cerrar_conn();
// 		}
// 	}
// }
// else {
// 	header("Location: listar_evaluaciones.php");
// }
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
	</head>
	<body>
		<div class='container'>
			<div class='starter-template'>
				<h1>Evaluación {3}-{A} Alumnos Colegio {Tanto}</h1>
				<p class='lead'>
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
				 			{1}/{10}
					  	</div>
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div id='caritaFeliz' class='col-xs-24 col-sm-12'>
						<a href="#">
							<div class="col-xs-12 col-sm-6 placeholder">
								<svg xmlns="http://www.w3.org/2000/svg" width="250" height="250"><circle cx="125" cy="125" r='125' fill="#39DBAC"/><text text-anchor="middle" x="123" y="121" style="fill:#1E292C;font-weight:bold;font-size:100px;font-family:Arial,Helvetica,sans-serif;dominant-baseline:central">:)</text></svg>
							</div>
						</a>
						<div class="col-xs-12 col-sm-6 placeholder">
							<a href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="250" height="250"><circle cx="125" cy="125" r='125' fill="#F00"/><text text-anchor="middle" x="123" y="121" style="fill:#1E292C;font-weight:bold;font-size:100px;font-family:Arial,Helvetica,sans-serif;dominant-baseline:central">:(</text></svg>
							</a>
						</div>
					</div>
				</p>
			</div>
		</div>
	</body>
</html>