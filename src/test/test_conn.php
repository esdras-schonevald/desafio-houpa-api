<?php


$dbname = getenv("DBNAME");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASSWORD");
$dbhost = getenv("DBHOST");

$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
/*
$res = $pdo->query("
    SELECT          *
    FROM            Products
        INNER JOIN  ProductCategories
                ON  ProductCategories.ProductID = Products.ID
        INNER JOIN  Categories
                ON  Categories.ID = ProductCategories.CategoryID
        INNER JOIN  Items
                ON  Items.ProductID = Products.ID
        INNER JOIN  Sizes
                ON  Sizes.ID = Items.SizeID
        INNER JOIN  Colors
                ON  Colors.ID = Items.ColorID
");
*/

$res = $pdo->query("truncate table Categories");
echo print_r($res->fetchAll(PDO::FETCH_ASSOC), true);