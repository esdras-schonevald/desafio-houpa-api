<?php

namespace Models;

use Basic\Model;
use Connectors\MysqlPDO;
use DAO\ColorDAO;
use Main\RequestContent;

class ColorModel extends Model
{
    use DefaultRestModel;
    function __construct()
    {
        $this->dao = new ColorDAO(connector: MysqlPDO::getInstance());
    }

    public function getFields(): array
    {
        return ["hex", "name"];
    }

    public function getValues(RequestContent $content): array
    {
        return [$content->hex, $content->name];
    }
}