<?php
require ("app/models/adminModel.php");

$bookings = getBookingsOfCustomers();

require ("app/views/admin/bookings.view.php");
