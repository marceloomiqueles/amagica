<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");

// echo $_SESSION["test_id"]; die();

if(empty($_SESSION["test_id"]) || $_SESSION["test_id"] == "" || empty($_SESSION["id"]) || $_SESSION["id"] == "" || empty($_POST["lista"]) || $_POST["lista"] == "") header ("Location: ../../include/login_session.php");

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
    	<script type="text/javascript">
			var total = 0;
			var evalDatos;
			var dataJson;
			var ene = 1;
			var percent = 0.0;
			var evaluacion = <?php echo $_SESSION["test_id"]?>;

    		$(document).ready(function(){
    			document.onkeydown = function (e) {
			        return false;
				}

    			$.ajax({
			        type: "POST",
			        url:"evaluacion_datos.php",
			        data: {tipo: ene},
			        async: true,
			        success: function(datos){
			            dataJson = eval(datos);
			            setTotal($(dataJson).size());
			            setEvalDatos(dataJson);

		    			$('.progress-bar').css('width', ene*100/total + '%');
		    			$('.progress-bar').text(ene + '/' + total);
		    			if (evalDatos[ene-1].invertido == 1)
		    				$('h1').text(evalDatos[ene-1].pregunta + ' (Invertido)');	
		    			else
		    				$('h1').text(evalDatos[ene-1].pregunta);
			        },
			        error: function (obj, error, objError){
			            //avisar que ocurrió un error
			            alert("fallo");
			        }
				});

    			$('a.si').click(function(){
					// $("h3").text(ene + " - " + total);
    				if (total >= ene)
						cambiaValor(1);
					else
    					salir();
    			});

    			$('a.no').click(function(){
    				if (total > ene)
						cambiaValor(0);
    				else
    					salir();
    			});
    		});

			function cambiaValor(valor) {
    			if (total >= ene) {
					$.ajax({
				        type: "POST",
				        url:"evaluacion_guarda_datos.php",
				        data: {respuesta: valor, invertido: evalDatos[ene-1].invertido, preg: evalDatos[ene-1].id, eval: <?php echo $_SESSION["test_id"]?>, lista: <?php echo $_POST["lista"]?>},
				        async: false,
				        success: function(datos) {
				        	$("h2").text(datos);
				        },
				        error: function(obj, error, objError) {
				        	alert("falló");
				        }
					});
					if (total == ene)
						salir();
				}
				ene++;
				if (ene-1 < total) {
					$('.progress-bar').text(ene + '/' + total);
					$('.progress-bar').css('width', ene*100/total + '%');
	    			if (evalDatos[ene-1].invertido == 1)
	    				$('h1').text(evalDatos[ene-1].pregunta + ' (Invertido)');	
	    			else
	    				$('h1').text(evalDatos[ene-1].pregunta);
	    		}
			}

			function setTotal(valor) {
				total = valor;
			}

			function setEvalDatos(valor) {
				evalDatos = valor;
			}

			function salir() {
				alert('Felicitaciones Terminaste la Evaluación');
				window.location ='../../action/logout.php';
			}
		</script>
	</head>
	<body>
		Evaluación Alumno <b><?php echo $_POST["lista"]?></b> Colegio <b><?php echo $nombre?> <?php echo $nivel?></b>-<b><?php echo $curso?></b>
		<div class='container'>
			<h3>PREGUNTA: </h3><h1 style='height: 78px;'></h1>
			<div class='starter-template'>
				<div id='caritaFeliz' class='col-xs-24 col-sm-12'>
					<div class="col-xs-12 col-sm-6 placeholder">
						<a href="javascript: void(0)" class='si'>
							<img src="../../img/cara-verde.png">
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 placeholder">
						<a href="javascript: void(0)" class='no'>
							<img src="../../img/cara-roja.png">		
						</a>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<h2></h2>
			<h3></h3>
			<div class="progress" style='width:100%;'>
			  	<div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 4.7%;"></div>
			</div>
		</div>
	</body>
</html>