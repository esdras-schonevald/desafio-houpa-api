<?php

namespace Models;

use Basic\Model;
use Connectors\MysqlPDO;
use DAO\ProductCategoryDAO;
use Main\RequestContent;

class ProductCategoryModel extends Model
{
    use DefaultRestModel;
    function __construct()
    {
        $this->dao = new ProductCategoryDAO(connector: MysqlPDO::getInstance());
    }

    public function getFields(): array
    {
        return ["productId", "categoryId"];
    }

    public function getValues(RequestContent $content): array
    {
        return [$content->productId, $content->categoryId];
    }

    final function get(?int $productId, ?int $categoryId): array
    {
        return [
            "results" => $this->dao->read(
                productId: $productId,
                categoryId: $categoryId
            )
        ];
    }

    final function put (RequestContent $content, int $productId, int $categoryId): array {
        return [
            "updated" => $this->dao->update(
                fields: $this->getFields(),
                values: $this->getValues(content: $content),
                productId: $productId,
                categoryId: $categoryId
            )
        ];
    }

    final function delete (int $productId, int $categoryId): array {
        return [
            "deleted" => $this->dao->delete(
                productId: $productId,
                categoryId: $categoryId
            )
        ];
    }

}