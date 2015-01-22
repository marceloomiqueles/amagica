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
			$this->con->sql("INSERT INTO producto(categoria_id, codigo, descr, curso, idioma_id, estado, valor, n_licencia, con_evaluacion, con_doc, duracion) VALUES('" . $campos[0] . "', '" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', 1, '" . $campos[5] . "', '" . $campos[6] . "', '" . $campos[7] . "', '" . $campos[8] . "', '" . $campos[9] . "');");
		return $this->con->id();
	}

	function crear_credito($id) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO credito(usuario_id, cantidad, fecha) VALUES('{$id}', 0, NOW());");
		return $this->con->id();
	}

	function crear_curso($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO curso(colegio_id, nivel, curso) VALUES('{$campos[0]}', '{$campos[1]}', '{$campos[2]}');");
		return $this->con->id();
	}

	function crear_venta_credito($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO venta_credito(usuario_id, credito_id, fecha_venta, sentido, cantidad) VALUES('{$campos[0]}	', '" . $campos[1] . "', NOW(), '" . $campos[2] . "', '" . $campos[3] . "');");
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
			$this->con->sql("INSERT INTO licencia(producto_id, fecha_creacion, tiempo_duracion, estado, nivel, curso, idioma, colegio_id) VALUES('" . $campos[0] . "', now(),'" . $campos[1] . "', '" . $campos[2] . "', '" . $campos[3] . "', '" . $campos[4] . "', '" . $campos[5] . "', '" . $campos[6] . "');");
		return $this->con->id();
	}

	function crear_venta_licencia($venta, $licencia) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO venta_licencia(fecha_mov, venta_id, licencia_id) VALUES(now(), '{$venta}', '{$licencia}');");
		return $this->con->id();
	}

	function crear_encabezado_evaluacion($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO evaluacion_enc(descr, nivel, idioma_id, tipo, estado) VALUES('{$campos[0]}', '{$campos[1]}', '{$campos[2]}', '{$campos[3]}', '{$campos[4]}');");
		return $this->con->id();
	}

	function crear_pregunta_evaluacion($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO evaluacion(n_orden, pregunta, estado, evaluacion_id, invertido) VALUES('{$campos[0]}', '{$campos[1]}', '{$campos[2]}', '{$campos[3]}', '{$campos[4]}');");
		return $this->con->id();
	}

	function insertar_respuesta_evaluacion($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO evaluacion_curso(respuesta, fecha_evaluacion, n_orden, evaluacion_curso_enc_id) VALUES('{$campos[0]}', now(), '{$campos[1]}', '{$campos[2]}');");
		return $this->con->id();
	}

	function crear_encabezado_evaluacion_prueba($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO evaluacion_curso_enc(tipo, fecha, tiempo, curso_id, evaluacion_enc_id, estado, eval_numero, licencia_id) VALUES('{$campos[0]}', now(), '{$campos[1]}', '{$campos[2]}', '{$campos[3]}', '{$campos[4]}', '{$campos[5]}', '{$campos[6]}');");
		return $this->con->id();
	}

	function insertar_respuesta_alumno($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO evaluacion_curso(respuesta, fecha_evaluacion, evaluacion_curso_enc_id, evaluacion_id, n_alumno, estado, invertido) VALUES('{$campos[0]}', now(), '{$campos[1]}', '{$campos[2]}', '{$campos[3]}', '{$campos[4]}', '{$campos[5]}');");
		return $this->con->id();
	}

	function crear_nota_colegio($campos) {
		if($this->con->conectar() == true)
			$this->con->sql("INSERT INTO nota_colegio(descr, estado, colegio_id, creado, editado) VALUES('{$campos[0]}', '{$campos[1]}', '{$campos[2]}', now(), now());");
		return $this->con->id();
	}

	// Fin INSERT
	// Inicio UPDATE

	function actualiza_usuario_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE usuario SET nombre = '{$campos[0]}', apellido = '{$campos[1]}', sexo = '{$campos[2]}', tipo = '{$campos[3]}', telefono = '{$campos[4]}', colegio_id = '{$campos[5]}', nivel = '{$campos[6]}', curso = '{$campos[7]}' WHERE id = '{$id}';");
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
			return $this->con->sql("UPDATE producto SET categoria_id = '" . $campos[0] . "', codigo = '" . $campos[1] . "', descr = '" . $campos[2] . "', curso = '" . $campos[3] . "', idioma_id = '" . $campos[4] . "', n_licencia = '" . $campos[5] . "', valor = '" . $campos[6] . "', con_evaluacion = '" . $campos[7] . "', con_doc = '" . $campos[8] . "', duracion = '" . $campos[9] . "' WHERE id = {$id};");
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

	function actualiza_ruta_descarga($link, $solicitud) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET link_d = '{$link}' WHERE n_solicitud = '{$solicitud}';");
	}

	function cambia_estado_evaluacion($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE evaluacion_enc SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function cambia_estado_pregunta($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE evaluacion SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function actualiza_encabezado_evaluacion($descripcion, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE evaluacion_enc SET descr = '{$descripcion}' WHERE id = '{$id}';");
	}

	function actualiza_pregunta_por_id($campos, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE evaluacion SET pregunta = '{$campos[0]}', invertido = '{$campos[1]}' WHERE id = '{$id}';");
	}

	function actualiza_nota_colegio($descr, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE nota_colegio SET descr = '{$descr}', editado = now() WHERE id = '{$id}';");
	}

	function cambia_estado_nota_colegio($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE nota_colegio SET estado = '{$estado}' WHERE id = '{$id}';");
	}

	function cambia_estado_licencia_venta_id($estado, $id) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia l INNER JOIN venta_licencia vl ON vl.licencia_id = l.id SET l.estado = {$estado} WHERE vl.venta_id = {$id};");
	}

	function cera_random_token_por_solicitud($solicitud) {
		if($this->con->conectar() == true)
			return $this->con->sql("UPDATE licencia SET random = '', token = '' WHERE n_solicitud = '{$solicitud}';");
	}

	// Fin UPDATE
	// Inicio SELECT

	function consulta_solicitud_token($solicitud) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT n_solicitud, random, DATE_FORMAT(fecha_creacion,'%Y-%m-%d') AS fecha_creacion, DATE_FORMAT(DATE_ADD(fecha_creacion, INTERVAL tiempo_duracion MONTH),'%Y-%m-%d') AS fecha_fin, idioma, nivel FROM licencia WHERE n_solicitud = '{$solicitud}' AND estado = 1;");
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
			return $this->con->consulta("SELECT v.id, v.fecha_venta, CONCAT(u.nombre, ' ', u.apellido) AS vendedor, p.descr AS producto, c.nombre AS colegio, v.estado FROM venta v INNER JOIN credito cr ON cr.id = v.credito_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.id = cr.usuario_id INNER JOIN colegio c ON c.id = v.colegio_id WHERE v.estado != 0 ORDER BY v.colegio_id, v.fecha_venta;");
	}

	function listar_ventas_por_vendedor($id) {
		if ($this->con->conectar() == true)
			return $this->con->consulta("SELECT v.id, v.fecha_venta, CONCAT(u.nombre, ' ', u.apellido) AS vendedor, p.descr AS producto, c.nombre AS colegio, v.estado FROM venta v INNER JOIN credito cr ON cr.id = v.credito_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN usuario u ON u.id = cr.usuario_id INNER JOIN colegio c ON c.id = v.colegio_id WHERE v.estado != 0 AND cr.usuario_id = {$id} ORDER BY v.colegio_id, v.fecha_venta;");
	}

	function consulta_producto($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.duracion, p.con_doc, p.codigo, p.con_evaluacion, p.descr, p.categoria_id, c.nombre AS categoria, p.valor, p.n_licencia, p.idioma_id, i.descr AS idioma, p.estado, p.curso FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.id = '{$id}' AND p.estado != 0;");
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
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado != 0 AND u.tipo = {$tipo} ORDER BY u.nombre, u.apellido, u.nivel, u.curso;");
	}

	function listar_usuarios_por_tipo_por_colegio($tipo, $colegio) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado != 0 AND u.tipo = {$tipo} AND u.colegio_id = {$colegio} ORDER BY u.nombre, u.apellido, u.nivel, u.curso;");
	}

	function listar_usuarios_por_tipo_creado_por($tipo, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.id, cl.nombre AS nombre_colegio, CONCAT(u.nombre, ' ' , u.apellido) AS nombre, tu.descripcion, u.estado, c.cantidad, u.nivel, u.curso FROM usuario u INNER JOIN tipo_usuario tu ON tu.id = u.tipo LEFT JOIN credito c ON c.usuario_id = u.id LEFT JOIN colegio cl ON cl.id = u.colegio_id WHERE u.estado != 0 AND u.tipo = {$tipo} AND u.creado_por = {$id} ORDER BY u.nombre, u.apellido, u.nivel, u.curso;");
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
			return $this->con->consulta("SELECT cl.id, cl.nombre, rg.id AS region_id, rg.nombre AS region, pr.id AS provincia_id, pr.nombre AS provincia, cm.id AS comuna_id, cm.nombre AS comuna, cl.n_cursos, cl.estado FROM colegio cl INNER JOIN comuna cm ON cl.comuna_id = cm.id INNER JOIN provincia pr ON pr.id = cm.provincia_id INNER JOIN region rg ON rg.id = pr.reg_id WHERE cl.estado != 0 ORDER BY cl.nombre, cm.nombre;");
	}

	function lista_simple_colegios() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, nombre FROM colegio WHERE estado = 1 ORDER BY nombre;");
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
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, c.nombre AS categoria, i.descr AS idioma, p.estado, p.curso, p.n_licencia FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.estado != 0 ORDER BY p.categoria_id, p.curso, p.idioma_id;");
	}

	function listar_productos_eliminados() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.id, p.codigo, p.descr, c.nombre AS categoria, i.descr AS idioma, p.estado, p.curso, p.n_licencia FROM producto p INNER JOIN categoria c ON c.id = p.categoria_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE p.estado = 0;");
	}

	function listar_documentos() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT d.id, d.estado, d.descr, i.descr AS idioma, d.producto_id, p.curso, p.descr AS producto, p.categoria_id, c.nombre AS categoria, d.ruta FROM producto p INNER JOIN documento d ON d.producto_id = p.id AND p.con_doc = 1 INNER JOIN idioma i ON i.id = p.idioma_id INNER JOIN categoria c ON c.id = p.categoria_id;");
	}

	function listar_documentos_usuario($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT d.id, d.estado, d.descr, i.descr AS idioma, d.producto_id, p.curso, p.descr AS producto, p.categoria_id, c.nombre AS categoria, d.ruta FROM usuario u INNER JOIN venta v ON v.colegio_id = u.colegio_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN documento d ON d.producto_id = p.id AND p.con_doc = 1 INNER JOIN idioma i ON i.id = p.idioma_id INNER JOIN categoria c ON c.id = p.categoria_id WHERE u.id = {$id} AND v.estado = 1;");
	}

	function listar_documentos_eliminados($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT d.id, d.estado, d.descr, i.descr AS idioma, d.producto_id, p.curso, p.descr AS producto, p.categoria_id, c.nombre AS categoria, d.ruta FROM usuario u INNER JOIN venta v ON v.colegio_id = u.colegio_id INNER JOIN producto p ON p.id = v.producto_id INNER JOIN documento d ON d.producto_id = p.id AND p.con_doc = 1 INNER JOIN idioma i ON i.id = p.idioma_id INNER JOIN categoria c ON c.id = p.categoria_id WHERE u.id = {$id} AND v.estado = 0;");
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

	function consulta_descargas() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT l.id, l.n_solicitud, c.nombre as colegio, l.nivel, l.curso, l.link_d, p.descr AS producto, i.descr AS idioma FROM licencia l INNER JOIN colegio c on c.id = l.colegio_id INNER JOIN producto p ON p.id = l.producto_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE l.estado = 1;");
	}

	function consulta_descargas_colegio($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT l.id, l.n_solicitud, c.nombre as colegio, l.nivel, l.curso, l.link_d, p.descr AS producto, i.descr AS idioma FROM licencia l INNER JOIN colegio c on c.id = l.colegio_id INNER JOIN usuario u ON u.colegio_id = l.colegio_id INNER JOIN producto p ON p.id = l.producto_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE l.colegio_id = u.colegio_id AND l.estado = 1 AND u.id = {$id};");
	}

	function consulta_descargas_colegio_curso($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT l.id, l.n_solicitud,c.nombre as colegio, l.nivel, l.curso, l.link_d, p.descr AS producto, i.descr AS idioma FROM licencia l INNER JOIN colegio c on c.id = l.colegio_id INNER JOIN usuario u ON u.colegio_id = l.colegio_id INNER JOIN producto p ON p.id = l.producto_id INNER JOIN idioma i ON i.id = p.idioma_id WHERE l.colegio_id = u.colegio_id AND l.nivel = u.nivel AND l.curso = u.curso AND l.estado = 1 AND u.id = {$id};");
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

	function consulta_evaluacion_curso_idioma($curso, $idioma, $tipo) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id FROM evaluacion_enc WHERE nivel = {$curso} AND idioma_id = {$idioma} AND tipo = {$tipo} AND estado = 1;");
	}

	function consulta_evaluacion_por_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ee.id, ee.descr, ee.nivel, ee.tipo, ee.idioma_id, i.descr AS idioma FROM evaluacion_enc ee INNER JOIN idioma i ON i.id = ee.idioma_id  WHERE ee.id = {$id} AND ee.estado != 0;");
	}

	function consulta_pregunta_por_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, pregunta, invertido FROM evaluacion WHERE id = {$id};");
	}

	function lista_preguntas_evaluacion_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, pregunta, n_orden FROM evaluacion WHERE evaluacion_id = {$id} AND estado = 1;");
	}

	function listar_evaluaciones_activas() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ee.id, ee.descr, ee.nivel, ee.tipo, ee.estado, i.descr AS idioma FROM evaluacion_enc ee INNER JOIN idioma i ON i.id = ee.idioma_id  WHERE ee.estado != 0;");
	}

	function consulta_preguntas_evaluacion_por_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ee.id, e.n_orden, e.pregunta FROM evaluacion e INNER JOIN evaluacion_enc ee ON ee.id = e.evaluacion_id ANd e.estado = 1 INNER JOIN usuario u ON u.nivel = ee.nivel WHERE ee.estado = 1 AND ee.tipo = 2 AND ee.idioma_id = 1 AND u.id = {$id} ORDER BY e.n_orden ASC;");
	}

	function cantidad_preguntas_evaluacion_por_usuario_id($tipo, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ee.id, COUNT(ee.id) AS cantidad, c.id AS curso_id FROM evaluacion e INNER JOIN evaluacion_enc ee ON ee.id = e.evaluacion_id INNER JOIN usuario u ON u.nivel = ee.nivel INNER JOIN curso c ON c.colegio_id = u.colegio_id AND u.curso = c.curso AND c.nivel = u.nivel WHERE ee.estado = 1 AND ee.tipo = {$tipo} AND ee.idioma_id = 1 AND u.id = {$id} GROUP BY ee.id;");
										 
	}

	function consulta_evaluacion_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT cu.*, now() AS ahora FROM usuario u INNER JOIN colegio co ON u.colegio_id = co.id INNER JOIN curso cu ON cu.colegio_id = co.id AND u.curso = cu.nivel WHERE u.tipo = 4 AND u.id = {$id};");
	}

	function consulta_evaluaciones_realizadas_por_curso_por_tipo($tipo, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, tipo, fecha + INTERVAL tiempo day AS tiempo_final, now() AS ahora, curso_id, evaluacion_enc_id FROM evaluacion_curso_enc WHERE tipo = {$tipo} AND curso_id = {$id} AND estado = 1 ORDER BY tiempo_final DESC;");
	}

	function consulta_curso_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT c.id FROM usuario u INNER JOIN curso c ON u.colegio_id = c.colegio_id AND u.curso = c.nivel WHERE u.id = {$id};");
	}

	function consulta_correo_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT mail FROM usuario WHERE id = {$id};");
	}

	function consulta_si_correo_existe($correo) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id FROM usuario WHERE mail = '{$correo}';");
	}

	function consulta_evaluacion_activa_por_usuario_id($tipo, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ece.id, ece.tipo, ece.fecha + INTERVAL ece.tiempo DAY AS tiempo_final, NOW() AS ahora, ece.curso_id, ece.evaluacion_enc_id FROM usuario u INNER JOIN curso c ON c.colegio_id = u.colegio_id AND c.nivel = u.nivel INNER JOIN evaluacion_curso_enc ece ON ece.curso_id = c.id AND ece.estado = 1 AND ece.fecha + INTERVAL ece.tiempo DAY > NOW() WHERE u.id = {$id} AND ece.tipo = {$tipo} ORDER BY tiempo_final DESC;");
	}

	function consulta_evaluacion_por_usuario_id($tipo, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ece.id, ece.tipo, ece.fecha + INTERVAL ece.tiempo DAY AS tiempo_final, NOW() AS ahora, ece.curso_id, ece.evaluacion_enc_id FROM usuario u INNER JOIN curso c ON c.colegio_id = u.colegio_id AND c.nivel = u.nivel INNER JOIN evaluacion_curso_enc ece ON ece.curso_id = c.id AND ece.estado = 1 WHERE u.id = {$id} AND ece.tipo = {$tipo} ORDER BY tiempo_final DESC;");
	}

	function consulta_encabezado_evaluacion_alumno($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT u.nivel, u.curso, c.nombre FROM usuario u INNER JOIN colegio c ON u.colegio_id = c.id WHERE u.id = {$id};");
	}

	function consulta_preguntas_por_evaluacion_id($tipo, $eval, $id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT e.id, e.n_orden, e.estado, e.pregunta, e.evaluacion_id, e.invertido FROM evaluacion e INNER JOIN evaluacion_enc ee ON e.evaluacion_id = ee.id INNER JOIN licencia l ON l.nivel = ee.nivel INNER JOIN usuario u ON u.colegio_id = l.colegio_id AND u.nivel = l.nivel AND u.curso = l.curso AND l.idioma = ee.idioma_id INNER JOIN evaluacion_curso_enc ece on ece.evaluacion_enc_id = ee.id INNER JOIN colegio g ON g.id = u.colegio_id WHERE ece.id = {$eval} AND ee.estado = 1 AND e.estado = 1 AND ee.tipo = {$tipo} and u.id = {$id} GROUP BY e.id;");
	}

	function consulta_notas_colegio_activas_por_colegio($colegio) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM nota_colegio WHERE estado = 1 AND colegio_id = {$colegio};");
	}

	function consulta_nota_colegio_activa_por_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, descr, estado, colegio_id, creado, editado FROM nota_colegio WHERE estado = 1 AND id = {$id};");
	}

	function consulta_notas_colegio_por_colegio($colegio) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, descr, estado, colegio_id, creado, editado FROM nota_colegio WHERE colegio_id = {$colegio};");
	}

	function consulta_nota_colegio_por_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT id, descr, estado, colegio_id, creado, editado FROM nota_colegio WHERE id = {$id};");
	}

	function consulta_evaluaciones() {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ece.id, concat(ee.descr, ' - ',ece.eval_numero) AS descr, c.nivel, c.curso, ece.fecha, ee.tipo, i.descr AS idioma FROM usuario u INNER JOIN curso c ON c.colegio_id = u.colegio_id AND c.nivel = u.nivel AND c.curso = u.curso INNER JOIN evaluacion_curso_enc ece ON ece.curso_id = c.id INNER JOIN licencia l ON l.colegio_id = u.colegio_id AND l.nivel = u.nivel AND l.curso = u.curso AND ece.licencia_id = l.id INNER JOIN producto p ON p.id = l.producto_id INNER JOIN evaluacion_enc ee ON ee.id = ece.evaluacion_enc_id INNER JOIN idioma i ON i.id = ee.idioma_id WHERE ece.estado = 1 AND u.estado = 1 AND l.estado = 1 ORDER BY l.id DESC;");
	}

	function consulta_evaluaciones_colegio($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ece.id, concat(ee.descr, ' - ',ece.eval_numero) AS descr, c.nivel, c.curso, clg.nombre AS colegio, ece.fecha, ee.tipo, i.descr AS idioma FROM usuario u INNER JOIN colegio clg ON clg.id = u.colegio_id INNER JOIN curso c ON c.colegio_id = u.colegio_id AND c.nivel = u.nivel AND c.curso = u.curso INNER JOIN evaluacion_curso_enc ece ON ece.curso_id = c.id INNER JOIN licencia l ON l.colegio_id = u.colegio_id AND l.curso = c.curso AND l.nivel = c.nivel AND ece.licencia_id = l.id INNER JOIN producto p ON p.id = l.producto_id INNER JOIN evaluacion_enc ee ON ee.id = ece.evaluacion_enc_id INNER JOIN idioma i ON i.id = ee.idioma_id WHERE u.id = {$id} AND ece.estado = 1 AND u.estado = 1 AND l.estado = 1 ORDER BY l.id;");
	}

	function consulta_evaluaciones_colegio_curso($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ece.id, concat(ee.descr, ' - ',ece.eval_numero) AS descr, c.nivel, c.curso, clg.nombre AS colegio, ece.fecha, ee.tipo, i.descr AS idioma FROM usuario u INNER JOIN colegio clg ON clg.id = u.colegio_id INNER JOIN curso c ON c.colegio_id = u.colegio_id AND c.nivel = u.nivel AND c.curso = u.curso INNER JOIN evaluacion_curso_enc ece ON ece.curso_id = c.id INNER JOIN licencia l ON l.colegio_id = u.colegio_id AND l.nivel = u.nivel AND l.curso = u.curso AND ece.licencia_id = l.id INNER JOIN producto p ON p.id = l.producto_id INNER JOIN evaluacion_enc ee ON ee.id = ece.evaluacion_enc_id INNER JOIN idioma i ON i.id = ee.idioma_id WHERE u.id = {$id} AND ece.estado = 1 AND u.estado = 1 AND l.estado = 1 ORDER BY l.id DESC;");
	}

	function consulta_alumnos_de_evaluacion($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT ec.* FROM evaluacion_curso_enc ece INNER JOIN evaluacion_curso ec ON ec.evaluacion_curso_enc_id = ece.id WHERE ece.id = {$id} AND ece.estado = 1 AND ec.estado = 1 GROUP BY ec.n_alumno;");
	}

	function consulta_respuestas_alumnos_evaluacion($id, $alumno) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT * FROM evaluacion_curso WHERE evaluacion_curso_enc_id = {$id} AND n_alumno = {$alumno} AND estado = 1;");
	}

	function consulta_software_comprado_profesor($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT p.descr, v.fecha_venta, v.id FROM usuario u INNER JOIN venta v ON v.colegio_id = u.colegio_id INNER JOIN producto p ON p.id = v.producto_id WHERE u.id = {$id} AND v.estado = 1;");
	}

	function id_ultima_licencia_por_usuario_id($id) {
		if($this->con->conectar() == true)
			return $this->con->consulta("SELECT l.id FROM usuario u INNER JOIN licencia l ON l.colegio_id = u.colegio_id AND l.curso = u.curso AND l.nivel = u.nivel WHERE u.id = {$id} AND u.estado = 1 AND l.estado = 1 ORDER BY l.fecha_creacion DESC LIMIT 1;");
	}

	// Fin SELECT
}
?>