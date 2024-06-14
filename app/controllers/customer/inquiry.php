<?php
// Include necessary files or database connection
require 'app/models/customerModel.php'; // Adjust path as needed


// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $vp_id = isset($_GET['vp_id']) ? intval($_GET['vp_id']) : null;
    $result = createInquiry($subject, $message, $vp_id);
}


$inquiries = getInquiry();

require 'app/views/inquiry.php';
