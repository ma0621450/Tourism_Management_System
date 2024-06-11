<?php

require_once ("app/models/auth/register.php");
require_once ("app/views/register.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $role_id = $_POST['role_id'];

    //hashing password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Call the createUser function from the UserDB to insert user data
    $result = createUser($username, $email, $hashed_password, $phone_number, $role_id);
    // Check if user creation was successful
    if ($result) {
        header("location: login");
        exit();

    } else {
        echo "User creation failed!";
    }
}
