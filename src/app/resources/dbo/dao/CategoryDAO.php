<?php

namespace DAO;

use Adapters\SqlConnector;

class CategoryDAO extends BaseDAO {

    function __construct(private SqlConnector $connector)
    {
        parent::__construct($connector);
        $this->table = "Categories";
    }
}