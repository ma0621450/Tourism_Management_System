<?php require ("app/models/agencyModel.php");

$inquiries = getInquiries();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inquiry_id = intval($_POST['inquiry_id']);
    $response = htmlspecialchars($_POST['response']);

    $result = inquiryResponse($inquiry_id, $response);
}


?>
<?php require ("app/views/agency/inquiry.php"); ?>