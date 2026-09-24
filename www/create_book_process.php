<?php

require 'database.php';




// TITLE
if (empty($_POST['title'])) {
    echo htmlspecialchars( "Title book is required");
    exit;
}

if (strlen($_POST['title']) < 3) {
    echo htmlspecialchars( "Title is too short");
    exit;
}

if (strlen($_POST['title']) > 100) {
    echo htmlspecialchars( "Title is too long");
    exit;
}

// ARTIST
if (empty($_POST['artist'])) {
    echo htmlspecialchars( "Artist is required");
    exit;
}

if (strlen($_POST['artist']) < 2) {
    echo htmlspecialchars( "Artist name is too short");
    exit;
}

if (strlen($_POST['artist']) > 50) {
    echo htmlspecialchars( "Artist name is too long");
    exit;
}


// TRACKS
if (empty($_POST['aantal_paginas'])) {
    echo htmlspecialchars( "aantal_pagina's field is required");
    exit;
}

if (!is_numeric($_POST['aantal_paginas'])) {
    echo htmlspecialchars( "aantal_pagina's moet een nummer zijn");
    exit; 
}

if ($_POST['aantal_paginas']> 1000) {
    echo htmlspecialchars( "aantal_pagina's is too long");
    exit;
}

$title = $_POST['title'];
$artist = $_POST['artist'];
$category=$_POST['category'];
$aantal_paginas=$_POST['aantal_paginas'];


$stmt = $conn->prepare("INSERT INTO book (title, artist, category, aantal_paginas)  VALUES(:title, :artist, :category, :aantal_paginas)");

$result = $stmt->execute(['title' => $title, 'artist' => $artist, 'category' => $category, 'aantal_paginas'=>$aantal_paginas]);

if ($result) {
  header("Location: book_table.php");
    exit;
} else {
    echo "book niet aangemaakt";
}