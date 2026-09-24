<?php
require 'session_check.php';





require 'navbalk.php';
require 'database.php';

$stmt = $conn->prepare( "SELECT firstname, surname, email FROM user WHERE user_id = :user_id" ); 
$stmt->execute([ ':user_id' => $_SESSION['user_id'] ]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main>
    <h1>Profiel</h1>
    <div>
        <div>
            <div>
                <h2> Welkom <?php echo htmlspecialchars( $_SESSION['firstname']); ?> </h2>
                <p> Je bent ingelogd als <?php echo htmlspecialchars( $_SESSION['role']); ?> </p>
            </div>
        </div>
    </div>
    <div>
        <div>
            <div>
                <h2>naam</h2>
                <p> <?php echo htmlspecialchars( $user['firstname']); ?> </p>
                <p> <?php echo htmlspecialchars( $user['surname']); ?> </p>
                <p> <?php echo htmlspecialchars( $user['email']); ?> </p>
            </div>
        </div>
    </div>
</main> 
<?php require 'footer.php'; ?>