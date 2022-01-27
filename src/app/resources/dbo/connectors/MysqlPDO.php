<?php

namespace Connectors;

use Adapters\SqlConnector;
use Drivers\Singleton;
use PDO;

class MysqlPDO implements SqlConnector {
    use Singleton;

    private PDO $conn;

    private function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=" . getenv("DBHOST") . ";dbname=" . getenv("DBNAME"),
            getenv("DBUSER"),
            getenv("DBPASSWORD")
        );
    }

    public function getConn (): PDO {
        return $this->conn;
    }
}