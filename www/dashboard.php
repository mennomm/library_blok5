<?php
require 'database.php';
require 'session_check.php';
require 'navbalk.php';

$stmt = $conn->prepare("SELECT COUNT(user_id) AS total FROM user ");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<main>
    <h1>Dashboard</h1>
    <div>
        <div>
            <div>
                <h2> Welkom <?php echo htmlspecialchars($_SESSION['firstname']); ?> </h2>
                <p> Je bent ingelogd als <?php echo htmlspecialchars($_SESSION['role']); ?> </p>
            </div>
        </div>
    </div>
    <div>
        <div>
            <div>
                <h2>Totaal aantal gebruikers</h2>
                <p> <?php echo htmlspecialchars($user['total']); ?> </p>
            </div>
        </div>
    </div>
</main> <?php require 'footer.php'; ?>