<?php

namespace Hooks;

trait PublicGet {
    public function __get(string $name){
        return $this->$name;
    }
}