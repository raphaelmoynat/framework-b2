
<div class="container mt-5">
    <form action="?type=product&action=edit" method="post" class="form-control p-4 border rounded shadow-sm">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du produit</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nom du produit" value="<?= htmlspecialchars($product->getName()) ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description du produit" required><?= htmlspecialchars($product->getDescription()) ?></textarea>
        </div>

        <input type="hidden" name="id" value="<?= $product->getId() ?>">

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Modifier le produit</button>
        </div>
    </form>
</div>
