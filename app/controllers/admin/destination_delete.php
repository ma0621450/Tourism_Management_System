<?php require ("app/models/adminModel.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination_id = $_POST['destination_id'];
    $result = delDestination($destination_id);
    if ($result) {
        header("location: add_destinations");
        exit;
    }
}

