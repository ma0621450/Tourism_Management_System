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
        $result = authenticateUser($email, $password);

        if ($result === "user_not_found") {
            $errors['general'] = "User not found.";
        } elseif ($result === "incorrect_password") {
            $errors['general'] = "Incorrect password.";
        } elseif ($result === "blocked") {
            $errors['general'] = "Your account has been blocked.";
        } elseif ($result === false) {
            $errors['general'] = "An error occurred. Please try again.";
        } else {
            $_SESSION["user"] = [
                'user_id' => $result['user_id'],
                'role_id' => $result['role_id'],
                'email' => $result['email']
            ];

            $redirectUrl = '/Vacation_Management/';
            if ($result['role_id'] == 1) {
                $redirectUrl = 'admin';
            } else if ($result['role_id'] == 2) {
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
