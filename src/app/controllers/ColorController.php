<?php

namespace Controllers;

use Basic\Controller;
use Main\Container;
use Main\Request;

class ColorController extends Controller
{
    public function post(Request $req): void
    {   Container::view("ColorView") -> post(
            Container::model("ColorModel") -> post(
                $req->content
            )
        );
    }

    public function get(Request $req): void
    {   Container::view("ColorView") -> get(
            Container::model("ColorModel") -> get(
                $req->query->id
            )
        );
    }

    public function put(Request $req): void
    {   Container::view("ColorView") -> put(
            Container::model("ColorModel") -> put(
                $req->content, $req->query->id
            )
        );
    }

    public function delete(Request $req): void
    {   Container::view("ColorView") -> delete(
            Container::model("ColorModel") -> delete(
                $req->query->id
            )
        );
    }
}

/**
 * Controle da Qualidade
 * [x]  SRP - Controlar quando o Model será inserido na view
 * [x]  OCP - Testes unitarios para o selamento da classe
 * [x]  LSP - Pode representar sua gereralização perfeitamente
 * [x]  ISP - Segregado tanto quanto possível
 * [x]  DIP - Inversão de Controle realizada
 */