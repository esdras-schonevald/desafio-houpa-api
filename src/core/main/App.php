<?php

namespace Main;

use Error;
use Main\RestRouter as Router;
use Exception;
use ParseError;
use Symfony\Component\Yaml\Yaml;

class App
{
    # Main Method
    public static function main(string ...$args): void
    {   try
        {   # Get Config
            self::defineConfig(__DIR__ . "/../config/bootstrap.yaml");

            # Set routes in Router
            $routes =   Yaml::parseFile(__DIR__ . "/" . __FILES__["routes"]);
            $Router =   new Router($routes);

            # Run the Router
            $Router->run();
        }

        catch (ParseError $pe)
        {   ini_set("error_log", __DIR__ . "/../../tmp/log/php-error.log");
            error_log($pe->getCode() . " - " . $pe->getMessage() . " " . $pe->getFile() . " " . $pe->getLine());
            print("<h1>Serciço Temporariamente Indisponível!</h1>");
        }

        catch (Exception $e)
        {   ini_set("error_log", __DIR__ . "/../../tmp/log/php-error.log");
            error_log($e->getMessage());
            $error_page = file_get_contents(__DIR__ . "/../../app/views/src/exception/404.html");
            print($error_page);
        }

        catch (Error $er)
        {
            ini_set("error_log", __DIR__ . "/../../tmp/log/php-error.log");
            error_log($er->getCode() . " - " . $er->getMessage() . " " . $er->getFile() . " " . $er->getLine());
            $error_page = file_get_contents(__DIR__ . "/../../app/views/src/exception/404.html");
            print($error_page);
        }
    }

    /**
     * Define constantes do projeto
     *
     * @param string $configPath
     * @return void
     */
    private static function defineConfig(string $configPath)
    {   // Busca as configurações iniciais no arquivo config.ini
        $config = Yaml::parseFile($configPath);

        // Define constantes do projeto
        foreach ($config as $constant => $value)
        {   define("__{$constant}__", $value);
            unset($config[$constant]);
        }
    }

}