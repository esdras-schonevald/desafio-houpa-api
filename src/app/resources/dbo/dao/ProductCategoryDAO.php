<?php

namespace DAO;

use Adapters\SqlConnector;
use PDO;

class ProductCategoryDAO {

    function __construct(private SqlConnector $connector)
    {
        $this->table        =   "ProductCategories";
        $this->identities   =   ["ProductID", "CategoryID"];
        $this->db           =   $this->connector->getConn();
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

        return (object)["insertedId" => $insertedId];
    }

    public function read (?int $productId, ?int $categoryId) {
        $clauses = [];
        if (isset($productId)){
            $clauses[] = "ProductID = $productId";
        }

        if (isset($categoryId)){
            $clauses[] = "CategoryID = $categoryId";
        }

        $clause = (!empty($clauses))?
            "WHERE ". implode(" AND ", $clauses): null;


        return
        $this->db->query("
            SELECT  *
            FROM    $this->table
            $clause
        ")->fetchAll(PDO::FETCH_OBJ);
    }

    public function update (array $fields, array $values, int $productId, int $categoryId) {
        $bind = [
            ":ProductID" => $productId,
            ":CategoryID" => $categoryId
        ];
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
            WHERE   `ProductID` = :ProductID
                AND `CategoryID` = :CategoryID
        ")
        ->execute($bind);
    }

    public function delete (int $productId, int $categoryId) {
        return
        $this->db->prepare("
            DELETE FROM $this->table
            WHERE   `ProductID` = :ProductID
                AND `CategoryID` = :CategoryID
        ")
        ->execute([
            ":ProductID" => $productId,
            ":CategoryID" => $categoryId
        ]);
    }
}