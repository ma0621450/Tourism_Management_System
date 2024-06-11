<?php
require 'app/views/login.php';
require 'app/models/auth/login.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = authenticateUser($email, $password);
    if (!$user) {

        echo "Invalid email or password";
    } else {
        $_SESSION["user"]['user_id'] = $user['user_id'];
        $_SESSION["user"]['role_id'] = $user['role_id'];
        $_SESSION["user"]['email'] = $user['email'];
        print_r($_SESSION['user']);
        header("location: /Vacation_Management/");

    }

}
