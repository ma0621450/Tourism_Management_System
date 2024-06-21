<?php
require_once ("app/models/agencyModel.php");

$inquiries = getInquiries();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inquiry_id = intval($_POST['inquiry_id']);
    $response = htmlspecialchars($_POST['response']);

    $result = inquiryResponse($inquiry_id, $response);

    if ($result) {
        $responseMessage = 'Response sent successfully.';
    } else {
        $responseMessage = 'Failed to send response.';
    }

    $jsonResponse = [
        'success' => $result,
        'message' => $responseMessage
    ];

    header('Content-Type: application/json');
    echo json_encode($jsonResponse);
    exit;
}

require_once ("app/views/agency/inquiry.php");
