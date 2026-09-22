<link rel="stylesheet" href="css/style.css">
<?php
require 'session_check.php';





require 'navbalk.php';
require 'database.php';

$sql = [];
$query = "SELECT COUNT(id) AS total FROM users";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_assoc($result);



?>

<main class="dashboard">
    <h1>Dashboard</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Welkom <?php echo $_SESSION['firstname'] ?></h2>
                <p>Je bent ingelogd als <?php echo $_SESSION['role'] ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-group">
                <h2 for="">Totaal aantal gebruikers</h2>
                <p><?php echo $users['total'] ?></p>
            </div>
            <div class="card-group">
                <h2 for="">naam</h2>
                <p><?php echo $users['firstname'] ?></p>
                <p><?php echo $users['lastname'] ?></p>
            </div>

        </div>
    </div>
</main>

<?php require 'footer.php' ?>