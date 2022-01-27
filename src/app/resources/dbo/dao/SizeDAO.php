<?php

namespace DAO;

use Adapters\SqlConnector;

class SizeDAO extends BaseDAO {

    function __construct(private SqlConnector $connector)
    {
        parent::__construct($connector);
        $this->table = "Sizes";
    }
}