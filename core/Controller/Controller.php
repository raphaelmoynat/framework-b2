<?php

namespace Core\Controller;

use Core\Http\Response;
use Core\View\View;


abstract class Controller
{
    private Response $response;

    public function __construct(){
        $this->response = new Response();
    }

    public function render($nameTemplate, array $data )
    {
        return $this->response->render($nameTemplate, $data);
    }

    public function redirect($route): Response
    {
        return $this->response->redirect($route);
    }
}