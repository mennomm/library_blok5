<?php include 'database.php';
session_start();

if (isset($_GET['filter']) && isset($_GET['value'])) {
  $filter = $_GET['filter'];
  $value = $_GET['value'];
  $stmt = $conn->prepare("SELECT * FROM book WHERE $filter = :value");
  $stmt->bindValue(':value', $value);
} else {
  $stmt = $conn->prepare("SELECT * FROM book");
}

if (isset($_POST['search'])) {

  $search = $_POST['search'];

  $stmt = $conn->prepare(
    "SELECT * FROM book WHERE title LIKE :search"
  );

  $stmt->bindValue(':search', "%$search%");
}
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>De Wijze Uil</title>
  <?php include 'navbalk.php' ?>
</head>

<body>
  <section>
    <header>
    </header>

    <h1>Welkom bij De Wijze Uil</h1>

    <div class="filters">
      <form method="POST" action="zoeken.php">
        <input type="text" name="search" placeholder="Zoek een title">
        <button type="submit">
          Zoek
        </button>
      </form>
      <div>
        <p>filter op category</p>
        <a href="index.php">reset</a>
        <a href="index.php?filter=category&value=fantasy">Fantasy</a>
        <a href="index.php?filter=category&value=dystopian">dystopian</a>
        <a href="index.php?filter=category&value=classic">classic</a>
        <a href="index.php?filter=category&value=romance">romance</a>
        <a href="index.php?filter=category&value=drama">drama</a>
        <a href="index.php?filter=category&value=adventure">adventure</a>
        <a href="index.php?filter=category&value=mystery">mystery</a>
        <a href="index.php?filter=category&value=science fiction">science fiction</a>
        <a href="index.php?filter=category&value=horro">horro</a>
        <a href="index.php?filter=category&value=historical">historical</a>
        <a href="index.php?filter=category&value=sport">sport</a>
      </div>
    </div>

    <div class="boeken">
      <?php foreach ($books as $book): ?>
        <div class="boek">
          <img src="images/<?= htmlspecialchars($book['cover']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
          <div>
            <h2><?= htmlspecialchars($book['title']) ?></h2>
            <p><?= htmlspecialchars($book['artist']) ?></p>

            <div>
              <span><?= htmlspecialchars($book['category']) ?></span>
              <span><?= htmlspecialchars($book['aantal_paginas']) ?> pagina's</span>
            </div>

            <div>
              <a href="detail.php?book_id=<?= htmlspecialchars($book['book_id']) ?>">
                meer info
              </a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>

  <footer>
    <?php require 'footer.php' ?>
  </footer>
</body>