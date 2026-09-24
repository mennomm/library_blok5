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
                <strong><?= htmlspecialchars(count($books)) ?></strong>
            </p>
        </div>
         <div class="filters">
      <form method="POST" action="zoeken.php">
        <input type="text" name="search" placeholder="Zoek een title">
        <button type="submit">
          Zoek
        </button>
      </form>
        <div class="boeken">
            <?php foreach ($books as $book): ?>
                <div class="boek">
                    <img src="images/<?= htmlspecialchars($book['cover']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                    <div>
                        <h2><?= htmlspecialchars($book['title']) ?></h2>
                        <p><?= htmlspecialchars($book['artist']) ?></p>
                        <div class="informatie">
                            <span><?= htmlspecialchars($book['category']) ?></span>
                            <span><?= htmlspecialchars($book['aantal_paginas']) ?> pagina's</span>
                        </div>
                        <div>
                            <a href="detail.php?book_id=<?= htmlspecialchars($book['book_id']) ?>">
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