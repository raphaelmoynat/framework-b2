<h1 class="text-center my-5">Les Articles</h1>

<div class="container">
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-light rounded">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->getName() ?></h5>
                        <p class="card-text"><?= $product->getDescription() ?></p>
                        <a href="?type=product&action=show&id=<?= $product->getId() ?>" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
        <a href="?type=product&action=create" class="btn btn-success">Ajouter un produit</a>
    </div>
</div>


