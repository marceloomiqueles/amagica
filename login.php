<?php
include_once("include/header-cache.php");
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("layout/head.php"); ?>
		<link rel="stylesheet" type="text/css" href="css/signin.css">
	</head>
	<body>
		<div class="container">
			<form class="form-signin" role="form" action="include/login_session.php" method="post">
				<h2 class="form-signin-heading">
					Por favor inicie sesión
				</h2>
				<input name="mail" class="form-control" type="email" autofocus="" required="" placeholder="Correo electrónico"></input>
				<input name="pass" class="form-control" type="password" required="" placeholder="Password"></input>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
			</form>
		</div>
	</body>
</html>