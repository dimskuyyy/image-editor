<?php 

class Database {
	private $host = DB_HOST;
	private $username = DB_USER;
	private $password = DB_PASS;
	private $dbName = DB_NAME;
	private $dbh;
	private $stmt;

	public function __construct() {
		$dsn = "mysql:dbname={$this->dbName};host={$this->host}"; //mysql::dbname=eclass;host=localhost
		$dbOpts = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		try {
			$this->dbh = new PDO($dsn,$this->username,$this->password,$dbOpts);
		} catch (PDOException $e) {
			echo "Database Connection Failed : ".$e->getMessage();
		}
	}

	/**
	 * Persiapkan query database
	 * @param String $query
	 */
	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	/**
	 * Berikan value pada key query
	 * @param string $key
	 * @param mixed $value
	 * @param PDO $type
	 */
	public function bind($key,$value,$type = null) {
		if(is_null($type)) {
			switch ($value) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindParam($key, $value, $type);
	}

	/**
	 * bind banyak banyak :3
	 * @param string $keys
	 * @param array $value
	 */
	public function bindMultiple($keys, $value) {
		$keys = explode(',', $keys);
		foreach ($keys as $key) {
			$this->bind($key, $value[ltrim($key,':')]);
		}
	}

	/**
	 * Eksekusi statement query
	 */
	public function execute() {
		return $this->stmt->execute();
	}

	/**
	 * Ambil data dari hasil eksekusi
	 * @return semua data dalam bentuk array assosiatif
	 */
	public function fetchAll() {
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Ambil data dari hasil eksekusi
	 * @return data pertama dalam bentuk array assosiatif
	 */
	public function fetch() {
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * Ambil data(banyak) dari hasil eksekusi query
	 * @return data yang telah diambil dalam bentuk array asosiatif
	 */
	public function getResultSet() {
		if($this->execute())
			return $this->fetchAll();
		else
			return false;
	}

	/**
	 * Ambil data(tunggal) dari hasil eksekusi query
	 * @return data yang telah diambil dalam bentuk array asosiatif
	 */
	public function getResult() {
		if($this->execute())
			return $this->fetch();
		else
			return false;
	}
	/**
	 * Cek jumlah baris pada table
	 * @return berapa jumlah baris yang ada
	 */
	public function rowCount(){
		return $this->stmt->rowCount();
	}

	/**
	 * Dapatkan jumlah baris yang berubah atau berinteraksi
	 * @return jumlah baris yang berubah atau berinteraksi
	 */
	public function getAffectedRow() {
		$this->execute();
		return $this->stmt->rowCount();
	}

	public function quote($str){
		return $this->stmt->quote($str);
	}
	/**
	 * jumlah data pada tabel
	 * @param string $column
	 * @param string $table
	 * @param string [$where]
	 * @param mixed $whereValue
	 * @return int $result['count']
	 */
	public function count($column,$table, $where = '') {
		$query = "SELECT COUNT($column) AS count FROM $table";
		if($where !== '') {
			$query .= " WHERE {$where}";
		}
		$this->query($query);
		$result = $this->getResult();
		return $result['count'];
	}

	/**
	 * cek apakah data ada di dalam database
	 * @param string $table
	 * @param string $column
	 * @param mixed $value
	 * @return bool
	 */
	public function isExist($table,$column,$value) {
		$query = "SELECT {$column} FROM {$table} WHERE {$column} = :value";	
		$this->query($query);
		$this->bind(':value', $value);
		$result = $this->getResult();
		if(!$result) {
			return false;
		}
		return true;
	}
}