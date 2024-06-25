<?php
require_once ("app/models/agencyModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $services = $_POST["services"];
    $destinations = $_POST["destinations"];
    $persons = $_POST["persons"];
    $price = $_POST["price"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];



    $result = createPackage($title, $description, $services, $destinations, $persons, $price, $start_date, $end_date);



    if ($result) {
        echo "successful";

        // header("location: Agency_Packages");
        // exit();

    } else {
        echo "creation failed!";
    }
}