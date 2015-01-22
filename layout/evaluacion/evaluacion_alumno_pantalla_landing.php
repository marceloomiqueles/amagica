<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

// echo $_SESSION["test_id"]; die();

if(empty($_SESSION["test_id"]) || $_SESSION["test_id"] == "" || empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$consulta = $cliente->consulta_encabezado_evaluacion_alumno($_SESSION["id"]);
$row = $consulta->fetch_array(MYSQLI_ASSOC);
$nombre = $row["nombre"];
$nivel = $row["nivel"];
$curso = "A";

for($i = 0; $i < ($row["curso"] - 1); $i++) {
	$curso++;
}

$cliente->cerrar_conn();
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
	</head>
	<body>
		<div class='container'>
			<div class='starter-template'>
				<h1>Evaluación Estudiantes </b> Colegio <b><?php echo $nombre?> <?php echo $nivel?></b>-<b><?php echo $curso?></h1>
				<br>
				<br>
				<p class='lead'>
					<br>
					<br>
					<br>
					<form class='form-horizontal' role='form' action='evaluacion_alumno_pantalla.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Número de Lista</label>
							<div class='col-sm-2'>
								<input type='text' name='lista' onkeypress='return justNumbers(event);' maxlength='2' class='form-control' id='lista' placeholder='Número Lista'>
							</div>
						</div>
						<div class='form-group'>
							<button type='submit' class='btn btn-default'>Comenzar</button>
							<a class="btn btn-info" href="../../action/logout.php">Salir</a>
						</div>
					</form>
				</p>
			</div>
		</div>
	</body>
</html>