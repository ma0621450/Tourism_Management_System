<?php require ("app/models/adminModel.php");
require 'app/validator/Validator.php';


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_desc = $_POST['s_desc'];

    if (!Validator::string($s_desc, 7, 255)) {
        $errors['s_desc'] = 'Service should be at least 7 characters long.';
    }
    if (empty($errors)) {

        $result = addServices($s_desc);
        if ($result) {
            echo '<script>alert("Service has been Deleted."); window.location.replace("add_services");</script>';
        }
    }
}

$services = getServices();
require ("app/views/admin/services.view.php");