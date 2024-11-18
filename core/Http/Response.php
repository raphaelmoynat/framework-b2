<?php

namespace Core\Http;
use Core\View\View;

class Response
{
    public function render($templateName, array $data ){
        View::render($templateName, $data);
        return $this;
    }

}