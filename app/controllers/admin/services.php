<?php require ("app/models/adminModel.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_desc = $_POST['s_desc'];


    $result = addServices($s_desc);
    if ($result) {
        header("location: add_services");
        exit;
    }
}

$services = getServices();
require ("app/views/admin/services.view.php");