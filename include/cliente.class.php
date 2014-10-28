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
			$this->con->sql("INSERT INTO usuario(nombre, apellido, mail, pass, sexo, telefono, tipo, estado, creado_por, colegio_id, nivel, curso) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "', '" . $campos[7] . "', '" . $campos[8] . "', '" . $campos[9] . "', '" . $campos[10] . "', '" . $campos[11] . "');");
			return $this->con->id();
	}

	function crear_colegio($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO colegio(nombre, comuna_id, calle, numero, fono, n_cursos, estado, creado_por) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "', '" . $campos[7] . "');");
			return $this->con->id();
	}

	function crear_producto($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO producto(categoria_id, codigo, descr, curso, idioma_id, estado, valor, n_licencia) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', 2, '" . $campos[5] . "', '" . $campos[6] . "');");
			return $this->con->id();
	}

	function crear_credito($id) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO credito(usuario_id, cantidad, fecha) VALUES('" . $id . "', 0, NOW());");
			return $this->con->id();
	}

	function crear_curso($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO curso(colegio_id, nivel) VALUES('" . $campos[0] . "', '" . $campos[1] . "');");
			return $this->con->id();
	}

	function crear_venta_credito($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO venta_credito(usuario_id, credito_id, fecha_venta, sentido, cantidad) VALUES('" . $campos[0] . "', '" . $campos[1] . "', NOW(), '" . $campos[2] . "', '" . $campos[3] . "');");
			return $this->con->id();
	}

	function crear_venta($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO venta(producto_id, colegio_id, credito_id, fecha_venta, estado) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', NOW(), 1);");
			return $this->con->id();
	}

	function crear_documento($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO documento(producto_id, descr, ruta, estado) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "');");
			return $this->con->id();
	}

	function crear_licencia($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO licencia(producto_id, tiempo_duracion, estado, nivel, curso, idioma, colegio_id) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "');");
			return $this->con->id();
	}

	function crear_venta_licencia($venta, $licencia) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO venta_licencia(fecha_mov, venta_id, licencia_id) VALUES(now(), '" . $venta . "', '" . $licencia . "');");
			return $this->con->id();
	}

	// Fin INSERT
	// Inicio UPDATE

	function actualiza_usuario_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET nombre = '" . $campos[0] . "', apellido = '" . $campos[1] . "', sexo = '" . $campos[2] . "', tipo = '" . $campos[3] . "', telefono = '" . $campos[4] . "', colegio_id = '" . $campos[5] . "', nivel = '" . $campos[6] . "', curso = '" . $campos[7] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_colegio_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE colegio SET comuna_id = '" . $campos[0] . "', nombre = '" . $campos[1] . "', n_cursos = '" . $campos[2] . "', calle = '" . $campos[3] . "', numero = '" . $campos[4] . "', fono = '" . $campos[5] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_perfil_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET nombre = '" . $campos[0] . "', apellido = '" . $campos[1] . "', sexo = '" . $campos[2] . "', telefono = '" . $campos[3] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_pass_usuario($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET pass = '" . md5($campos[0]) . "' WHERE pass = '" . md5($campos[1]) . "' AND id = '" . $id . "';");
	}

	function actualiza_producto_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE producto SET categoria_id = '" . $campos[0] . "', codigo = '" . $campos[1] . "', descr = '" . $campos[2] . "', curso = '" . $campos[3] . "', idioma_id = '" . $campos[4] . "', n_licencia = '" . $campos[5] . "', valor = '" . $campos[6] . "' WHERE id = '" . $id . "';");
	}

	function actualiza_documento_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE documento SET producto_id = '" . $campos[0] . "', descr = '" . $campos[1] . "', ruta = '" . $campos[2] . "', estado = '" . $campos[3] . "' WHERE id = '" . $id . "';");
	}

	function reinicia_pass_usuario($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET pass = '" . md5($campos[0]) . "' WHERE id = '" . $id . "';");
	}

	function cambia_estado_usuario($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET estado = '" . $estado . "' WHERE id = '" . $id . "';");
	}

	function cambia_estado_venta($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE venta SET estado = '" . $estado . "' WHERE id = '" . $id . "';");
	}

	function cambia_estado_colegio($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE colegio SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function cambia_estado_producto($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE producto SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function cambia_estado_documento($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE documento SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function actualiza_credito_usuario($cantidad, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE credito SET cantidad = '{$cantidad}', fecha = NOW() WHERE id = '{$id}';");
	}

	function actualiza_colegio_usuario($colegio, $usuario) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET colegio_id = '{$colegio}' WHERE id = '{$usuario}';");
	}

	function actualiza_fecha_licencia($fecha, $licencia) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET fecha_creacion = '{$fecha}' WHERE n_solicitud = '{$licencia}';");
	}

	function actualiza_random_licencia($random, $licencia) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET random = '{$random}' WHERE n_solicitud = '{$licencia}';");
	}

	function actualiza_token_licencia($token, $licencia) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET token = '{$token}' WHERE n_solicitud = '{$licencia}';");
	}

	function actualiza_n_solicitud_licencia($n_licencia, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET n_solicitud = '{$n_licencia}' WHERE id = '{$id}';");
	}

	function actualiza_ruta_descarga($n_licencia, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET link_d = '{$link}' WHERE n_solicitud = '{$solicitud}';");
	}

	// Fin UPDATE
	// Inicio SELECT

	function consulta_solicitud_token($solicitud) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT n_solicitud, DATE_FORMAT(fecha_creacion,'%Y%m%d') AS fecha_creacion, DATE_FORMAT(DATE_ADD(fecha_creacion, INTERVAL tiempo_duracion MONTH),'%Y%m%d') AS fecha_fin, idioma, nivel FROM licencia WHERE n_solicitud = '" . $solicitud . "';");
	}

	function consulta_correo_unico($correo) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id FROM usuario WHERE mail = '{$correo}';");
	}

	function consulta_usuario_login($mail, $pass) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM usuario WHERE estado = 1 AND mail = '{$mail}' AND pass = '{$pass}';");
	}

	function consulta_usuario_pass_correcta($pass, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT pass FROM usuario WHERE pass = '{$pass}' AND id = '{$id}';");
	}

	function consulta_estado_usuario($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM usuario WHERE id = '{$id}';");
	}

	function consulta_estado_producto($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM producto WHERE id = '{$id}';");
	}

	function consulta_estado_colegio($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM colegio WHERE id = '{$id}';");
	}

	function consulta_estado_documento($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT estado FROM documento WHERE id = '{$id}';");
	}

	function consulta_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.*, c.nombre AS nombre_colegio, tu.descripcion, tu.id AS tipo_id, cr.id AS credito_id, cr.cantidad FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN colegio c ON u.colegio_id = c.id LEFT JOIN credito cr ON cr.usuario_id = u.id WHERE u.id = '" . $id . "' AND u.estado != 0;");
	}

	function consulta_venta_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.*, c.nombre AS nombre_colegio, tu.descripcion, tu.id AS tipo_id, cr.id AS credito_id, cr.cantidad FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN colegio c ON u.colegio_id = c.id LEFT JOIN credito cr ON cr.usuario_id = u.id WHERE u.id = '" . $id . "' AND u.estado != 0;");
	}

	function consulta_producto_venta_id($id) {
		if ($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, CONCAT(u.nombre, ' ', u.apellido) AS vendedor, p.descr AS producto, c.nombre AS colegio FROM venta v INNER JOIN credito cr ON cr.id = v.credito_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.id = cr.usuario_id INNER JOIN colegio c ON c.id = v.colegio_id WHERE v.id = {$id};");
	}

	function consulta_valor_producto($id) {
		if ($this->con->conectar() == true)
			return $this->con->consulta("SELECT valor, categoria_id FROM producto WHERE id = {$id};");
	}

	function listar_ventas() {
		if ($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, v.fecha_venta, CONCAT(u.nombre, ' ', u.apellido) AS vendedor, p.descr AS producto, c.nombre AS colegio, v.estado FROM venta v INNER JOIN credito cr ON cr.id = v.credito_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.id = cr.usuario_id INNER JOIN colegio c ON c.id = v.colegio_id WHERE v.estado != 0 ORDER BY v.colegio_id AND v.fecha_venta;");
	}

	function listar_ventas_por_vendedor($id) {
		if ($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, v.fecha_venta, CONCAT(u.nombre, ' ', u.apellido) AS vendedor, p.descr AS producto, c.nombre AS colegio, v.estado FROM venta v INNER JOIN credito cr ON cr.id = v.credito_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.id = cr.usuario_id INNER JOIN colegio c ON c.id = v.colegio_id WHERE v.estado != 0 AND cr.usuario_id = {$id} ORDER BY v.colegio_id, v.fecha_venta;");
	}

	function consulta_producto($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, p.categoria_id, c.nombre AS categoria, p.valor, p.n_licencia, p.idioma_id, i.descr AS idioma, p.estado, p.curso FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.id = '{$id}' AND p.estado != 0;");
	}

	function consulta_producto_simple($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM producto WHERE id = '{$id}' AND estado != 0;");
	}

	function consulta_documento($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT d.id, d.descr, d.producto_id, p.descr AS producto, p.categoria_id, c.nombre AS categoria, d.ruta FROM documento d INNER JOIN producto p ON p.id = d.producto_id INNER JOIN categoria c ON c.id = p.categoria_id WHERE d.id = '{$id}' AND d.estado != 0;");
	}

	function listar_usuarios() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado != 0;");
	}

	function listar_usuarios_por_tipo($tipo) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado != 0 AND u.tipo = {$tipo} ORDER BY u.nivel, u.curso;");
	}

	function listar_usuarios_por_tipo_creado_por($tipo, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado != 0 AND u.tipo = {$tipo} AND u.creado_por = {$id} ORDER BY u.nivel, u.curso;");
	}

	function listar_usuarios_eliminados() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado = 0;");
	}

	function listar_usuarios_eliminados_por_tipo($tipo) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado = 0 AND u.tipo = {$tipo};");
	}

	function listar_usuarios_creado_por($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo WHERE u.estado != 0 AND u.creado_por = {$id};");
	}

	function listar_tipo_usuario() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, descripcion FROM tipo_usuario;");
	}

	function listar_colegios() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cl.id, cl.nombre, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.provincia_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.estado != 0;");
	}

	function lista_simple_colegios() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, nombre FROM colegio WHERE estado != 0;");
	}

	function listar_colegios_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cl.id, cl.nombre, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.provincia_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.estado != 0 AND cl.creado_por = '{$id}' GROUP BY cl.id;");
	}

	function consulta_colegio_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cl.id, cl.nombre, cl.calle, cl.numero, cl.fono, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.provincia_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.id = '{$id}' and cl.estado != 0 GROUP BY cl.id;");
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
			return $this->con->consulta("SELECT * FROM comuna WHERE provincia_id = '{$id}';");
	}

	function listar_cursos_por_colegio($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id FROM colegio WHERE id = '{$id}';");
	}

	function listar_categorias() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM categoria WHERE estado = 1;");
	}

	function listar_productos() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, c.nombre AS categoria, i.descr AS idioma, p.estado, p.curso, p.n_licencia FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.estado != 0;");
	}

	function listar_productos_eliminados() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, c.nombre AS categoria, i.descr AS idioma, p.estado, p.curso, p.n_licencia FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.estado = 0;");
	}

	function listar_documentos() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT d.id, d.estado, d.descr, i.descr AS idioma, d.producto_id, p.curso, p.descr AS producto, p.categoria_id, c.nombre AS categoria, d.ruta FROM documento d INNER JOIN producto p ON p.id = d.producto_id INNER JOIN idioma i ON i.id = p.idioma_id INNER JOIN categoria c ON c.id = p.categoria_id WHERE d.estado != 0;");
	}

	function listar_documentos_eliminados() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT d.id, d.estado, d.descr, i.descr AS idioma, d.producto_id, p.curso, p.descr AS producto, p.categoria_id, c.nombre AS categoria, d.ruta FROM documento d INNER JOIN producto p ON p.id = d.producto_id INNER JOIN idioma i ON i.id = p.idioma_id INNER JOIN categoria c ON c.id = p.categoria_id WHERE d.estado = 0;");
	}

	function listar_idiomas() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM idioma WHERE estado = 1;");
	}

	function listar_usuarios_credito() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT c.id AS id, c.usuario_id, CONCAT(u.nombre, ' ', u.apellido) AS nombre, t.descripcion, c.cantidad FROM usuario u INNER JOIN tipo_usuario t ON u.tipo = t.id LEFT JOIN credito c ON c.usuario_id = u.id WHERE u.tipo = 2 AND u.estado = 1;");
	}

	function consulta_cantidad_credito_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cantidad FROM credito WHERE id = {$id};");
	}

	function consulta_descargas_colegio_curso($curso, $colegio) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, p.descr, p.curso FROM venta v INNER JOIN producto p ON p.id = v.producto_id WHERE v.estado = 1 AND p.curso = {$nivel} AND v.colegio_id = {$colegio};");
	}

	function consulta_descargas_colegio($colegio) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, p.ruta, p.descr, p.curso FROM venta v INNER JOIN producto p ON p.id = v.producto_id WHERE v.estado = 1 AND v.colegio_id = {$colegio};");
	}

	function consulta_descargas_colegio_admin($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, p.ruta, p.descr, p.curso FROM venta v INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.colegio_id = v.colegio_id WHERE v.estado = 11 AND u.id = '{$id}';");
	}

	function consulta_descargas_colegio_profesor($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, p.ruta, p.descr, p.curso FROM venta v INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.colegio_id = v.colegio_id WHERE v.estado = 1 AND u.nivel = p.curso AND u.id = '{$id}';");
	}

	function consulta_credito_usuario($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cantidad FROM credito WHERE usuario_id = {$id};");
	}

	function consulta_colegio_producto($colegio, $producto) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.* FROM venta v INNER JOIN producto p ON p.id = v.producto_id WHERE v.estado != 0 AND v.colegio_id = '{$colegio}' AND v.producto_id = '{$producto}' AND v.estado != 0;");
	}

	function consulta_colegio_producto_tipo($colegio, $producto, $categoria) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.* FROM venta v INNER JOIN producto p ON p.id = v.producto_id WHERE v.estado != 0 AND v.colegio_id = '{$colegio}' AND v.producto_id = '{$producto}' AND p.categoria_id = '{$categoria}' AND v.estado != 0;");
	}

	function consulta_colegio_simple($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM colegio WHERE estado != 0 AND id = '{$id}';");
	}

	// Fin SELECT
}
?>