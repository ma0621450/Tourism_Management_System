<?php
require_once ("app/models/customerModel.php");



$services = getAllServices();
$destinations = getAllDestinations();

$package = singlePackage();
$vp_info = getVpInfo();


require ("app/views/package.php");