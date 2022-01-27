<?php

namespace Controllers;

use Basic\Controller;
use Main\Container;
use Main\Request;

class SizeController extends Controller
{
    public function post(Request $req): void
    {   Container::view("SizeView") -> post(
            Container::model("SizeModel") -> post(
                $req->content
            )
        );
    }

    public function get(Request $req): void
    {   Container::view("SizeView") -> get(
            Container::model("SizeModel") -> get(
                $req->query->id
            )
        );
    }

    public function put(Request $req): void
    {   Container::view("SizeView") -> put(
            Container::model("SizeModel") -> put(
                $req->content, $req->query->id
            )
        );
    }

    public function delete(Request $req): void
    {   Container::view("SizeView") -> delete(
            Container::model("SizeModel") -> delete(
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