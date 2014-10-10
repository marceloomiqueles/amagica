<?php
include_once("conexion.class.php");

class cliente {
	var $con;
	function Cliente() {
		$this->con = new DBManager;
	}

	function cerrar_conn() {
		return $this->con->cerrar();
	}

	// Inicio INSERT

	function crear_usuario($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO usuario(nombre, apellido, mail, pass, sexo, telefono, tipo, estado, creado_por) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "', '" . $campos[7] . "', '" . $campos[8] . "');");
			return $this->con->id();
	}

	function crear_colegio($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO colegio(nombre, comuna_id, calle, numero, fono, n_cursos, estado, creado_por) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "', '" . $campos[7] . "');");
			return $this->con->id();
	}

	function crear_producto($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO producto(categoria_id, codigo, descr, curso, idioma_id, estado, ruta) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', 2, '');");
			return $this->con->id();
	}

	function crear_credito($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO credito(usuario_id, cantidad, fecha, sentido, creado_por) VALUES('" . $campos[0] . "', '" . $campos[1] . "', NOW(), '" . $campos[2] . "', '" . $campos[3] . "');");
			return $this->con->id();
	}

	// function crear_credito($campos) {
	// 	if($this->con->conectar() == true)
	// 		$this->con->sql("INSERT INTO producto(usuario_id, cantidad, fecha, sentido, creado_por) VALUES('" . $campos[0] . "', '" . $campos[1] . "', NOW(), '" . $campos[2] . "', '" . $campos[3] . "');");
	// 		return $this->con->id();
	// }

	// Fin INSERT
	// Inicio UPDATE

	function actualiza_usuario_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET nombre = '" . $campos[0] . "', apellido = '" . $campos[1] . "', mail = '" . $campos[2] . "', sexo = '" . $campos[3] . "', tipo = '" . $campos[4] . "', telefono = '" . $campos[5] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_colegio_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE colegio SET comuna_id = '" . $campos[0] . "', nombre = '" . $campos[1] . "', n_cursos = '" . $campos[2] . "', calle = '" . $campos[3] . "', numero = '" . $campos[4] . "', fono = '" . $campos[5] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_perfil_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET nombre = '" . $campos[0] . "', apellido = '" . $campos[1] . "', mail = '" . $campos[2] . "', sexo = '" . $campos[3] . "', telefono = '" . $campos[4] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_pass_usuario($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET pass = '" . md5($campos[0]) . "' WHERE pass = '" . md5($campos[1]) . "' AND id = '" . $id . "';");
	}

	function actualiza_producto_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE producto SET categoria_id = '" . $campos[0] . "', codigo = '" . $campos[1] . "', descr = '" . $campos[2] . "', curso = '" . $campos[3] . "', idioma_id = '" . $campos[4] . "' WHERE id = '" . $id . "';");
	}

	function reinicia_pass_usuario($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET pass = '" . md5($campos[0]) . "' WHERE id = '" . $id . "';");
	}

	function cambia_estado_usuario($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET estado = '" . $estado . "' WHERE id = '" . $id . "';");
	}

	function cambia_estado_colegio($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE colegio SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function cambia_estado_producto($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE producto SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	// Fin UPDATE
	// Inicio SELECT

	function consulta_usuario_login($mail, $pass) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM usuario WHERE mail = '" . $mail . "' AND pass = '" . $pass . "';");
	}

	function consulta_usuario_pass_correcta($pass, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT pass FROM usuario WHERE pass = '" . $pass . "' AND id = '" . $id . "';");
	}

	function consulta_estado_usuario($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM usuario WHERE id = '" . $id . "';");
	}

	function consulta_estado_producto($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM producto WHERE id = '" . $id . "';");
	}

	function consulta_estado_colegio($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM colegio WHERE id = '" . $id . "';");
	}

	function consulta_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.*, tu.descripcion, tu.id AS tipo_id FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo WHERE u.id = '" . $id . "' AND u.estado != 0;");
	}

	function consulta_producto($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, p.categoria_id, c.nombre AS categoria, p.idioma_id, i.descr AS idioma, p.estado, p.curso FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.id = '{$id}' AND p.estado != 0;");
	}

	function listar_usuarios() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo WHERE u.estado != 0;");
	}

	function listar_usuarios_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo WHERE u.estado != 0 AND u.creado_por = {$id};");
	}

	function listar_tipo_usuario() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, descripcion FROM tipo_usuario;");
	}

	function listar_colegios() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cl.id, cl.nombre, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.prov_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.estado != 0 GROUP BY cl.id;");
	}

	function listar_colegios_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cl.id, cl.nombre, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.prov_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.estado != 0 AND cl.creado_por = '{$id}' GROUP BY cl.id;");
	}

	function consulta_colegio_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cl.id, cl.nombre, cl.calle, cl.numero, cl.fono, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.prov_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.id = '{$id}' and cl.estado != 0 GROUP BY cl.id;");
	}

	function listar_regiones() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM region;");
	}

	function listar_provincias() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM provincia;");
	}

	function listar_provincias_por_region($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM provincia WHERE reg_id = '" . $id . "';");
	}

	function listar_comunas() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM comuna;");
	}

	function listar_comunas_por_provincia($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM comuna WHERE prov_id = '" . $id . "';");
	}

	function listar_categorias() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM categoria WHERE estado = 1;");
	}

	function listar_productos() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, c.nombre AS categoria, i.descr AS idioma, p.estado FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.estado != 0;");
	}

	function listar_idiomas() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM idioma WHERE estado = 1;");
	}

	// Fin SELECT
}
?>