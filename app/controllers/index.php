<?php
$role = isset($_SESSION['user']['role_id']) ? $_SESSION['user']['role_id'] : null;

if ($role == 3) {
    require ("app/controller/index.php");
}
if ($role == 2) {
    header("location: Agency_Packages");
}
if ($role == 1) {
    require ("app/controllers/admin/index.php");
}
if (!$role) {
    header("location: /");
}
