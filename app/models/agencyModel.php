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
        $agency = $stmt->fetch();
        return $agency ? $agency['travel_agency_id'] : null;
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

function getAllPackages()
{
    try {
        $conn = connectDB();
        $user_id = $_SESSION['user']['user_id'];
        $travel_agency_id = getAgencyIdFromUserId($user_id);
        $stmt = $conn->query("SELECT * FROM vp where travel_agency_id = $travel_agency_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $e->getMessage();
        return null;
    }
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

function getBookingsOfTravelAgencies()
{
    try {
        $conn = connectDB();
        $user_id = $_SESSION['user']['user_id'];
        $travel_agency_id = getAgencyIdFromUserId($user_id);

        $sql = "
       SELECT 
    b.id,
    vp.vp_id,
    vp.title,
    vp.description,
    vp.persons,
    vp.price,
    vp.start_date,
    vp.end_date
FROM 
    bookings b
JOIN 
    vp ON b.vp_id = vp.vp_id
WHERE 
    vp.travel_agency_id = $travel_agency_id
ORDER BY 
    vp.start_date ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $bookings;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function deleteAgencyBooking($bookingId)
{
    $conn = connectDB();

    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = :id");
    $stmt->bindParam(':id', $bookingId, PDO::PARAM_INT);
    return $stmt->execute();
}



function getInquiries()
{
    try {
        $conn = connectDB();
        $user_id = $_SESSION['user']['user_id'];
        $travel_agency_id = getAgencyIdFromUserId($user_id);
        $sql = "SELECT
                    inquiry_table.id,
                    inquiry_table.customer_id,
                    inquiry_table.subject,
                    inquiry_table.message,
                    inquiry_table.response,
                    inquiry_table.created_at,
                    inquiry_table.updated_at,
                    vp.vp_id,
                    vp.travel_agency_id
                FROM
                    inquiry_table
                JOIN
                    vp ON inquiry_table.vp_id = vp.vp_id
                WHERE
                    vp.travel_agency_id = :travel_agency_id ";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':travel_agency_id', $travel_agency_id);
        $stmt->execute();

        // Fetch all inquiries
        $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $inquiries;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


function inquiryResponse($inquiry_id, $response)
{
    try {
        $conn = connectDB();
        $sql_update = "UPDATE inquiry_table SET response = :response, updated_at = CURRENT_TIMESTAMP WHERE id = :inquiry_id";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bindParam(':response', $response, PDO::PARAM_STR);
        $stmt_update->bindParam(':inquiry_id', $inquiry_id, PDO::PARAM_INT);
        $result = $stmt_update->execute();
        return $result;
    } catch (PDOException $e) {
        echo 'Failed to send response' . $e->getMessage();
    }
}

function updatePackage($vp_id, $title, $description, $services, $destinations, $persons, $price, $start_date, $end_date)
{

    try {
        $conn = connectDB();

        $sql_fetch_current = "SELECT * FROM vp WHERE vp_id = :vp_id";
        $stmt = $conn->prepare($sql_fetch_current);
        $stmt->bindParam(':vp_id', $vp_id);
        $stmt->execute();
        $current_values = $stmt->fetch(PDO::FETCH_ASSOC);



        $title = !empty($title) ? $title : $current_values['title'];
        $description = !empty($description) ? $description : $current_values['description'];
        $persons = !empty($persons) ? $persons : $current_values['persons'];
        $price = !empty($price) ? $price : $current_values['price'];
        $start_date = !empty($start_date) ? $start_date : $current_values['start_date'];
        $end_date = !empty($end_date) ? $end_date : $current_values['end_date'];



        $sql_update_vp = "
        UPDATE vp
        SET
            title = :title,
            description = :description,
            persons = :persons,
            price = :price,
            start_date = :start_date,
            end_date = :end_date
        WHERE
            vp_id = :vp_id
    ";

        $stmt = $conn->prepare($sql_update_vp);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':persons', $persons);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':vp_id', $vp_id);
        $stmt->execute();




        $sql_fetch_vp_info = "SELECT * FROM vp_info WHERE vp_id = :vp_id";
        $stmt = $conn->prepare($sql_fetch_vp_info);
        $stmt->bindParam(':vp_id', $vp_id);
        $stmt->execute();
        $current_vp_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //if the new services and destinations are provided
        if (empty($services) && !empty($current_vp_info)) {
            $services = array_unique(array_column($current_vp_info, 'services_id'));
        }
        if (empty($destinations) && !empty($current_vp_info)) {
            $destinations = array_unique(array_column($current_vp_info, 'destination_id'));
        }

        //Deleting existing vp_info records
        $sql_delete_vp_info = "
        DELETE FROM vp_info
        WHERE vp_id = :vp_id
    ";

        $stmt = $conn->prepare($sql_delete_vp_info);
        $stmt->bindParam(':vp_id', $vp_id);
        $stmt->execute();

        //Inserting new records into vp_info
        $sql_insert_vp_info = "
        INSERT INTO vp_info (vp_id, services_id, destination_id)
        VALUES (:vp_id, :services_id, :destination_id)
    ";

        $stmt = $conn->prepare($sql_insert_vp_info);

        //Inserting all services and destinations
        foreach ($services as $service_id) {
            foreach ($destinations as $destination_id) {
                $stmt->bindParam(':vp_id', $vp_id);
                $stmt->bindParam(':services_id', $service_id);
                $stmt->bindParam(':destination_id', $destination_id);
                $stmt->execute();
            }
        }
        echo "Vacation package and associated info updated successfully.";
        return $stmt;

    } catch (Exception $e) {
        echo "Failed to update vacation package: " . $e->getMessage();
    }
}

function updateUser($username)
{
    $conn = connectDB();
    $user_id = $_SESSION['user']['user_id'];
    $query = "UPDATE users SET username = :username  WHERE user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
}

function updateAgency($agency_name, $agency_desc)
{
    $conn = connectDB();
    $user_id = $_SESSION['user']['user_id'];
    $query = "UPDATE travel_agencies SET agency_name = :agency_name, agency_desc = :agency_desc WHERE user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':agency_name', $agency_name);
    $stmt->bindParam(':agency_desc', $agency_desc);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
}

function fetchUserInfo()
{
    $user_id = $_SESSION['user']['user_id'];
    $conn = connectDB();

    $queryUser = "SELECT username FROM users WHERE user_id = :user_id";
    $stmtUser = $conn->prepare($queryUser);
    $stmtUser->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmtUser->execute();
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

    $queryAgency = "SELECT agency_name, agency_desc FROM travel_agencies WHERE user_id = :user_id";
    $stmtAgency = $conn->prepare($queryAgency);
    $stmtAgency->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmtAgency->execute();
    $agency = $stmtAgency->fetch(PDO::FETCH_ASSOC);

    return [
        'username' => $user['username'] ?? '',
        'agency_name' => $agency['agency_name'] ?? '',
        'agency_desc' => $agency['agency_desc'] ?? ''
    ];
}
function deletePackage($vp_id)
{
    $conn = connectDB();
    $stmt = $conn->prepare("DELETE FROM vp WHERE vp_id = :vp_id");
    $stmt->bindParam(':vp_id', $vp_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
}
