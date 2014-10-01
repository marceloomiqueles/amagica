<?php
include_once("conexion.class.php");

class cliente
	{
	var $con;
	function Cliente()
		{
		$this->con = new DBManager;
		}
		function insertar($campos)
			{
			if($this->con->conectar() == true)
				{
				return mysql_query("insert into cliente(clie_nombre,clie_appat,clie_apmat, clie_telefono) values('" . $campos[0] . "','" . $campos[1] . "','" . $campos[2] . "'," . $campos[3] . ");");
				}
			}
		function actualizar($campos,$id)
			{
			if($this->con->conectar() == true)
				{
				return mysql_query("update cliente set clie_nombre=" . $campos[0] . " clie_appat=" . $campos[1] . " clie_apmat=" . $campos[2] . " clie_telefono=" . $campos[3] . " where clie_id=" . $id . ";");
				}
			}
		function mostrar_cliente($id)
			{
			if($this->con->conectar() == true)
				{
				return mysql_query("SELECT * FROM cliente WHERE clie_id=" . $id . ";");
				}
			}
		function mostrar_clientes()
			{
			if($this->con->conectar() == true)
				{
				return mysql_query("SELECT * FROM cliente ORDER BY clie_id ASC;");
				}
			}
		function eliminar($id)
			{
			if($this->con->conectar() == true)
				{
				return mysql_query("delete from cliente where clie_id=" . $id . ";");
				}
			}
	}
?>