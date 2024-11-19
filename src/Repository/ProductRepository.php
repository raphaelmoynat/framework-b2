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

        $query = $this->pdo->prepare("INSERT INTO $this->tableName SET name = :name, description = :description");
        $query->execute([
            "name"=>$product->getName(),
            "description"=>$product->getDescription()
        ]);

        return $this->find($this->pdo->lastInsertId());

    }

}