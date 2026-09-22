<?php 
require 'session_check.php';

if ($_SESSION['role'] != 'Employee') {
    echo "You are not allowed to view this page, please login as employee";
    exit;
}

require 'navbalk.php';
require 'database.php';

$stmt=$conn ->prepare ("SELECT COUNT(id) AS total FROM users");
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt =$conn->prepare ("SELECT COUNT(id) AS total FROM users WHERE role = 'employee'");
$stmt->execute();
$employees =$stmt->fetch(PDO::FETCH_ASSOC);


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
                <h2 for="">Totaal aantal medewerkers</h2>
                <p><?php echo $employees['total'] ?></p>
            </div>
        </div>
    </div>
</main>

<?php require 'footer.php' ?>