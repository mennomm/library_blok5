<?php
include 'database.php';

if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $stmt = $conn->prepare(" SELECT * FROM book WHERE title LIKE :search ");
  $stmt->execute([':search' => "%$search%"]);
  $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);
} ?>
<html>

<head>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <header>

    <?php include 'navbalk.php'; ?>

  </header>
  <h1>Zoekresultaten</h1>

  <div class="album-grid">

    <?php foreach ($albums as $album): ?>
      <div class="album-box">
        <img src="images/<?= $album['image'] ?>" alt="<?= $album['title'] ?>">
        <div class="album-info">
          <h2><?= $album['title'] ?></h2>
          <p class="artist"><?= $album['artist'] ?></p>
          <p class="description"><?= $album['description'] ?></p>
          <div class="tags">
            <span class="genre"><?= $album['genre'] ?></span>
            <span class="tracks"><?= $album['tracks'] ?> tracks</span>
          </div>
          <div class="album-footer">
            <span class="prijs">€<?= $album['price'] ?></span>
            <a href="detail.php?id=<?= $album['id'] ?>">meer info →</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>

</body>

</html>