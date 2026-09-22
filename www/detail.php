<?php

include 'database.php';

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
    <title>De Wijze Uil</title>
</head>
<body>
<header>
    <?php include 'navbalk.php'; ?>
</header>
<!-- Main Content -->
<div>
    <!-- Hero Section -->
    <div>
        <div>
            <h1>meer informatie over dit boek</h1>
            <p></p>
        </div>
    </div>
    <!-- Boek -->
    <div>
        <div>
            <span>book</span>
            <h1><?php echo $book['title']; ?></h1>
            <p><?php echo $book['artist']; ?></p>
        </div>
        <div>
            <img
                src="images/<?php echo $book['cover']; ?>"
                alt="<?php echo $book['title']; ?>"
            >
        </div>
    </div>
    <div></div>
    <!-- Info -->
    <div>
        <div>
            <div>
                <span>Artiest</span>
                <span>
                <?php echo $book['artist']; ?>
                </span>
            </div>
            <div>
                <span>category</span>
                <span>
                    <?php echo $book['category']; ?>
                </span>
            </div>
        </div>
        <div>
            <div>
                <span>pagina's</span>
                <span>
                    <?php echo $book['aantal_paginas']; ?>
                </span>
            </div>
        </div>
    </div>
    <!-- Terug -->
    <div>
        <a href="index.php">
            ← terug naar overzicht
        </a>
    </div>
    <!-- Footer -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</div>
</body>
</html>
