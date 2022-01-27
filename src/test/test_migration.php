<?php

include __DIR__ . "/../../vendor/autoload.php";

$dbname = getenv("DBNAME");
$dbuser = getenv("DBUSER");
$dbpass = getenv("DBPASSWORD");

$pdo = new PDO("mysql:host=api-mysql;dbname=mysql", $dbuser, $dbpass);
$dir = __DIR__ . "/../app/resources/dbo/storage/migrations/up";
foreach (scandir($dir) as $filename){
    if (substr($filename, -4) == ".sql"){
        $action = substr($filename, 0, strlen($filename)-4);
        $description = substr($action, 14, strlen($action));

        echo str_replace("_", " ", $description) . PHP_EOL;

        $sql = file_get_contents($dir . DIRECTORY_SEPARATOR . $filename);
        $nrows = $pdo->exec($sql);

        echo "\033[0;32m$nrows rows affecteds\033[0m\n\n";
    }
}