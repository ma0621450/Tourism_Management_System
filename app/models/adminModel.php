<?php
require "app/config/database.php";

function getAllPackages()
{
    try {
        $conn = connectDB();
        $stmt = $conn->query("SELECT * FROM vp");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getAllCustomers()
{
    try {
        $conn = connectDB();
        $sql_get_customer = "SELECT * from users where role_id = 3";
        $stmt = $conn->prepare($sql_get_customer);
        $stmt->execute();
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $customers;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function getAllAgencies()
{
    try {
        $conn = connectDB();
        $sql_get_customer = "SELECT * from users where role_id = 2";
        $stmt = $conn->prepare($sql_get_customer);
        $stmt->execute();
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $customers;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getPackagesOfAgencies()
{
    $conn = connectDB();
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM vp WHERE travel_agency_id = (
                SELECT travel_agency_id FROM travel_Agencies WHERE user_id = $user_id
            )";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $packages;
    }
}
function getBookingsOfCustomers()
{
    $conn = connectDB();
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $sql = "SELECT vp.*
        FROM vp
        INNER JOIN bookings ON vp.vp_id = bookings.vp_id
        WHERE bookings.customer_id = (
            SELECT customer_id FROM customers WHERE user_id = $user_id
        )";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $packages;
    }
}