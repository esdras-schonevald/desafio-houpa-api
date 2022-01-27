<?php

namespace Controllers;

use Basic\Controller;
use Main\Container;
use Main\Request;

class ItemController extends Controller
{
    public function post(Request $req): void
    {   Container::view("ItemView") -> post(
            Container::model("ItemModel") -> post(
                $req->content
            )
        );
    }

    public function get(Request $req): void
    {   Container::view("ItemView") -> get(
            Container::model("ItemModel") -> get(
                $req->query->id
            )
        );
    }

    public function put(Request $req): void
    {   Container::view("ItemView") -> put(
            Container::model("ItemModel") -> put(
                $req->content, $req->query->id
            )
        );
    }

    public function delete(Request $req): void
    {   Container::view("ItemView") -> delete(
            Container::model("ItemModel") -> delete(
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