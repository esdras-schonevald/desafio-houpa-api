<?php

namespace Models;

use Basic\Model;
use Connectors\MysqlPDO;
use DAO\CategoryDAO;
use Main\RequestContent;

class CategoryModel extends Model
{
    use DefaultRestModel;
    function __construct()
    {
        $this->dao = new CategoryDAO(connector: MysqlPDO::getInstance());
    }

    public function getFields(): array
    {
        return ["name"];
    }

    public function getValues(RequestContent $content): array
    {
        return [$content->name];
    }
}