<?php

include 'database.php';

// include 'session_check.php';

session_start();

$books = [];

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $stmt = $conn->prepare("SELECT username, firstname, surname, email, role FROM user WHERE firstname LIKE :search OR surname LIKE :search OR username LIKE :search");
    $stmt->execute([
        ':search' => "%$search%"
    ]);

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoekresultaten</title>
</head>

<body>
    <header>
        <?php include 'navbalk.php'; ?>
    </header>
    <main>
        <div class="zoekresultaten">
            <h1>Zoekresultaten</h1>
            <p>
                Aantal gevonden gebruikers:
                <strong><?= count($users) ?></strong>
            </p>
        </div>
        <div class="filters">
            <form method="POST" action="gebruiker_zoeken.php">
                <input type="text" name="search" placeholder="Zoek een gebruiker">
                <button type="submit">
                    Zoek
                </button>
            </form>
            <table class="gebruikers">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($user['username']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['firstname']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['surname']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['email']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['role']) ?>
                            </td>
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