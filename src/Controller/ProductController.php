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


    public function create(): Response
    {
        if (!empty($_POST['name']) && !empty($_POST['description'])) {
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setDescription($_POST['description']);

            $productRepository = new ProductRepository();
            $productRepository->save($product);

            return $this->redirect("?type=product&action=index");
        }

        return $this->render("product/create", [
            "pageTitle" => "Nouveau produit",
        ]);
    }


    public function show(): Response
    {
        $id = $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $productRepository = new ProductRepository();
            $product = $productRepository->find($id);

            if ($product) {
                return $this->render("product/show", [
                    "pageTitle" => $product->getName(),
                    "product" => $product
                ]);
            }
        }

        return $this->redirect();
    }


    public function delete(): Response
    {
        $id = $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $productRepository = new ProductRepository();
            $product = $productRepository->find($id);

            if ($product) {
                $productRepository->delete($product);
            }
        }

        return $this->redirect("?type=product&action=index");
    }


    public function edit(): Response
    {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;

        if ($id && ctype_digit($id)) {
            $productRepository = new ProductRepository();
            $product = $productRepository->find($id);

            if (!$product) {
                return $this->redirect();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? null;
                $description = $_POST['description'] ?? null;

                if ($name && $description) {
                    $product->setName($name);
                    $product->setDescription($description);

                    $productRepository->edit($product);

                    return $this->redirect("?type=product&action=index");
                }
            }

            return $this->render("product/edit", [
                "pageTitle" => $product->getName(),
                "product" => $product,
            ]);
        }

        return $this->redirect();
    }

}