<?php

namespace Models;

use Main\RequestContent;

trait DefaultRestModel
{
    public function post (RequestContent $content): array
    {
        return [
            "created" => $this->dao->create(
                fields: $this->getFields(),
                values: $this->getValues(content: $content)
            )
        ];
    }

    public function get(?int $id): array
    {
        return [
            "results" => $this->dao->read(
                id: $id
            )
        ];
    }

    public function put (RequestContent $content, int $id): array {
        return [
            "updated" => $this->dao->update(
                fields: $this->getFields(),
                values: $this->getValues(content: $content),
                id: $id
            )
        ];
    }

    public function delete (int $id): array {
        return [
            "deleted" => $this->dao->delete(
                id: $id
            )
        ];
    }


    abstract function getFields(): array;
    abstract function getValues(RequestContent $content): array;
}