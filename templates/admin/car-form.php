<?php
require_once '../templates/includes/admin/header.php';
?>
<section class="container py-3">
    <h1>Modification du véhicule</h1>
    <form action="/car-location/backoffice/form-car" method="post" enctype="multipart/form-data">
        <input type="text" value="<?= $carDetails['id']; ?>" name="id" hidden>
        <div class="mb-3">
            <label for="name" class="form-label">Modèle</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $carDetails['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $carDetails['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="text" id="price" name="price" class="form-control" value="<?= $carDetails['price']; ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control" value="<?= $carDetails['image']; ?>">
        </div>
        <input type="submit" value="Modifier" class="btn btn-outline-success">
    </form>


</section>

<?php
require_once '../templates/includes/footer.php';
?>