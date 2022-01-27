<?php

namespace Models;

use Basic\Model;
use Connectors\MysqlPDO;
use DAO\ItemDAO;
use Main\RequestContent;

class ItemModel extends Model
{
    use DefaultRestModel;
    function __construct()
    {
        $this->dao = new ItemDAO(connector: MysqlPDO::getInstance());
    }

    public function getFields(): array
    {
        return [
            "productId",
            "sizeId",
            "colorId"
        ];
    }

    public function getValues(RequestContent $content): array
    {
        return [
            $content->productId,
            $content->sizeId,
            $content->colorId
        ];
    }
}