<?php

require_once 'app/config/database.php';

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
function getAgencyIdFromUserId($user_id)
{
    try {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT travel_agency_id FROM travel_agencies WHERE user_id = $user_id");
        $stmt->execute();
        $agency_data = $stmt->fetch();

        if ($agency_data) {
            return $agency_data['travel_agency_id'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        $e->getMessage();
        return null;
    }
}



function createPackage($title, $description, $services, $destinations, $persons, $price, $start_date, $end_date)
{
    try {
        $user_id = $_SESSION['user']['user_id'];
        $travel_agency_id = getAgencyIdFromUserId($user_id);
        $conn = connectDB();
        $query = "INSERT INTO vp (travel_agency_id, title, description, persons, price, start_date, end_date) 
              VALUES ('$travel_agency_id','$title', '$description', '$persons', '$price', '$start_date', '$end_date')";
        $conn->query($query);

        $package_id = $conn->lastInsertId();

        foreach ($services as $service_id) {
            foreach ($destinations as $destination_id) {
                $query = "INSERT INTO vp_info (vp_id, services_id, destination_id) 
                          VALUES ('$package_id', '$service_id', '$destination_id')";
                $conn->query($query);
            }
        }

        return $query;

    } catch (PDOException $e) {
        var_dump($e->getMessage());
        return false;
    }


}