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

function addServices($s_desc)
{
    try {
        $conn = connectDB();

        $query = "INSERT INTO services (description) VALUES (:s_desc)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':s_desc', $s_desc, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function getServices()
{
    $conn = connectDB();
    $query = "SELECT * FROM services";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}
function getDestinations()
{
    $conn = connectDB();
    $query = "SELECT * FROM destinations";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $destinations;
}
function addDestinations($d_name)
{
    try {
        $conn = connectDB();
        $query = "INSERT INTO destinations (name) VALUES ('$d_name');";
        $stmt = $conn->prepare($query);
        $results = $stmt->execute();
        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}





function delServices($service_id)
{
    try {
        $conn = connectDB();
        $query = "DELETE FROM services where service_id = :service_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $results = $stmt->execute();
        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function delDestination($destination_id)
{
    try {
        $conn = connectDB();
        $query = "DELETE FROM destinations where destination_id = :destination_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':destination_id', $destination_id, PDO::PARAM_INT);
        $results = $stmt->execute();
        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function blockUser($user_id)
{
    try {
        $conn = connectDB();
        $query = "UPDATE users SET deleted_at = NOW() WHERE user_id = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $results = $stmt->execute();
        return $results;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function unblockUser($user_id)
{
    try {
        $conn = connectDB();
        $query = "UPDATE users SET deleted_at = NULL WHERE user_id = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $results = $stmt->execute();
        return $results;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}