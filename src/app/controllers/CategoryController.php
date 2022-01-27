<?php

namespace Controllers;

use Basic\Controller;
use Main\Container;
use Main\Request;

class CategoryController extends Controller
{
    public function post(Request $req): void
    {   Container::view("CategoryView") -> post(
            Container::model("CategoryModel") -> post(
                $req->content
            )
        );
    }

    public function get(Request $req): void
    {   Container::view("CategoryView") -> get(
            Container::model("CategoryModel") -> get(
                $req->query->id
            )
        );
    }

    public function put(Request $req): void
    {   Container::view("CategoryView") -> put(
            Container::model("CategoryModel") -> put(
                $req->content, $req->query->id
            )
        );
    }

    public function delete(Request $req): void
    {   Container::view("CategoryView") -> delete(
            Container::model("CategoryModel") -> delete(
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