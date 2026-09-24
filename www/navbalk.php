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
            <?php if ($_SESSION['role'] == 'employee'): ?>
            <li class="dropdown">
                <a href="">Dashboard</a>
                <div class="dropdown-content">
                    <a href="dashboard.php">Dashboard</a>

                <a href="employee_dashboard.php">Employee dashboard</a>
                </div>
                </li>
                <li class="dropdown">
                    <a href="">boeken</a>
                    <div class="dropdown-content">
                        <a href="book_table.php">Bekijken</a>
                        <a href="create_book.php">Toevoegen</a>
                    </div>
                </li>
            <?php endif; ?>
            <?php if($_SESSION['role']=='member'): ?>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <?php endif; ?>
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