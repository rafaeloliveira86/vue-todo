<?php
namespace App\Libraries\OData;

use App\Libraries\OData\Verbs\Delete;
use App\Libraries\OData\Verbs\Insert;
use App\Libraries\OData\Verbs\Select;
use App\Libraries\OData\Verbs\Update;
use Exception;

class GenerateDAO {
	protected $connection;
	private $table;
	private $attribiute;

	function __construct($table = null) {
		$this->connection = \Config\Database::connect('default');
		//$this->connection = db_connect();
		//var_dump($this->connection);exit;
		if (isset($table)) {
			$this->is_table($table);
		}
	}

	public function findByid($id) {
		if (is_numeric($id)) {
			$select = new Select($this->connection, $this->table);
			//var_dump($select);exit;
			$select->filter("id eq $id")->top(1);
			return $select;
		} else {
			throw new Exception("Error Processing Request : We expected a number type parameter!");
		}
	}

	public function find() {
		return new Select($this->connection, $this->table);
	}

	public function update($fields) {
		return new Update($this->connection, $this->table, $fields);
	}

	public function delete($id) {
		return new Delete($this->connection, $this->table, $id);
	}

	public function insert($fields) {
		return new Insert($this->connection, $this->table, $fields);
	}

	public function is_table($table) {
		//verifica se a tabela existe no banco;
		if ($attribiute = $this->connection->query("DESCRIBE $table")) {
			$this->table = $table;
		} else {
			throw new Exception('table not exist');
		}
	}
}