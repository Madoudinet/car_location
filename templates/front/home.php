<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">Car Location</a>
            </div>
        </nav>
    </header>
    <main>
        <h1>Nous Voitures</h1>
        <div>
            <?php
            foreach ($cars as $car) {
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="/car-location/public/img/<?= $car['image']; ?>" alt="">
                    <div class="card-body">
                        <h2 class="card-title"><?= $car['name']; ?></h2>
                        <p class="card-text"><?= $car['description']; ?></p>
                        <a href="/car-location/contact/form/<?= $car['id']; ?>" class="btn btn-primary">Reserver</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
</body>

</html>