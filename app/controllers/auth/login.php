<?php

require 'app/models/auth/login.php';
require 'app/validator/Validator.php';


$errors = [];
$input = $_POST;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!Validator::email($email)) {
        $errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::string($password, 7, 255)) {
        $errors['password'] = 'Please provide a password of at least 7 characters.';
    }

    if (empty($errors)) {
        $user = authenticateUser($email, $password);

        if (!$user) {
            $errors['general'] = "Invalid email or password.";
        } else {
            $_SESSION["user"] = [
                'user_id' => $user['user_id'],
                'role_id' => $user['role_id'],
                'email' => $user['email']
            ];

            $redirectUrl = '/Vacation_Management/';
            if ($user['role_id'] == 1) {
                $redirectUrl = 'admin';
            } else if ($user['role_id'] == 2) {
                $redirectUrl = 'agency_profile';
            }

            echo json_encode(['success' => true, 'redirect' => $redirectUrl]);
            exit;
        }
    }

    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

require 'app/views/login.php';