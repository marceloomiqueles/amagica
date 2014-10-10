<?php
class DBManager {
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
	private $conn;
	
	//En el constructor de la clase establecemos los parámetros de conexión con la base de datos
	function __construct($dbuser = 'root', $dbpass = '', $dbname = 'amagica', $dbhost = 'localhost') {
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
	}

	//El método abrir establece una conexión con la base de datos 
	public function conectar() {
		$this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass,$this->dbname);
		if ($this->conn->connect_errno) {
			die('Error al conectar con mysql');
		}
		if (!$this->conn->set_charset("utf8")) {
			die("Error cargando el conjunto de caracteres utf8");
		}
		return true;
	}

	//El método "consulta" ejecuta la sentencia select que recibe por parámetro "$query" a la base de datos y devuelve un array asociativo con los datos que obtuvo de la base de datos para facilitar su posteiror manejo.
	public function consulta($query) {
		$valores = array();
		$result = $this->conn->query($query);
		if (!$result) {
			die('Error query BD:' . $this->conn->error);
		}
		return $result;
	}

	//La función sql nos permite ejecutar una senetencia sql en la base de datos, se suele utilizar para senetencias insert y update.
	public function sql($sql) {
		$resultado = $this->conn->query($sql);
		return $resultado;
	}

	//La función id nos devuelve el identificador del último registro insertado en la base de datos
	public function id() {
		return $this->conn->insert_id;
	}

	//La función "cerrar" finaliza la conexión con la base de datos.
	public function cerrar() {
		$this->conn->close();
	}

	//La función 'escape' escapa los caracteres especiales de una cadena para usarla en una sentencia SQL
	public function escape($value) {
		return $this->conn->real_escape_string($value);
	}
}
?>