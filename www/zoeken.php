<?php
include 'database.php';
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $stmt = $conn->prepare("SELECT * FROM book WHERE title LIKE :search");
    $stmt->execute([':search' => "%$search%"]);

    $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <?php include 'navbalk.php'; ?>
</header>
<h1>Zoekresultaten</h1>
<div>
    <?php foreach ($books as $book): ?>
        <div>
            <img
                src="images/<?= $book['image'] ?>"
                alt="<?= $book['title'] ?>"
            >
            <div>
                <h2><?= $book['title'] ?></h2>
                <p><?= $book['artist'] ?></p>
                <p><?= $book['description'] ?></p>
                <div>
                   <span><?= $book['genre'] ?></span>
                   <span><?= $book['tracks'] ?> tracks</span>
                </div>
                <div>
                    <span>€<?= $book['price'] ?></span>
                    <a href="detail.php?id=<?= $book['id'] ?>">
                        meer info 
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
</body>
</html>
