<?php 
require 'session_check.php';

if ($_SESSION['role'] != 'employee') {
    echo htmlspecialchars( "You are not allowed to view this page, please login as employee");
    exit;
}

require 'navbalk.php';
require 'database.php';

$stmt=$conn ->prepare ("SELECT COUNT(user_id) AS total FROM user");
$stmt->execute();
$gebr = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt =$conn->prepare ("SELECT COUNT(user_id) AS total FROM user WHERE role = 'employee'");
$stmt->execute();
$employees =$stmt->fetch(PDO::FETCH_ASSOC);


$stmt =$conn->prepare ("SELECT username, firstname, surname, email, role FROM user ");
$stmt->execute();
$users =$stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<main>
    <h1>employee Dashboard</h1>
    <div>
        <div> 
            <div>
                <h2>Welkom <?php echo htmlspecialchars( $_SESSION['firstname']) ?></h2>
                <p>Je bent ingelogd als <?php echo htmlspecialchars( $_SESSION['role']) ?></p>
            </div>
        </div>
    </div>
    <div>
        <div >
            <div>
                <h2>Totaal aantal gebruikers</h2>
                <p><?php echo htmlspecialchars( $gebr['total']) ?></p>
            </div>
            <div>
                <h2>Totaal aantal medewerkers</h2>
                <p><?php echo htmlspecialchars( $employees['total']) ?></p>
            </div>
        </div>
    </div>


     <div class="filters">
      <form method="POST" action="gebruiker_zoeken.php">
        <input type="text" name="search" placeholder="Zoek een gebruiker">
        <button type="submit">
          Zoek
        </button>
      </form>
<h2>Users info</h2>

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

<?php require 'footer.php' ?>