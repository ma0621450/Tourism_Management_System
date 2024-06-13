<?php
require "app/config/database.php";
function getAllPackages()
{
    try {
        $conn = connectDB();
        $stmt = $conn->query("SELECT *
    FROM vp");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getCustomerid()
{
    try {
        $conn = connectDB();
        $user_id = $_SESSION["user"]['user_id'];
        $sql_get_customer_id = "SELECT customer_id FROM customers WHERE user_id = $user_id";
        $stmt = $conn->prepare($sql_get_customer_id);
        $stmt->execute();
        $customer_id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $customer_id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function bookPackage()
{
    try {
        $conn = connectDB();
        if (isset($_GET['vp_id'])) {
            $vp_id = $_GET['vp_id'];
        }
        $customer_id = getCustomerid();
        $id = $customer_id['customer_id'];
        $sql_insert_booking = "INSERT INTO bookings (customer_id, vp_id) VALUES ($id, $vp_id )";
        $stmt = $conn->prepare($sql_insert_booking);
        $result = $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getAllDestinations()
{
    $conn = connectDB();
    $query = "SELECT * FROM destinations";
    $stmt = $conn->query($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllServices()
{
    $conn = connectDB();
    $query = "SELECT * FROM services";
    $stmt = $conn->query($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function singlePackage()
{
    if (isset($_GET['vp_id'])) {
        $vp_id = $_GET['vp_id'];



        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM vp WHERE vp_id = $vp_id");
        $stmt->execute();

        return $package = $stmt->fetch(PDO::FETCH_ASSOC);

    }
}

function getVpInfo()
{
    $conn = connectDB();
    $vp_id = $_GET['vp_id'];
    $query = "
    SELECT DISTINCT s.description AS service_description, d.name AS destination_name
    FROM vp_info vp
    JOIN services s ON vp.services_id = s.service_id
    JOIN destinations d ON vp.destination_id = d.destination_id
    WHERE vp.vp_id = $vp_id
    ";
    $stmt = $conn->query($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getBookings()
{
    $conn = connectDB();
    $customer_id = getCustomerid();
    $id = $customer_id['customer_id'];
    $sql_fetch_bookings = "SELECT b.id,vp.vp_id, vp.title AS vacation_title, vp.start_date, vp.end_date,vp.price
    FROM bookings AS b
    INNER JOIN vp ON b.vp_id = vp.vp_id
    WHERE b.customer_id = $id";
    $stmt = $conn->prepare($sql_fetch_bookings);
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $bookings;
}

function createInquiry($subject, $message)
{
    try {
        $conn = connectDB();
        $customer_id = getCustomerid();
        $id = $customer_id['customer_id'];

        $subject = $conn->quote($subject);
        $message = $conn->quote($message);

        $sql_insert_inquiry = "INSERT INTO inquiry_table (customer_id, subject, message) VALUES ($id, $subject, $message)";
        $stmt = $conn->prepare($sql_insert_inquiry);
        $result = $stmt->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getInquiry()
{
    try {
        $conn = connectDB();
        $customer_id_array = getCustomerid();
        $customer_id = $customer_id_array['customer_id'];
        if (isset($_GET['vp_id'])) {
            $vp_id = $_GET['vp_id'];
        }
        var_dump($vp_id);

        $sql_insert_inquiry = "SELECT * FROM inquiry_table where customer_id = $customer_id";
        $stmt = $conn->prepare($sql_insert_inquiry);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}