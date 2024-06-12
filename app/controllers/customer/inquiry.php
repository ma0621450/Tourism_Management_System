<?php

require ("app/models/customerModel.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $result = createInquiry($subject, $message);
}

$inquiries = getInquiry();

require ("app/views/inquiry.php");