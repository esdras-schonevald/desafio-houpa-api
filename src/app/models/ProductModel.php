<?php

namespace Models;

use Basic\Model;
use Connectors\MysqlPDO;
use DAO\ProductDAO;
use Main\RequestContent;

class ProductModel extends Model
{
    use DefaultRestModel;
    function __construct()
    {
        $this->dao = new ProductDAO(connector: MysqlPDO::getInstance());
    }

    public function getFields(): array
    {
        return ["name", "description"];
    }

    public function getValues(RequestContent $content): array
    {
        return [$content->name, $content->description];
    }
}