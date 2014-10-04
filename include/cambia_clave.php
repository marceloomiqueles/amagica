<?php
require("header-cache.php");
if (isset($_POST["pass"]) && isset($_POST["pass2"])) {
	if ($_POST["pass"] == $_POST["pass2"]) {
		require("cliente.class.php");
		$cliente = new Cliente;
		$datos = array($_POST["pass"]);
		if ($consulta = $cliente->reinicia_pass_usuario($datos, 1)) {
			header ("Location: ../");
		}
	}
	session_destroy();
	header ("Location: cambia_clave.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../layout/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<form class="form-signin" role="form" action="cambia_clave.php" method="post">
				<h2 class="form-signin-heading">
					Elija una clave nueva
				</h2>
				<input name="pass" class="form-control" type="password" autofocus="" required="" placeholder="Clave Nueva"></input>
				<input name="pass2" class="form-control" type="password" required="" placeholder="Repita Clave"></input>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
			</form>
		</div>
	</body>
</html>