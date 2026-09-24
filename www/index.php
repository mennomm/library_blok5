<?php include 'database.php';
session_start();

if (isset($_GET['filter']) && isset($_GET['value'])) {
  $filter = $_GET['filter'];
  $value = $_GET['value'];
  $stmt = $conn->prepare("SELECT * FROM book WHERE $filter = '$value'");
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
$books = $stmt->fetchall(PDO::FETCH_ASSOC);
?>


    <!DOCTYPE html>

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>De Wijze Uil</title>
      <link rel="stylesheet" href="css/style.css">
      <?php include 'navbalk.php' ?>
    </head>

    <body>
      <section>
        <header>
        </header>

        <h1>Welkom bij De Wijze Uil</h1>

        
        <a href="create_book.php">
          <button>
            maak nieuwe book
          </button>
        </a>
        
        <div class="filters">
        <form method="POST" action="zoeken.php">
          <input type="text" name="search" placeholder="Zoek een title">
          <button type="submit">
            Zoek
          </button>
        </form>
    <div>
        <p>filter op genre</p>
        <a href="index.php">reset</a>
        <a href="index.php?filter=genre&value=rock"></a>
    </div>

</div>

<div class="boeken">
    <?php foreach ($books as $book): ?>
        <div class="boek">
            <img src="images/<?= $book['cover'] ?>" alt="<?= $book['title'] ?>">

            <div>
                <h2><?= $book['title'] ?></h2>
                <p><?= $book['artist'] ?></p>

                <div>
                    <span><?= $book['category'] ?></span>
                    <span><?= $book['aantal_paginas'] ?> pagina's</span>
                </div>

                <div>
                  <a href="detail.php?book_id=<?= $book['book_id'] ?>">meer info</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
</section>

    <footer>
      <? require 'footer.php' ?>
    </footer>
    </body>
    