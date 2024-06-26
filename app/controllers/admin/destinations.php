<?php require ("app/models/adminModel.php");
require ("app/validator/Validator.php");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d_name = $_POST['d_name'];

    if (!Validator::string($d_name)) {
        $errors['d_name'] = 'This field is required.';
    }
    if (empty($errors)) {

        $result = addDestinations($d_name);
        if ($result) {
            header("location: add_destinations");
            exit;
        }
    }
}

$destinations = getDestinations();
require ("app/views/admin/destinations.view.php");
