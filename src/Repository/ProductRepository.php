<?php

namespace App\Repository;

use App\Entity\Product;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;


#[TargetEntity(name: Product::class)]
class ProductRepository extends Repository
{
    public function save(Product $product): object
    {

        $query = $this->pdo->prepare("INSERT INTO $this->tableName (name, description) VALUES (:name, :description)");
        $query->execute([
            "name"=>$product->getName(),
            "description"=>$product->getDescription()
        ]);

        return $this->find($this->pdo->lastInsertId());

    }

    public function edit(Product $product)
    {
        $query = $this->pdo->prepare("UPDATE $this->tableName SET name = :name, description = :description WHERE id = :id");
        $query->execute([
            "id"=>$product->getId(),
            "name"=>$product->getName(),
            "description"=>$product->getDescription(),
        ]);

        return $this->find($product->getId());


    }

}