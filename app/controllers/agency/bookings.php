<?php require ("app/models/agencyModel.php");

$bookings = getBookingsOfTravelAgencies();
require ("app/views/agency/bookings.view.php");

