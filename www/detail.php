<?php include 'database.php'; ?>
<?= $book_id = $_GET['book_id'];
$stmt=$conn->prepare ("SELECT * FROM book WHERE book_id = $book_id");
$stmt->execute();
$book=$stmt-> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

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
    <div class="main-content">
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-inner">
                <h1>meer informatie over dit boek</h1>
                <p></p>
            </div>
        </div>

        <!-- Card Grid -->
     
                  <div>
            <div>
                <span>book</span>
                <h1><?php echo $book['title']; ?></h1>
                <p><?php echo $book['artist']; ?></p>
            </div>
            <div>
                <img src="images/<?php echo $book['cover']; ?>" alt="<?php echo $book['title']; ?>">
            </div>
        </div>
        <div></div>
        <!-- Info -->
        <div>
            <div>
                <div>
                    <span>Artiest</span>
                    <span><?php echo $book['artist']; ?></span>
                </div>
                <div>
                    <span>category</span>
                    <span><?php echo $book['category']; ?></span>
                </div>
            </div>
            <div>
                <div>
                    <span>pagina's</span>
                    <span><?php echo $book['aantl_paginas']; ?></span>
                </div>
            </div>

 <div>
            <a href="index.php">← terug naar overzicht</a>
        </div>
        <!-- Footer -->
        <footer>
            <div class="footer-inner">
                <div>
                    <h4>Over Ons</h4>
                    <p class="text-muted"></p>
                </div>
                <div>
                    <h4>Snelle Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Verzameling</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Contact</h4>
                    <p class="text-muted">Email: info@pokemon-verzameling.nl</p>
                    <p class="text-muted">Tel: +31 (0)6 12345678</p>
                    <p class="text-muted">Locatie: Amsterdam, Nederland</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>