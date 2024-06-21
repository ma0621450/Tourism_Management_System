<?php
require 'app/models/customerModel.php';
require 'app/validator/Validator.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $vp_id = isset($_GET['vp_id']) ? intval($_GET['vp_id']) : null;

    if (!Validator::string($subject, 3, 50)) {
        $errors['subject'] = 'Subject is required and must be between 3 and 50 characters.';
    }
    if (!Validator::string($message, 10, 500)) {
        $errors['message'] = 'Message should be between 10 and 500 characters.';
    }

    if (empty($errors)) {
        $result = createInquiry($subject, $message, $vp_id);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'errors' => ['general' => 'Failed to create inquiry.']]);
        }
    } else {
        echo json_encode(['success' => false, 'errors' => $errors]);
    }
    exit;
}

$inquiries = getInquiry();
require 'app/views/inquiry.php';
