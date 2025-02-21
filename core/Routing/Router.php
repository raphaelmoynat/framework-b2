<?php

namespace Core\Routing;


use Core\Http\Request;
use Core\Process\Process;
use Core\Routing\Route;
use ReflectionClass;
use ReflectionMethod;

class Router
{
    private array $routes = [];


    //a l'initialisation cherche toutes les routes des controllers dispo
    public function __construct() {
        $this->findControllers();
    }

    private function findControllers(): void
    {
        $controller = __DIR__ . '/../../src/Controller';

        //cherche d'abord tout les controllers
        foreach (scandir($controller) as $file) {

            $className = "App\\Controller\\" . pathinfo($file, PATHINFO_FILENAME);

            if (!class_exists($className)) {
                continue;
            }


            $this->findRoutesFromController($className);
        }
    }


    private function findRoutesFromController($className): void {

        //analyse la classe
        $reflectionClass = new \ReflectionClass($className);

        //regarde toutes les méthodes accessibles
        foreach ($reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {

            //regarde si il y a un attribut sur la méthode
            $attributes = $method->getAttributes(\Core\Attributes\Route::class);

            foreach ($attributes as $attribute) {
                //crée un nouvel objet de Attributes/Route
                $routeAttribute = $attribute->newInstance();

                $route = new \Core\Routing\Route(
                    $routeAttribute->getPath(),
                    $routeAttribute->getName()
                );

                //associe le contrôleur à cette route
                $route->setController($className);

                // associe la méthode du contrôleur à cette route
                $route->setMethod($method->getName());

                //ajoute la route au routeur
                $this->addRoute($route);

            }

        }
    }

    public function addRoute(Route $route): void {

        $this->routes[$route->getUri()] = $route;
    }


    public function handleRequest(Request $request) {
        $uri = $request->getUri();

        //vérifie si uri existe dans les routes enregistrées
        if (!isset($this->routes[$uri])) {
            throw new \Exception("pas de route trouvée pour $uri");
        }

        //récupère la route
        $route = $this->routes[$uri];

        return new Process($route->getController(), $route->getMethod());
    }

}