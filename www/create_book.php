<?php
require 'session_check.php';
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak boek aan</title>

    <? include 'navbalk.php'; ?>
</head>

<body>

    <h1>Maak boek aan</h1>

    <form class="boek-form" action="create_book_process.php" method="post">

        <div class="form-group">
            <label for="title">Titel boek</label>
            <input type="text" name="title" id="title" placeholder="Haikyuu">
        </div>

        <div class="form-group">
            <label for="artist">Artiest</label>
            <input type="text" name="artist" id="artist" placeholder="Haruichi Furudate">
        </div>

        <div class="form-group">
            <label for="aantal_paginas">Aantal pagina's</label>
            <input type="number" name="aantal_paginas" id="aantal_paginas" placeholder="123">
        </div>

        <div class="form-group">
            <label for="category">Categorie</label>

            <select id="category" name="category">
                <option value="Fictie">Fictie</option>
                <option value="Thriller">Thriller</option>
                <option value="Romantiek">Romantiek</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Sciencefiction">Sciencefiction</option>
                <option value="Humor">Humor</option>
                <option value="Historisch">Historisch</option>
                <option value="Psychologie">Psychologie</option>
                <option value="Biografie">Biografie</option>
                <option value="Horror">Horror</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cover">cover</label>
            <input type="text" name="text" id="cover" placeholder="shoyohinata.jpg">
        </div>
        <button type="submit">Maak boek aan</button>

    </form>

</body>
<footer>
    <? include 'footer.php'; ?>
</footer>

</html>