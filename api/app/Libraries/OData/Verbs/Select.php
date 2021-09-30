<?php
namespace App\Libraries\OData\Verbs;

use Exception;

class Select {
	private $connection;
	private $selects;
	private $select = '';
	private $table;
	private $where = [];
	private $limit = 10;
	private $offset;
	private $expand = [];
	private $last_methods = [];
	private $ignore = [];
	private $orderby;

	function __construct($connection, $table) {
		$select = [];
		$this->connection = $connection;
		$this->table = $table;
		$this->foreignKey = $this->getForeignKeys($table);
		$this->setSelects($table);
	}

	public function top($limit)
	{
		if (is_numeric($limit)) {
			$this->limit = $limit;
		} else {
			throw new Exception("Error Processing Request : We expected a number type parameter!");
		}

		return $this;
	}

	public function count()
	{
		$this->selects = 'COUNT(*) as "metadata.count"';
		return $this;
	}

	public function select($selects)
	{
		array_push($this->last_methods, 'select');

		$last_tables = [];
		$select = $this->separetor(",", $this->trim($selects));
		$array = array_map(function ($sel) use ($last_tables) {
			if (!strrpos($sel, '.')) {
				$sel = $this->table . "." . $sel;
			}

			list($table, $column) = $this->separetor(".", $sel);
			if (!in_array($table, $last_tables)) {
				$regex = "/$table\.[a-z '._]*[,]?/";
				$this->selects = preg_replace($regex, '', $this->selects);
				array_push($last_tables, $table);
			}

			return "$table.$column as '$table.$column'";
		}, $select);

		if (strlen($this->selects) > 0) {

			if (substr($this->selects, -1, 1) == ',') {
				$this->selects .= $this->concat(',', $array);
			} else {
				$this->selects .= ',' . $this->concat(',', $array);
			}
		} else {
			$this->selects = $this->concat(',', $array);
		}


		return $this;
	}

	public function filter($consult)
	{
		array_push($this->last_methods, 'filter');

		//preg_match("/(.*)\(((.*),(.*))\)/", $consult, $match);
		//die;

		$countWhere = count($this->where);
		$data = $this->separetor("%20", $consult);
		$LAST_PARAM =  '';
		$where = [];
		$positionKey;
		$reference = false;

		//print_r($data);die;

		$option = [
			'cts' => 'LIKE',
			'and' => '&&',
			'or' => '||',
			'eq' => '=',
			'gte' => '>=',
			'lte' => '<=',
			'nte' => '!='
		];


		if ($countWhere > 0) {
			$where[$countWhere + 1] = $option['and'];
		}

		foreach ($data as $key => $value) {
			if (!array_key_exists($value, $option)) {
				$option[$value] = '';
			}


			switch ($option[$value]) {
				case '||':
				case '&&':
					$LAST_PARAM = 'option';
					$where[$key + $countWhere] = $option[$value];
					break;
				case '<=':
				case '>=':
				case '!=':
				case '=':
				case 'LIKE':
					$LAST_PARAM = 'compare';
					$where[$positionKey][$LAST_PARAM] = $option[$value];
					break;
				default:
					if ($LAST_PARAM == 'compare' || $LAST_PARAM == 'value') {
						$value = preg_replace("/[*;$=><]/", '', stripcslashes($value));

						if ($reference) {
							if (strpos($value, ')')) {
								$reference = false;
							}
						}

						if ($LAST_PARAM == 'value') {
							$LAST_PARAM = 'value';
							$where[$positionKey][$LAST_PARAM] = $where[$positionKey][$LAST_PARAM] . " " . $value;
						} else {
							$LAST_PARAM = 'value';
							$where[$positionKey][$LAST_PARAM] = $value;
						}
					} else {
						$LAST_PARAM = 'key';
						//print_r(strrpos($value, '('));
						$newKey = $value;
						if (is_numeric(strrpos($value, '('))) {
							$newKey = str_replace('(', '', $value);
							$reference = true;
						} else {
							$reference = false;
						}

						if (!strrpos($value, '.')) {
							$value = $this->table . '.' . $value;
							if ($reference) {
								$value = '(' . $this->table . '.' . $newKey;
							}
						}
						//resolver, não está encontrando
						if (preg_match('/' . $newKey . ' /', $this->selects)) {
							$where[$key + $countWhere][$LAST_PARAM] = $value;
							$positionKey = $key + $countWhere;
						} else {
							throw new Exception("table is not exist, $value");
							break;
						}
					}
					break;
			};
		}
		$this->where = array_merge($this->where, $where);
		return $this;
	}

	public function ignore($key)
	{
		$this->ignore = $this->separetor(",", $this->trim($key));
		return $this;
	}

	public function expand($selects)
	{
		array_push($this->last_methods, 'expand');
		//separete the strings by comma is eliminates space
		$selects = $this->separetor(",", $this->trim($selects));
		//last table expand
		$this->last_expands = [];
		//map to array the selects
		$array = array_map(function ($select) {
			//verify if to string it has point
			if (strrpos($select, ".")) {
				//separete string by point
				list($table, $column) = $this->separetor('.', $select);
				//verify if to table it is in variable last expand
				if (in_array($table, $this->last_expands)) {
					//get all foreign keys the table
					$foreignKey = $this->getForeignKeys($table);
					//checks if the result of foreignkey is greater than 0
					if (count($foreignKey) > 0) {
						//checks and return if the column is a foreignkey
						if ($newTable = $foreignKey[$table][$column]) {
							//add new table in last expands
							array_push($this->last_expands, $newTable);
							//returns standardized string in inner join
							return $this->join($foreignKey[$table][$column], "$foreignKey[$table][$column].id eq $table.$column");
						}
					}
				}
			} else {
				if ($newTable = $this->foreignKey[$this->table][$select]) {
					array_push($this->last_expands, $newTable);
					return $this->join($newTable, "$newTable.id eq $this->table.$select");
				}
			}
		}, $selects);

		//add result na variable expand
		return $this;
	}

	public function orderby($orderby)
	{
		$orderby = $this->separetor(",", $orderby);
		$orderSort = [];
		list($table, $order) = $this->separetor(" ", $orderby[count($orderby) - 1]);
		$orderby[count($orderby) - 1] = $table;
		foreach ($orderby as $key => $value) {
			if (!strrpos($value, '.')) {
				$value = $this->table . '.' . $value;
			}

			if (!preg_match('/' . $value . ' /', $this->selects)) {
				throw new Exception("table is not exist, $value");
				break;
			} else {
				array_push($orderSort, $value);
			}
		}



		switch (strtoupper($order)) {
			case 'ASC':
			case 'DESC':
				$this->orderby = implode(',', $orderSort) . ' ' . strtoupper($order);
				return $this;
				break;
			default:
				throw new Exception("type order is not defined.");
				break;
		}
	}

	public function skip($offset)
	{
		if (is_numeric($offset)) {
			$this->offset = $offset;
		} else {
			throw new Exception("Error Processing Request : We expected a number type parameter!");
		}

		return $this;
	}

	public function commit()
	{
		$sql = "SELECT $this->selects FROM $this->table";

		if (isset($this->expand)) {
			foreach ($this->expand as $value) {
				$sql .= $value;
			}
		}

		if (isset($this->where)) {
			if (count($this->where) > 0) {
				$sql .= " WHERE ";
				foreach ($this->where as $key => $value) {
					if (is_array($value)) {
						$sql .= "$value[key] $value[compare] $value[value]";
					} else {
						$sql .= ' ' . $value . ' ';
					}
				}
			}
		}

		if (isset($this->orderby)) {
			$sql .= " ORDER BY $this->orderby";
		}

		if (isset($this->limit)) {
			$sql .= " LIMIT $this->limit";
		}

		if (isset($this->offset)) {
			$sql .= " OFFSET $this->offset";
		}
		$result = $this->connection->query($sql);
		$res = [];
		/*$res['@odata.__nextLink'] = "http://" .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']."&skip=".($this->limit * 2);
				$res['result'] = [];*/


		foreach ($result->getResult('array') as $value) {
			
		//while ($value = $result->getRowArray()) {
			
			foreach ($value as $key => $val) {
				list($table, $column) = explode('.', $key);
				if (!in_array($column, $this->ignore)) {
					if ($table == $this->table) {
						$array[$table][$column] = $val;						
					} else {
						$array[$this->table][$table][$column] = $val;
					}
				}
			}
			array_push($res, $array);
			//print_r($res);die;
	
		//}
		}

		

		
		return $res;
	}

	public function set($methods, $param)
	{
		foreach ($methods as $method) {
			if (method_exists($this, $method)) {
				if (array_key_exists($method, $param)) {
					call_user_func(array($this, $method), $param[$method]);
				}
			} else {
				throw new Exception('Method not exist');
			}
		}
	}

	public function join($newTable, $consult, $whatJoin = 'LEFT')
	{
		$this->setSelects($newTable);
		$sql = "";
		foreach ($this->where($consult) as $key => $value) {
			if (is_array($value)) {
				$sql .= "$value[key] $value[compare] $value[value]";
			} else {
				$sql .= ' ' . $value . ' ';
			}
		}

		array_push($this->expand, " $whatJoin JOIN $newTable ON " . $sql);
		return " $whatJoin JOIN $newTable ON " . $sql;
	}

	//consertar espaçamento exemplo: table.id  eq user.id | 2 espaçamentos.
	private function where($consult)
	{

		$countWhere = count($this->where);
		$data = $this->separetor(" ", $consult);
		$LAST_PARAM =  '';
		$where = [];
		$positionKey;
		$reference = false;

		$option = [
			'cts' => 'LIKE',
			'and' => '&&',
			'or' => '||',
			'eq' => '=',
			'gte' => '>=',
			'lte' => '<=',
			'nte' => '!='
		];


		foreach ($data as $key => $value) {
			if (!array_key_exists($value, $option)) {
				$option[$value] = '';
			}


			switch ($option[$value]) {
				case '||':
				case '&&':
					$LAST_PARAM = 'option';
					$where[$key + $countWhere] = $option[$value];
					break;
				case '<=':
				case '>=':
				case '!=':
				case '=':
				case 'LIKE':
					$LAST_PARAM = 'compare';
					$where[$positionKey][$LAST_PARAM] = $option[$value];
					break;
				default:
					if ($LAST_PARAM == 'compare' || $LAST_PARAM == 'value') {
						$value = preg_replace("/[*;$=><]/", '', stripcslashes($value));

						if ($reference) {
							if (strpos($value, ')')) {
								$reference = false;
							}
						}

						if ($LAST_PARAM == 'value') {
							$LAST_PARAM = 'value';
							$where[$positionKey][$LAST_PARAM] = $where[$positionKey][$LAST_PARAM] . " " . $value;
						} else {
							$LAST_PARAM = 'value';
							$where[$positionKey][$LAST_PARAM] = $value;
						}
					} else {
						$LAST_PARAM = 'key';
						//print_r(strrpos($value, '('));
						$newKey = $value;
						if (is_numeric(strrpos($value, '('))) {
							$newKey = str_replace('(', '', $value);
							$reference = true;
						} else {
							$reference = false;
						}

						if (!strrpos($value, '.')) {
							$value = $this->table . '.' . $value;
							if ($reference) {
								$value = '(' . $this->table . '.' . $newKey;
							}
						}
						//resolver, não está encontrando
						if (preg_match('/' . $newKey . ' /', $this->selects)) {
							$where[$key + $countWhere][$LAST_PARAM] = $value;
							$positionKey = $key + $countWhere;
						} else {
							throw new Exception("table is not exist, $value");
							break;
						}
					}
					break;
			};
		}

		return $where;
	}

	private function separetor($tag, $string)
	{
		if (is_string($string)) {
			return explode($tag, $string);
		}
	}

	private function trim($string)
	{
		return str_replace(' ', '', $string);
	}

	private function concat($tag, $array)
	{
		if (is_array($array)) {
			return implode($tag, $array);
		}
	}

	private function setSelects($table) {
		$columns =  $this->connection->query("SHOW COLUMNS FROM $table");
		$selects = [];
		foreach ($columns->getResult('array') as $key => $column) {    		
			array_push($selects, "$table.$column[Field] as '$table.$column[Field]'");
		}
		if (strlen($this->selects) > 0) {
			$this->selects .= ',' . $this->concat(',', $selects);
		} else {
			$this->selects = $this->concat(',', $selects);
		}
		/*$selects = [];
		foreach ($columns as $key => $column) {
			array_push($selects, "$table.$column[Field] as '$table.$column[Field]'");
		}

		if (strlen($this->selects) > 0) {
			$this->selects .= ',' . $this->concat(',', $selects);
		} else {
			$this->selects = $this->concat(',', $selects);
		}*/
	}

	private function getColumn($table, $callback) {
		$columns =  $this->connection->query("SHOW COLUMNS FROM $table");
		call_user_func($callback, $columns);
	}

	private function getForeignKeys($table) {
		$reference = $this->connection->query("SELECT REFERENCED_TABLE_NAME, COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = '$table' AND REFERENCED_TABLE_NAME IS NOT NULL");
		$keys = [];
		foreach ($reference->getResult('array') as $key) {	
			$keys[$table][$key['COLUMN_NAME']] = $key['REFERENCED_TABLE_NAME'];
		}

		/*while ($key = $reference->getResult('array')) {
			$keys[$table][$key['COLUMN_NAME']] = $key['REFERENCED_TABLE_NAME'];
		}*/
		//var_dump($keys);exit;
		return $keys;
	}
}