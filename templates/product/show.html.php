<h1 class="text-center my-5">Page Article</h1>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-light rounded">
                <div class="card-body">
                    <h5 class="card-title"><?= $product->getName() ?></h5>
                    <p class="card-text"><?= $product->getDescription() ?></p>
                    <a href="?type=product&action=index" class="btn btn-primary">Retour</a>
                    <a href="?type=product&action=edit&id=<?= $product->getId() ?>" class="btn btn-secondary">Modifier</a>
                    <a href="?type=product&action=delete&id=<?= $product->getId() ?>" class="btn btn-warning">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</div>


