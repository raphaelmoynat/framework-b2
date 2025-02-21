<?php

namespace Core\Http;

class Request
{
    private string $uri;

    public function __construct() {
        $this->uri = $_SERVER['REQUEST_URI'];

        //si uri est vide ou juste /  on met /
        if ($this->uri === '' || $this->uri === '/') {
            $this->uri = '/';
        }

        // supprime le /  si ce n'est pas la racine
        if ($this->uri !== '/') {
            $this->uri = rtrim($this->uri, '/');
        }
    }

    public function getUri(): string {
        return $this->uri;
    }

}