<?php
require("header-cache.php");
if (isset($_POST["mail"]) && isset($_POST["pass"])) {
	require("cliente.class.php");
	$cliente = new Cliente;
	if ($consulta = $cliente->consulta_si_correo_existe($_POST["mail"])) {
		if ($consulta->num_rows > 0) {
			$row = $consulta->fetch_array(MYSQLI_ASSOC);
			$id = $row["id"];		
			if ($consulta = $cliente->consulta_usuario_login($_POST["mail"], md5($_POST["pass"]))) {
				if ($consulta->num_rows > 0) {
					$row = $consulta->fetch_array(MYSQLI_ASSOC);
					$_SESSION["id"] = $row["id"];
					$_SESSION["nombre"] = $row["nombre"] . " " . $row["apellido"];
					$_SESSION["sexo"] = $row["sexo"];
					$_SESSION["tipo"] = $row["tipo"];
					$_SESSION["colegio"] = $row["colegio_id"];
					// echo $_POST["pass"]; // die();
					if ($_POST["pass"] == "1234") {
						echo "<script>window.location ='cambia_clave.php';</script>";
						die();
					}
					header ("Location: ../");
				} else {
					if ($_POST["pass"] == "1234") {
						if ($consulta = $cliente->consulta_evaluacion_activa_por_usuario_id(1, $id)) {
							$n_eval = $consulta->num_rows;
							$row = $consulta->fetch_array(MYSQLI_ASSOC);
							if ($n_eval <= 2) {
								if ($row["ahora"] < $row["tiempo_final"]) {
									$_SESSION["id"] = $id;
									$_SESSION["test_id"] = $row["evaluacion_enc_id"];
 									header("Location: {$dir_base}layout/evaluacion/evaluacion_alumno_pantalla.php");
									die();
									// Acá va la redireccion
								}
							}
						}
					}
					session_destroy();
					header ("Location: ../login.php");
				}
			} else {
				session_destroy();
				header ("Location: ../login.php");
			}
		} else {
			session_destroy();
			header ("Location: ../login.php");
		}
	} else {
		session_destroy();
		header ("Location: ../login.php");	
	}
} else {
	session_destroy();
	header ("Location: ../login.php");
}
?>