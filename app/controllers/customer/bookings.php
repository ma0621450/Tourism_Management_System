<?php

require_once ("app/models/customerModel.php");

$bookings = getBookings();
if ($bookings) {
    require ("app/views/bookings.php");
} else {
    echo "No Bookings";
}