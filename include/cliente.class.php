<?php
include_once("conexion.class.php");

class cliente {
	var $con;
	function Cliente() {
		$this->con = new DBManager;
	}

	function crear_usuario($campos) {
		if($this->con->conectar() == true) {
			return  $this->con->sql("INSERT INTO usuario(nombre, apellido, mail, pass, sexo, telefono, tipo) values('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "');");
		}
	}

	function id_insert() {
		if($this->con->conectar() == true) {
			return  $this->con->id();
		}		
	}

	function actualiza_usuario_id($campos, $id) {
		if($this->con->conectar() == true) {
			return $this->con->sql("UPDATE usuario SET nombre = '" . $campos[0] . "', apellido = '" . $campos[1] . "', mail = '" . $campos[2] . "', sexo = '" . $campos[3] . "', tipo = '" . $campos[4] . "', telefono = '" . $campos[5] . "' WHERE id = '" . $id . "';");
		}
	}

	function actualiza_perfil_id($campos, $id) {
		if($this->con->conectar() == true) {
			return $this->con->sql("UPDATE usuario SET nombre = '" . $campos[0] . "', apellido = '" . $campos[1] . "', mail = '" . $campos[2] . "', sexo = '" . $campos[3] . "', telefono = '" . $campos[4] . "' WHERE id = '" . $id . "';");
		}
	}

	function actualiza_pass_usuario($campos, $id) {
		if($this->con->conectar() == true) {
			return $this->con->sql("UPDATE usuario SET pass = '" . md5($campos[0]) . "' WHERE pass = '" . md5($campos[1]) . "' AND id = '" . $id . "';");
		}
	}

	function reinicia_pass_usuario($campos, $id) {
		if($this->con->conectar() == true) {
			return $this->con->sql("UPDATE usuario SET pass = '" . md5($campos[0]) . "' WHERE id = '" . $id . "';");
		}
	}

	function cambia_estado_usuario($estado, $id) {
		if($this->con->conectar() == true) {
			return $this->con->sql("UPDATE usuario SET estado = '" . $estado . "' WHERE id = '" . $id . "';");
		}
	}

	function consulta_usuario_login($mail, $pass) {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT * FROM usuario WHERE mail = '" . $mail . "' AND pass = '" . $pass . "';");
		}
	}

	function consulta_usuario_pass_correcta($pass, $id) {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT pass FROM usuario WHERE pass = '" . $pass . "' AND id = '" . $id . "';");
		}
	}

	function consulta_estado_usuario($id) {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT estado FROM usuario WHERE id = '" . $id . "';");
		}
	}

	function consulta_usuario_id($id) {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT u.*, tu.descripcion, tu.id AS tipo_id FROM usuario u INNER JOIN tipo_usuario tu on tu.id = u.tipo WHERE u.id = '" . $id . "' AND u.estado != 0;");
		}
	}

	function listar_usuarios() {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT u.id, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo WHERE u.estado != 0;");
		}
	}

	function listar_tipo_usuario() {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT id, descripcion FROM tipo_usuario;");
		}
	}

	function listar_colegios() {
		if($this->con->conectar() == true) {
			return $this->con->consulta("SELECT u.id, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo;");
		}
	}


}
?>