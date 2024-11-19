<?php

namespace Core\Http;
use Core\View\View;

class Response
{
    public function render($templateName, array $data ){
        View::render($templateName, $data);
        return $this;
    }
    public function redirect($route){
        if(!$route){
            header('Location: index.php');
        }else{
            header('Location: '.$route);
        }
        return $this;
    }

}