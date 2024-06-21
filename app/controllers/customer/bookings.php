<?php

require_once ("app/models/customerModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $bookingId = $_POST['booking_id'];
    if (deleteBooking($bookingId)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete booking.']);
    }
    exit();
}



$bookings = getBookings();
if ($bookings) {
    require ("app/views/bookings.php");
} else {
    echo "No Bookings";
}