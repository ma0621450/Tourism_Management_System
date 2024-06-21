<?php

require_once ("app/models/agencyModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    header('Content-Type: application/json');
    $bookingId = $_POST['booking_id'];
    if (deleteAgencyBooking($bookingId)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to cancel booking.']);
    }
    exit();
}

$bookings = getBookingsOfTravelAgencies();
require ("app/views/agency/bookings.view.php");

