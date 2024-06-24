<?php

function authenticate()
{
    if (!isset($_SESSION['user'])) {
        return false;
    }
    return true;
}

function authorize($requiredRole)
{
    if (!authenticate()) {
        abort(401);
    }
    $user = $_SESSION['user'];
    if ($user['role_id'] != $requiredRole) {
        abort(403);
    }
}
function authorizeGuestOrCustomer()
{
    if (!authenticate()) {
        return;
    }
    $user = $_SESSION['user'];
    if ($user['role_id'] != 3) {
        abort(403);
    }
}


function getUserHomeRoute()
{
    if (authenticate()) {
        $user = $_SESSION['user'];
        $role = $user['role_id'];


        switch ($role) {
            case 1:
                return 'admin';
            case 2:
                return 'Agency_Packages';
            case 3:
                return '/Vacation_Management/';
            default:
                return '/Vacation_Management/';
        }
    }
}


function abort($code = 404)
{
    http_response_code($code);
    include __DIR__ . "/../views/errors/$code.php";
    die();
}
