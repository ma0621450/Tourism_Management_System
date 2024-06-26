<?php require ("app/models/adminModel.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_id = $_POST['service_id'];
    $result = delServices($service_id);
    if ($result) {
        header("location: add_services");
        exit;
    }
}

