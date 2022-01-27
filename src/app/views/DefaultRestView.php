<?php

namespace Views;

trait DefaultRestView
{
    abstract function toJson(array $data);

    public function post(array $data): void {
        $this->toJson($data);
    }

    public function get(array $data): void {
        $this->toJson($data);
    }

    public function put(array $data): void {
        $this->toJson($data);
    }

    public function delete(array $data): void {
        $this->toJson($data);
    }
}