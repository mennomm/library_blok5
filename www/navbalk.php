<link rel="stylesheet" href="css/style.css">
<nav class="navbar">
    <h1>
        <a href="index.php">De Wijze Uil</a>
    </h1>
    <ul class="menu">
        <li><a href="index.php">home</a></li>
        <li><a href="#">Over ons</a></li>
        <li><a href="#">Contact</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <?php if($_SESSION['role']=='employee') : ?>
            <li>
                <a href="employee_dashboard.php">Employee dashboard</a>
            </li>
            <li>
                <a href="create_book.php">Toevoegen</a>
            </li>
            <?php endif ?>
            <li>
                <a href="profiel.php">Profiel</a>
            </li>
            <li>
                <a href="logout.php">Uitloggen</a>
            </li>
        <?php else: ?>
            <li>
                <a href="login.php">Inloggen</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>