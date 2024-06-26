<?php
require_once ("app/models/agencyModel.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vp_id = $_POST['vp_id'];
    $result = deletePackage($vp_id);
    if ($result) {
        header("location: Agency_Packages");
    } else {
        echo "Failed";
    }
}























