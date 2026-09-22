```php
<?php

include 'database.php';

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $book['title']; ?> – het boek</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <!-- Top: titel + afbeelding -->
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
        </div>
        <div></div>
        <!-- Terug link -->
        <div>
            <a href="index.php">← terug naar overzicht</a>
        </div>
    </div>
</body>
</html>
```