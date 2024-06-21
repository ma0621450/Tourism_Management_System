<?php

require_once ("app/models/auth/register.php");
require_once ("app/validator/Validator.php");

if (isset($_SESSION['user'])) {
    header('location: /Vacation_Management/');
    exit;
}

$errors = [];
$input = $_POST;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $role_id = $_POST['role_id'];

    if (!Validator::string($username, 3, 20)) {
        $errors['username'] = 'Username must be between 3-20 characters.';
    }
    if (!Validator::email($email)) {
        $errors['email'] = 'Please provide a valid email address.';
    }
    if (!Validator::string($password, 7, 255)) {
        $errors['password'] = 'Password must be at least 7 characters long.';
    }
    if (!Validator::phone($phone_number)) {
        $errors['phone_number'] = 'Please provide a valid phone number.';
    }
    if (!Validator::role($role_id)) {
        $errors['role_id'] = 'Role is required.';
    }


    if (!empty($errors)) {
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit;
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $result = createUser($username, $email, $hashed_password, $phone_number, $role_id);
    if ($result) {
        $redirectUrl = 'login';
        echo json_encode(['success' => true, 'redirect' => $redirectUrl]);
        exit;
    } else {
        $errors['general'] = "User creation failed!";
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit;
    }
}

require_once ("app/views/register.php");
