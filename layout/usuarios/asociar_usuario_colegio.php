<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "")	header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$nombre = "";
$apellido = "";
$colegio = 0;
$id_box = "";

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["apellido-box"]))
	$apellido = $_POST["apellido-box"];
if (isset($_POST["colegio-box"]))
	$colegio = $_POST["colegio-box"];
if (isset($_GET["usr"]))
	$id_box = $_GET["usr"];
if (isset($_POST["id-box"]))
	$id_box = $_POST["id-box"];

if (isset($_POST["colegio-box"]) && isset($_POST["id-box"])) {
	$cambios = array(trim($_POST["colegio-box"]), trim($_POST["apellido-box"]), trim($_POST["mail-box"]), trim($_POST["sexo-box"]), trim($_POST["tipo-box"]), str_replace(" ", "", trim($_POST["fono-box"])));
	if ($cliente->actualiza_colegio_usuario(trim($_POST["colegio-box"]), trim($_POST["id-box"])))
		header("Location: listar_usuarios.php");
	else
		header("Location: asociar_usuario_colegio.php?usr=" . $id_box);
}

if ($consulta = $cliente->consulta_usuario_id($_GET["usr"]))
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$apellido = $row["apellido"];
		$colegio = $row["colegio_id"];
		$cliente->cerrar_conn();
	}
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
						Perfil
					</h2>
					<form class='form-horizontal' role='form' action='asociar_usuario_colegio.php' method='post'>
						<div class='form-group'>
							<label for='nombre-box' class='col-sm-2 control-label'>Nombre</label>
							<div class='col-sm-10'>
								<p class='form-control-static'><?php echo "{$nombre} {$apellido}"; ?></p>
								<input type='hidden' name='id-box' value='<?php echo $id_box; ?>'>
							</div>
						</div>
						<div class='form-group'>
							<label for='tipo-box' class='col-sm-2 control-label'>Tipo Usuario</label>
							<div class='col-sm-10'>
								<select name='colegio-box' class='form-control'>
									<?php
									$res = $cliente->lista_simple_colegios();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($colegio == $row["id"]) echo "selected"; echo ">" . $row["nombre"]; ?></option>
									<?php
									}
									$cliente->cerrar_conn();
									?>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='col-sm-offset-2 col-sm-10'>
								<button type='submit' class='btn btn-default'>Guardar</button>
								<a class="btn btn-info" href="listar_usuarios.php">Atrás</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>