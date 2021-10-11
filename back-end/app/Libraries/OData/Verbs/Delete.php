<?php
namespace App\Libraries\OData\Verbs;

use Exception;

class Delete {
    private $connection;
    private $table;
    private $id_delete;

    function __construct($connection, $table, $id_delete) {
        $this->connection = $connection;
        $this->table = $table;

        if (is_numeric($id_delete)) {
            $this->id_delete = $id_delete;
        } else {
            throw new Exception("Error Processing Request : We expected a number type parameter!");
        }
    }

    public function commit() {
        $sql = "DELETE FROM $this->table WHERE id = $this->id_delete";
        return $this->connection->query($sql);
    }
}