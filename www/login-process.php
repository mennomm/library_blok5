<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

            $conn = mysqli_connect('mariadb', 'root', 'password', 'music_app');

            $sql = "SELECT * FROM users WHERE email='$emailForm'";
            $result = mysqli_query($conn, $sql);

            //als de email bestaat dan is het resultaat groter dan 0
            if (mysqli_num_rows($result) > 0) {

                //resultaat gevonden? Dan maken we een user-array $dbuser
                $dbuser = mysqli_fetch_assoc($result);

                if ($dbuser['password'] == $passwordForm) {

                    session_start();
                    $_SESSION['user_id']    = $dbuser['id'];
                    $_SESSION['email']      = $dbuser['email'];
                    $_SESSION['firstname']  = $dbuser['firstname'];
                    $_SESSION['lastname']   = $dbuser['lastname'];
                    $_SESSION['password']   = $dbuser['password'];
                    $_SESSION['role']       = $dbuser['role'];

              // echo "You are logged in";
                       if ($_SESSION['role'] == 'Employee') {
                        header('Location: employee_dashboard.php');
                    } elseif ($_SESSION['role'] == 'Member') {
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
