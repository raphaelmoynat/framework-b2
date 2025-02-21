<?php

namespace Core\Kernel;

use Core\Process\Process;
use Core\Routing\Router;
use Core\Http\Request;

class Kernel
{
    public static function run(){

        //$type = "home";
        //$action = "index";

        //if(!empty($_GET['type'])){ $type = $_GET['type']; }
        //if(!empty($_GET['action'])){ $action = $_GET['action']; }

        //$type = ucfirst($type);
        //$controller = "App\\Controller\\" . $type . "Controller";

        //$controller = new $controller();
        //$controller->$action();


        //instancie un objet routeur qui va scanner les contrôleurs et enregistrer les routes
        $router = new Router();
        $process = $router->handleRequest(new Request()); //récupères l'uri et checke si correspond à une route, en renvoyant le controleur et la méthode
        self::trigger($process); //exécuter la méthode récupérée dans le controller


    }

    public static function trigger(Process $process): void {
        $controllerName = $process->getController(); //récupère le nom du contrôleur
        $action = $process->getAction(); //récupère la méthode à appeler

        $controller = new $controllerName();  //instancie le contrôleur

        $controller->$action(); //exécute la méthode demandée
    }


}