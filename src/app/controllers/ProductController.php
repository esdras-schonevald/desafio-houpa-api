<?php

namespace Controllers;

use Basic\Controller;
use Main\Container;
use Main\Request;

class ProductController extends Controller
{
    public function post(Request $req): void
    {   Container::view("ProductView") -> post(
            Container::model("ProductModel") -> post(
                $req->content
            )
        );
    }

    public function get(Request $req): void
    {   Container::view("ProductView") -> get(
            Container::model("ProductModel") -> get(
                $req->query->id
            )
        );
    }

    public function put(Request $req): void
    {   Container::view("ProductView") -> put(
            Container::model("ProductModel") -> put(
                $req->content, $req->query->id
            )
        );
    }

    public function delete(Request $req): void
    {   Container::view("ProductView") -> delete(
            Container::model("ProductModel") -> delete(
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