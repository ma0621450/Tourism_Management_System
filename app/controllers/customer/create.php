<?php

require ("app/models/customerModel.php");

$response = bookPackage();

if ($response) {
    header("location: bookings");
} else {
    echo 'Failed';
}