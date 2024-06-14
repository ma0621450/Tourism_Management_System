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

function createInquiry($subject, $message, $vp_id)
{
    try {
        $conn = connectDB();
        $customer_id = getCustomerid();

        // Ensure customer_id is valid
        if (!$customer_id) {
            throw new Exception("Customer ID not found");
        }

        $id = $customer_id['customer_id'];
        $stmt = $conn->prepare("SELECT COUNT(*) FROM vp WHERE vp_id = :vp_id");
        $stmt->bindValue(':vp_id', $vp_id, PDO::PARAM_INT);
        $stmt->execute();
        $vpExists = $stmt->fetchColumn();

        $sql_insert_inquiry = "INSERT INTO inquiry_table (customer_id, vp_id, subject, message) VALUES (:customer_id, :vp_id, :subject, :message)";
        $stmt = $conn->prepare($sql_insert_inquiry);

        $stmt->bindValue(':customer_id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':vp_id', $vp_id, PDO::PARAM_INT);
        $stmt->bindValue(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindValue(':message', $message, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    } catch (PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
        return false;
    }
}

function getInquiry()
{
    try {
        $conn = connectDB();
        $customer_id_array = getCustomerid();
        $customer_id = $customer_id_array['customer_id'];
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
function deleteInquiry($inquiry_id)
{
    try {
        $conn = connectDB();
        $sql = "DELETE FROM inquiry_table WHERE id = :inquiry_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':inquiry_id', $inquiry_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return false;
    }
}