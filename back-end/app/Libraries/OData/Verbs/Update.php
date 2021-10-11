<?php
namespace App\Libraries\OData\Verbs;

use Exception;

class Update {
    private $id;
    private $table;
    private $connection;
    private $fields;

    function __construct($connection, $table, $fields) {
        $this->connection = $connection;
        $this->table = $table;

        // verifica se variavel fields eh array
        if (is_array($fields)) {
            $this->checkFields($fields);
            $this->fields = $fields;
        } else {
            throw new Exception("Error Processing Request : We expected a Array type parameter!");
        }
    }

    // [name => 'Matheus', ]
    // checa se os campos do array estao preenchidos
    private function checkFields($fields) {
        $attributes = $this->getAttributeTable();
        foreach ($fields as $key => $value) {
            if (strlen($value) <= 0) {
                throw new Exception("Key or Value of array is empty. Array format: field=>\"\" value=>\"\"");
            }
            if ($attribute = $attributes[$key]) {
                if (!$this->validateTypeRef($attribute['Type'], $value)) {
                    throw new Exception("Invalid Type");
                }
            } else {
                throw new Exception("Column not exist");
            }
        }
    }

    public function equalId($id) {
        if (is_numeric($id)) {
            $this->id = $id;
        }

        return $this;
    }

    public function commit() {
        $fields = $this->prepareSQL();
        $sql = "
            UPDATE $this->table SET $fields
        ";
        if (!is_null($this->id)) {
            $sql .= " WHERE id = $this->id";
        } else {
            throw new \Exception("required id");
        }

        $result = $this->connection->query($sql);

        if ($result->error) {
            return false;
        } else {
            return true;
        }
    }

    // prepara a string SQL varrendo o vetor de fields
    public function prepareSQL() {
        $str = '';
        $count = 1;
        foreach ($this->fields as $key => $value) {
            $str .= " $key = '$value'";
            $count++;
            if (count($this->fields) >= $count) {
                $str .= ',';
            }
        }
        return $str;
    }

    private function validateTypeRef($types, $value) {
        list($type, $length) = $this->separator(['(', ')'], $types);

        $condicion = [
            'varchar' => function () use ($value, $length) {
                return is_string($value) && strlen($value) <= $length;
            },
            'int' => function () use ($value, $length) {
                return is_numeric($value) &&  strlen((string)$value) <= $length;
            },
            'tinyint' => function () use ($value, $length) {
                return ((is_numeric($value) && strlen((string)$value)) == 1 || is_bool($value));
            },
            'datetime' => function () use ($value, $length) {
                return true;
            }
        ];
        //print_r($type);
        return call_user_func($condicion[$type]);
    }

    private function separator($tags, $value) {
        $str = preg_replace("/[\\" . implode("\\", $tags) . "]/", '.', $value);
        //varchar(150) varchar.150. ["varchar", "150"]
        return explode('.', $str);
    }

    private function getAttributeTable() {
        $data = $this->connection->query("DESCRIBE $this->table");
        $attrbute = [];
        while ($row = mysqli_fetch_array($data)) {
            $attrbute[$row['Field']] = $row;
        }

        return $attrbute;
    }
}