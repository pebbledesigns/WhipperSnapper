<?php


class DB {
	// This class connects to the database only once!
	// We can also run queries such as via the following

	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;


	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' . config::get('mysql/host') . ';dbname=' . config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password')); 
			// echo 'connected';
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	// Generate an SQL command
	public function query($sql, $params = array()) {
		$this->_error = false; // return false for a previous query
		if($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if(count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count 	= $this->_query->rowCount();
			} else {
				// return error & write to log
				$this->_error = true;
				//get Error message and save to log
				$errormsg = $this->_query->errorInfo();
				$message = date('l jS \of F Y h:i:s A') . "\n";
			    $message .= 'Invalid query: ' . $errormsg[2] . "\n";
			    $message .= 'Whole query: ' . $sql . "\n";
			    $message .= '------------------------------------------------------' . "\n";
			    $this->createLog($message);
			}
		} 
		return $this;
	}

	public function action($action, $table, $where=array()) {
		if(count($where)===3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if (!$this->query($sql, array($value))->error()) {
					return $this;
				}
			}
		}
		return false;
	}

	public function get($table, $where) {
			return $this->action('SELECT *', $table, $where);
	}

	public function delete($table, $where) {
			return $this->action('DELETE *', $table, $where);
	}

	public function results() {
			return $this->_results;
	}

	//-------------------------- ERROR HANDLING --------------------------------//
	private function createLog($data){ 
		    $file = config::get('url/absolute') . 'log_error.txt';
		    $fh = fopen($file, 'a') or die("can't open file");
		    fwrite($fh,$data);
		    fclose($fh);
	}

	public function error() {
		return $this->_error;
	}

	public function count() {
		return $this->_count;
	}
}





?>