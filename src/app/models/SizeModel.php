<?php

namespace Models;

use Basic\Model;
use Connectors\MysqlPDO;
use DAO\SizeDAO;
use Main\RequestContent;

class SizeModel extends Model
{
    use DefaultRestModel;
    function __construct()
    {
        $this->dao = new SizeDAO(connector: MysqlPDO::getInstance());
    }

    public function getFields(): array
    {
        return [
            "code",
            "description"
        ];
    }

    public function getValues(RequestContent $content): array
    {
        return [
            $content->code,
            $content->description
        ];
    }
}