<?php
require_once "app/models/agencyModel.php";
require_once "app/validator/Validator.php";

$errors = [];
$userUpdated = false;
$agencyUpdated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $agency_name = $_POST['agency_name'];
    $agency_desc = $_POST['agency_desc'];


    if (!Validator::string($username, 3, 20)) {
        $errors['username'] = 'Username must be between 3-20 characters.';
    }

    if (!Validator::string($password, 7, 255)) {
        $errors['password'] = 'Password must be at least 7 characters long.';
    }
    if (!Validator::string($agency_name, 3, 255)) {
        $errors['agency_name'] = 'Agency Name must be at least 3 characters long';
    }
    if (!Validator::string($agency_desc, 100, 500)) {
        $errors['agency_desc'] = 'Description must be b/w 100-500 characters.';
    }


    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $userUpdated = updateUser($username, $hashed_password);
        $agencyUpdated = updateAgency($agency_name, $agency_desc);

    }
    if ($userUpdated && $agencyUpdated) {
        header("Location: agency_profile");
        exit;
    }
}
$formValues = fetchUserInfo();
require ("app/views/agency/profile.view.php");



