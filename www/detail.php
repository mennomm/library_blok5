<?php
include 'database.php';
include 'session_check.php';
$book_id = $_GET['book_id'];

$stmt = $conn->prepare("SELECT * FROM book WHERE book_id = :book_id");
$stmt->execute([':book_id' => $book_id]);

$book = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $book['title'] ?> - De Wijze Uil</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <?php include 'navbalk.php'; ?>
    </header>

    <main>

        <div class="hero">
            <h1>Meer informatie over dit boek</h1>
            <p>Bekijk hieronder de informatie over dit boek.</p>
        </div>

        <div class="boek-detail">

            <div class="boek-info">
                <span>Boek</span>

                <h1><?= $book['title'] ?></h1>

                <p><?= $book['artist'] ?></p>
            </div>

            <div>
                <img class="boek-cover" src="images/<?= $book['cover'] ?>" alt="<?= $book['title'] ?>">
            </div>

        </div>

        <div class="info">

            <div class="info-item">
                <span>Artiest</span>
                <span><?= $book['artist'] ?></span>
            </div>

            <div class="info-item">
                <span>Categorie</span>
                <span><?= $book['category'] ?></span>
            </div>

            <div class="info-item">
                <span>Pagina's</span>
                <span><?= $book['aantal_paginas'] ?></span>
            </div>

        </div>

        <div class="terug">
            <a href="index.php">
                ← Terug naar overzicht
            </a>
        </div>

    </main>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>

</html>