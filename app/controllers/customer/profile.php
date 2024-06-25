<?php
require_once "app/models/customerModel.php";
require_once "app/validator/Validator.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    if (!Validator::string($new_username, 3, 20)) {
        $errors['new_username'] = 'Username must be between 3-20 characters.';
    }

    if (!Validator::string($new_password, 7, 255)) {
        $errors['new_password'] = 'Password must be at least 7 characters long.';
    }

    if (empty($errors)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $user_id = getCustomerid();
        $result = updateUsernameAndPassword($new_username, $hashed_password);

        if ($result) {
            $_SESSION['credentials_changed'] = true;
            echo '<script>alert("Your credentials have been changed. Please log in again."); window.location.replace("logout");</script>';
            exit;
        }
    }
}
$formValues = fetchUserInfo();
require ("app/views/profile.php");