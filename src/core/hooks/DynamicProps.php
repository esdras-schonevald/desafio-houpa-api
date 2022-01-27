<?php

namespace Hooks;

trait DynamicProps {

    function __get(string $name){
        return $this->$name ?? null;
    }

    function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }
}