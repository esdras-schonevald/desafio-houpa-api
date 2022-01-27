<?php

namespace Controllers;

use Basic\Controller;
use Main\Container;
use Main\Request;

class ProductCategoryController extends Controller
{
    public function post(Request $req): void
    {   Container::view("ProductCategoryView") -> post(
            Container::model("ProductCategoryModel") -> post(
                $req->content
            )
        );
    }

    public function get(Request $req): void
    {   Container::view("ProductCategoryView") -> get(
            Container::model("ProductCategoryModel") -> get(
                $req->query->productId, $req->query->categoryId
            )
        );
    }

    public function put(Request $req): void
    {   Container::view("ProductCategoryView") -> put(
            Container::model("ProductCategoryModel") -> put(
                $req->content, $req->query->productId, $req->query->categoryId
            )
        );
    }

    public function delete(Request $req): void
    {   Container::view("ProductCategoryView") -> delete(
            Container::model("ProductCategoryModel") -> delete(
                $req->query->productId, $req->query->categoryId
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