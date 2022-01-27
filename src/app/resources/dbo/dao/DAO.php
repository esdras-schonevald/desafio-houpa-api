<?php

namespace DAO;

use Adapters\SqlConnector;

interface DAO {

    function __construct(SqlConnector $connector);

    public function create (array $fields, array $values) ;

    public function read (?int $id) ;

    public function update (array $fields, array $values, int $id) ;

    public function delete (int $id) ;
}