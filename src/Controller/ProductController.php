<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Core\Http\Response;

class ProductController extends \Core\Controller\Controller
{

    public function index():Response
    {


        $productRepository = new ProductRepository();



        return $this->render("product/index", [
            "pageTitle"=>"Products",
            "products"=>$productRepository->findAll()
        ]);
    }


    public function create():Response
    {

        $name = null;
        $description = null;

        if(!empty($_POST['name'])){
            $name = $_POST['name'];
        }

        if(!empty($_POST['description'])){
            $description = $_POST['description'];
        }


        if($name && $description)
        {

            $product = new Product();

            $product->setName($name);
            $product->setDescription($description);


            $productRepository = new ProductRepository();

            $product =  $productRepository->save($product);

            return $this->redirect("?type=product&action=index");


        }

        return $this->render("product/create", [
            "pageTitle"=>"Nouvel Article"
        ]);
    }
}