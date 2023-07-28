<?php
require_once '../templates/includes/admin/header.php';
?>


<section class="container py-3">
    <table class="table table-striped caption-top">
        <caption>Liste de nos véhicules</caption>
        <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Description</th>
                <th class="text-center">image</th>
                <th class="text-center">prix</th>
                <th class="text-center">Modifier</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Description</th>
                <th class="text-center">image</th>
                <th class="text-center">prix</th>
                <th class="text-center">Modifier</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </tfoot>
        <?php
        foreach($cars as $car)
        {
            ?>
        <tbody>
            <tr>
                <td class="text-center"><?= $car['id']; ?></td>
                <td class="text-center"><?= $car['name']; ?></td>
                <td class="text-center"><?= $car['description']; ?></td>
                <td class="text-center"><?= $car['image']; ?></td>
                <td class="text-center"><?= $car['price']; ?></td>
                <td class="text-center">
                    <!-- Creer la route en question -->
                    <!-- Le controlleur AdminCarController -->
                    <!-- carForm() -->
                    <!-- Affiche templates/admin/car-form.php -->
                    <a href="/car-location/backoffice/update-car/<?= $car['id']; ?>"><i class="bi bi-pencil-square text-success"></i></a>
                </td>
                <td class="text-center">
                    <a href=""><i class="bi bi-trash3 text-danger"></i></a>
                </td>
            </tr>
        </tbody>
        <?php
        }
        ?>
    </table>
</section>

<?php
require_once '../templates/includes/footer.php';
?>