<?php
require ("app/models/adminModel.php");

$customers = getAllCustomers();
$agencies = getAllAgencies();
require ("app/views/admin/users.view.php");
