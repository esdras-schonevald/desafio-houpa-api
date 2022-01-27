<?php
/*
ini_set("display_errors", 1);
error_reporting(E_ALL);
*/

include __DIR__ . "/../../vendor/autoload.php";
/*
$array = [
    "/"=>                  "HomeController@index"
,   "/home"=>              "HomeController@index"
,   "/get/all"=>           "GetAllController@both"
,   "/get/all/buy"=>       "GetAllController@buy"
,   "/get/all/sell"=>      "GetAllController@sell"
,   "/get/{limit}"=>       "GetLimitController@both"
,   "/get/{limit}/buy"=>   "GetLimitController@buy"
,   "/get/{limit}/sell"=>  "GetLimitController@sell"
];
*/

$yaml = \Symfony\Component\Yaml\Yaml::parseFile(__DIR__ . "/../app/config/routes.yaml");

var_dump($yaml);