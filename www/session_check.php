<?php
session_start();

if(empty($_SESSION['user_id'])){
     echo htmlspecialchars("Je bent niet ingelogd");
    echo htmlspecialchars( "<a href='login.php'>Login hier in</a>");
    exit;
}

 