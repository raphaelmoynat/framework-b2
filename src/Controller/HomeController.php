<?php

namespace App\Controller;
use Core\Attributes\Route;



class HomeController extends \Core\Controller\Controller
{
    #[Route(path: "/", name: "app_home")]
    public function index()
    {
        echo "page home";


    }

    #[Route(path: "/home/index", name: "app_index")]
    public function show()
    {

        echo "page show";



    }

}