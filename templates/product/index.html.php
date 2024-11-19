<h1>Les articles</h1>

<?php foreach ($products as $product) : ?>

    <div class="border border-dark">

        <h2>Name : <?= $product->getName() ?></h2>
        <p>Description : <?= $product->getDescription() ?></p>


    </div>




<?php endforeach; ?>

<a href="?type=product&action=create" class="btn btn-success mt-5">Ajouter un produit</a>

