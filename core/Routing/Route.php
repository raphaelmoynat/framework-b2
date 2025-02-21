<?php

namespace Core\Routing;

use Attribute;

class Route
{
    private string $uri;
    private string $name;
    private array|null $verbs;
    private string $method;
    private string $controller;
    private array $defaultVerbs = ['GET', 'POST', 'PATCH', 'OPTION', 'DELETE'];

    public function __construct(string $uri = '', string $name = '', array|null $verbs = null)
    {
        $this->uri = $uri;
        $this->name = $name;
        $this->verbs = $verbs ?? $this->defaultVerbs;
    }
    public function getUri(): string
    {
        return $this->uri;
    }
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getVerbs(): ?array
    {
        return $this->verbs;
    }

    public function setVerbs(array|null $verbs): void
    {
        $this->verbs = $verbs ?? $this->defaultVerbs;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }


}
