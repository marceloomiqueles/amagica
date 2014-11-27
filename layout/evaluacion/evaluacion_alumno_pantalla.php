<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

// echo $_SESSION["test_id"]; die();

if(empty($_SESSION["test_id"]) || $_SESSION["test_id"] == "" || empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$cursor = 1;
if (isset($_GET["cursor"]))
	$cursor = $_GET["cursor"]

$consulta = $cliente->consulta_encabezado_evaluacion_alumno($_SESSION["id"]);
$row = $consulta->fetch_array(MYSQLI_ASSOC);
$nombre = $row["nombre"];
$nivel = $row["nivel"];
$curso = "A";

for($i = 0; $i < ($row["curso"] - 1); $i++) {
	$curso++;
}

$cliente->cerrar_conn();
$consulta = $cliente->consulta_preguntas_por_evaluacion_id($_SESSION["id"]);
$cant = $consulta->num_rows;

$

while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
	
}

// echo $_SESSION["test_id"] . " - " . $_SESSION["id"];
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
	</head>
	<body>
		<div class='container'>
			<div class='starter-template'>
				<h1>Evaluación Alumnos </b> Colegio <b><?php echo $nombre?> <?php echo $nivel?></b>-<b><?php echo $curso?></h1>
				<p class='lead'>
					<div class="progress">
					  	<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
				 			{1}/<?php echo $cant?>
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