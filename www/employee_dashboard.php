<?php 
require 'session_check.php';

if ($_SESSION['role'] != 'employee') {
    echo "You are not allowed to view this page, please login as employee";
    exit;
}

require 'navbalk.php';
require 'database.php';

$stmt=$conn ->prepare ("SELECT COUNT(user_id) AS total FROM user");
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt =$conn->prepare ("SELECT COUNT(user_id) AS total FROM user WHERE role = 'employee'");
$stmt->execute();
$employees =$stmt->fetch(PDO::FETCH_ASSOC);


?>

<main>
    <h1>employee Dashboard</h1>
    <div>
        <div> 
            <div>
                <h2>Welkom <?php echo $_SESSION['firstname'] ?></h2>
                <p>Je bent ingelogd als <?php echo $_SESSION['role'] ?></p>
            </div>
        </div>
    </div>
    <div>
        <div >
            <div>
                <h2>Totaal aantal gebruikers</h2>
                <p><?php echo $users['total'] ?></p>
            </div>
            <div>
                <h2>Totaal aantal medewerkers</h2>
                <p><?php echo $employees['total'] ?></p>
            </div>
        </div>
    </div>
</main>

<?php require 'footer.php' ?>