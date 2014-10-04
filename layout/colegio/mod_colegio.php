<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: ../../include/login_session.php");
}
$cliente = new Cliente;

$nombre = "";
$apellido = "";
$correo = "";
$sexo = 0;
$tipo = 0;
$fono = "";
$id_box = "";

if (isset($_POST["nombre-box"]))
	$nombre = $_POST["nombre-box"];
if (isset($_POST["apellido-box"]))
	$apellido = $_POST["apellido-box"];
if (isset($_POST["mail-box"]))
	$correo = $_POST["mail-box"];
if (isset($_POST["sexo-box"]))
	$sexo = $_POST["sexo-box"];
if (isset($_POST["tipo-box"]))
	$tipo = $_POST["tipo-box"];
if (isset($_POST["fono-box"]))
	$fono = $_POST["fono-box"];
if (isset($_GET["usr"]))
	$id_box = $_GET["usr"];
if (isset($_POST["id-box"]))
	$id_box = $_POST["id-box"];

// echo $id_box;die();

if (isset($_POST["nombre-box"]) && isset($_POST["apellido-box"]) && isset($_POST["mail-box"]) && isset($_POST["sexo-box"]) && isset($_POST["fono-box"])) {
	$cambios = array(
		trim($_POST["nombre-box"]), 
		trim($_POST["apellido-box"]), 
		trim($_POST["mail-box"]), 
		trim($_POST["sexo-box"]), 
		trim($_POST["tipo-box"]), 
		str_replace(" ", "", trim($_POST["fono-box"]))
		);
	if ($cliente->actualiza_usuario_id($cambios, $id_box)) {
		header("Location: ver_usuario.php");
	}
	else
		header("Location: mod_usuario.php?usr=" . $id_box);
}

if ($consulta = $cliente->consulta_usuario_id($id_box)) {
	if ($consulta->num_rows > 0) {
		$row = $consulta->fetch_array(MYSQLI_ASSOC);
		$nombre = $row["nombre"];
		$apellido = $row["apellido"];
		$mail = $row["mail"];
		$tipo = $row["tipo_id"];
		if($row["sexo"] == 1)
			$sexo = "Hombre";
		else
			$sexo = "Mujer";
		$fono = substr($row["telefono"], 0, 3) . " " . substr($row["telefono"], 3, 1) . " " . substr($row["telefono"], 4, 4) . " " . substr($row["telefono"], 8, 4);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8">
		<title>A-Magica</title>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
	</head>
	<body>
		<?php
		 include_once("../top-menu.php");
		?>
		<div class="container-fluid">
			<div class="row">
				<?php
				include("../menu.php");
				?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="sub-header">
						Perfil
					</h2>
					<form class="form-horizontal" role="form" action="mod_usuario.php" method="post">
						<div class="form-group">
							<label for="nombre-box" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" name="nombre-box" class="form-control" id="nombre-box" placeholder="Nombre" value="<?php echo $nombre; ?>">
								<input type="hidden" name="id-box" value="<?php echo $id_box; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="apellido-box" class="col-sm-2 control-label">Apellido</label>
							<div class="col-sm-10">
								<input type="text" name="apellido-box" class="form-control" id="apellido-box" placeholder="Apellido" value="<?php echo $apellido; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="mail-box" class="col-sm-2 control-label">Correo</label>
							<div class="col-sm-10">	
								<input type="mail" name="mail-box" class="form-control" id="mail-box" placeholder="Correo" value="<?php echo $mail; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="sexo-box" class="col-sm-2 control-label">Sexo</label>
							<div class="col-sm-10">
								<select name="sexo-box" class="form-control">
								  	<option value="1" <?php if ($tipo== 1) echo "selected" ?>>Hombre</option>
								  	<option value="2" <?php if ($_SESSION["sexo"] == 2) echo "selected" ?>>Mujer</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="tipo-box" class="col-sm-2 control-label">Sexo</label>
							<div class="col-sm-10">
								<select name="tipo-box" class="form-control">
									<?php
									$res = $cliente->listar_tipo_usuario();
									while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
									?>
								  	<option value='<?php echo $row["id"] ?>' <?php if ($tipo == $row["id"]) echo "selected"; echo ">" . $row["descripcion"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="fono-box" class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-10">
								<input type="text" name="fono-box" class="form-control" id="fono-box" placeholder="Teléfono" value="<?php echo $fono; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.js"></script>
	</body>
</html>