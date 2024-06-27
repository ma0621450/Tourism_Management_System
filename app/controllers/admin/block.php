<?php require ("app/models/adminModel.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];
    $block = blockUser($user_id);
}