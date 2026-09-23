<?php
require 'database.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

             $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");

            $stmt->execute([':email' => $emailForm]);

            // als de email bestaat dan is het resultaat groter dan 0
            if ($stmt->rowCount() > 0) {

                // resultaat gevonden? Dan maken we een user-array $dbuser
                $dbuser = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($dbuser['password'] == $passwordForm) {

                    session_start();
                    $_SESSION['user_id']    = $dbuser['user_id'];
                    $_SESSION['email']      = $dbuser['email'];
                    $_SESSION['firstname']  = $dbuser['firstname'];
                    $_SESSION['surname']   = $dbuser['surname'];
                    $_SESSION['password']   = $dbuser['password'];
                    $_SESSION['role']       = $dbuser['role'];

              // echo "You are logged in";
                       if ($_SESSION['role'] == 'employee') {
                           header('Location: employee_dashboard.php');
                           } elseif ($_SESSION['role'] == 'member') {
                               header('Location: dashboard.php');
                               } else {
                                   header('Location: index.php');}
                } else {
                    include 'navbalk.php';
                    $_GET['message'] = 'wrongpassword';
                    include 'footer.php';
                    exit;
                }
            } else {
                include 'navbalk.php';
                $_GET['message'] = 'usernotfound';
                include 'footer.php';
                exit;
            }
        }
    }
}

include 'footer.php';
