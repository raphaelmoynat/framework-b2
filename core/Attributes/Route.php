<?php

namespace Core\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Route {
    public string $path;
    public string $name;
    private array|null $methods;

    public function __construct(string $path, string $name = '', $methods= null) {
        $this->path = $path;
        $this->name = $name;
        $this->methods = $methods;
    }
    public function getName():string
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getMethods(): ?array
    {
        return $this->methods;
    }

    public function setMethods(?array $methods): void
    {
        $this->methods = $methods;
    }
    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }
}
