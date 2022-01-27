<?php

namespace DAO;

use Adapters\SqlConnector;
use PDO;

abstract class BaseDAO implements DAO {

    protected string $table;
    protected string $identity = "id";

    protected PDO $db;

    function __construct(private SqlConnector $connector)
    {
        $this->db = $this->connector->getConn();
    }

    public function create (array $fields, array $values) {
        $bind = [];
        foreach ($fields as $key => $field){
            $bind[":$field"] = $values[$key];
        }

        $stmt = $this->db->prepare("
            INSERT INTO $this->table
            (`" . implode("`, `", $fields) . "`)
            VALUES
            (:" . implode(", :", $fields). ")
        ");

        $this->db->beginTransaction();
        $stmt->execute($bind);
        $insertedId = $this->db->lastInsertId();
        $this->db->commit();

        return (object)[ "insertedId" => $insertedId];
    }

    public function read (?int $id) {
        $clause = (isset($id))? "WHERE $this->identity = $id": null;
        return
        $this->db->query("
            SELECT  *
            FROM    $this->table
            $clause
        ")->fetchAll(PDO::FETCH_OBJ);
    }

    public function update (array $fields, array $values, int $id) {
        $bind = [":$this->identity" => $id];
        foreach ($fields as $key => $field){
            $bind[":$field"] = $values[$key];
        }
        return
        $this->db->prepare("
            UPDATE $this->table
            SET " . implode(
                    ", ",
                    array_map(
                        fn($item)=>"`$item` = :$item",
                        $fields
                    )
                ) . "
            WHERE `$this->identity` = :$this->identity
        ")
        ->execute($bind);
    }

    public function delete (int $id) {
        return
        $this->db->prepare("
            DELETE FROM $this->table
            WHERE `$this->identity` = :$this->identity
        ")
        ->execute([ ":$this->identity" => $id]);
    }
}