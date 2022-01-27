<?php

namespace Adapters;

use PDO;

interface SqlConnector
{
    public function getConn(): PDO;
}