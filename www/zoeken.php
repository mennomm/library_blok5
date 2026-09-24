<?php

include 'database.php';

// include 'session_check.php';

session_start();

$books = [];

if (isset($_POST['search'])) {

    $search = $_POST['search'];

    $stmt = $conn->prepare(
        "SELECT * FROM book WHERE title LIKE :search OR artist LIKE :search"
    );

    $stmt->execute([
        ':search' => "%$search%"
    ]);

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoekresultaten</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php include 'navbalk.php'; ?>
    </header>
    <main>
        <div class="zoekresultaten">
            <h1>Zoekresultaten</h1>
            <p>
                Aantal gevonden boeken:
                <strong><?= count($books) ?></strong>
            </p>
        </div>
        <div class="boeken">
            <?php foreach ($books as $book): ?>
                <div class="boek">
                    <img src="images/<?= $book['cover'] ?>" alt="<?= $book['title'] ?>">
                    <div>
                        <h2><?= $book['title'] ?></h2>
                        <p><?= $book['artist'] ?></p>
                        <div class="informatie">
                            <span><?= $book['category'] ?></span>
                            <span><?= $book['aantal_paginas'] ?> pagina's</span>
                        </div>
                        <div>
                            <a href="detail.php?book_id=<?= $book['book_id'] ?>">
                                Meer info
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <?php require 'footer.php'; ?>
    </footer>
</body>

</html>