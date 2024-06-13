<?php
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

        if ($user['role_id'] == 1) {
            header('location: admin');
        } else if ($user['role_id'] == 2) {
            header('location: Agency_Packages');
        } else if ($user['role_id'] == 3 || !$role) {
            header('location: /Vacation_Management/');
        }

    }

}

require 'app/views/login.php';