<?php
require 'session_check.php';





require 'navbalk.php';
require 'database.php';

$stmt = $conn->prepare("SELECT COUNT(user_id) AS total, firstname, surname FROM user WHERE user_id = $_SESSION[user_id]");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<main>
    <h1>Dashboard</h1>
    <div>
        <div>
            <div>
                <h2> Welkom <?php echo $_SESSION['firstname']; ?> </h2>
                <p> Je bent ingelogd als <?php echo $_SESSION['role']; ?> </p>
            </div>
        </div>
    </div>
    <div>
        <div>
            <div>
                <h2>Totaal aantal gebruikers</h2>
                <p> <?php echo $user['total']; ?> </p>
            </div>
            <div>
                <h2>naam</h2>
                <p> <?php echo $user['firstname']; ?> </p>
                <p> <?php echo $user['surname']; ?> </p>
            </div>
        </div>
    </div>
</main> <?php require 'footer.php'; ?>