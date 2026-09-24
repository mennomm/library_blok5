<?php
require 'database.php';
require 'session_check.php';

if ($_SESSION['role'] != 'employee') {
    echo htmlspecialchars("You are not allowed to view this page, please login as employee");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM book");
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken overzicht</title>
</head>

<body>

    <header>
        <?php require 'navbalk.php'; ?>
    </header>

    <main>
        <h1>Boeken overzicht</h1>

        <table class="boeken-tabel">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Aantal pagina's</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['artist']); ?></td>
                        <td><?php echo htmlspecialchars($book['aantal_paginas']); ?></td>
                        <td><?php echo htmlspecialchars($book['category']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <?php require 'footer.php'; ?>
    </footer>

</body>

</html>