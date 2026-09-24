<?php

require 'database.php';

// TITLE
if (empty($_POST['title'])) {
    echo "Title book is required";
    exit;
}

if (strlen($_POST['title']) < 3) {
    echo "Title is too short";
    exit;
}

if (strlen($_POST['title']) > 100) {
    echo "Title is too long";
    exit;
}

// ARTIST
if (empty($_POST['artist'])) {
    echo "Artist is required";
    exit;
}

if (strlen($_POST['artist']) < 2) {
    echo "Artist name is too short";
    exit;
}

if (strlen($_POST['artist']) > 50) {
    echo "Artist name is too long";
    exit;
}


// TRACKS
if (empty($_POST['aantal_paginas'])) {
    echo "aantal_pagina's field is required";
    exit;
}

if (!is_numeric($_POST['aantal_paginas'])) {
    echo "aantal_pagina's moet een nummer zijn";
    exit;
}

if ($_POST['aantal_paginas']> 1000) {
    echo "aantal_pagina's is too long";
    exit;
}

$title = $_POST['title'];
$artist = $_POST['artist'];
$category=$_POST['category'];
$aantal_paginas=$_POST['aantal_paginas'];


// $query = "INSERT INTO book (title, artist, category, aantal_paginas)  VALUES('$title', '$artist', '$category', '$aantal_paginas', '$cover')";

$stmt = $conn->prepare("INSERT INTO book (title, artist, category, aantal_paginas)  VALUES(:title, :artist, :category, :aantal_paginas)");

$result = $stmt->execute(['title' => 'haikyuu', 'artist' => 'Haruichi Furudate', 'category' => 'sport', 'aantal_paginas'=>'10']);

if ($result) {
    echo "book aangemaakt";
} else {
    echo "book niet aangemaakt";
}