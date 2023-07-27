<?php
require_once '../templates/includes/admin/header.php';
?>


<section>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Description</th>
            <th>image</th>
            <th>prix</th>
        </tr>
        <?php
        foreach($cars as $car)
        {

            ?>
        <tr>
            <td><?= $car['id']; ?></td>
            <td><?= $car['name']; ?></td>
            <td><?= $car['description']; ?></td>
            <td><?= $car['image']; ?></td>
            <td><?= $car['price']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</section>

<?php
require_once '../templates/includes/footer.php';
?>