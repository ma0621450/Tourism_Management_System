<?php


function connectDB()
{

    $host = "localhost";
    $dbname = "vms";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;

    } catch (PDOException $e) {
        echo "Failed Connecting with DB: " . $e->getMessage();
    }

}