<?php

require_once 'app/models/agencyModel.php';

$package = singlePackage();

$vp_info = getVpInfo();

$destinations = getAllDestinations();


$services = getAllServices();

$packages = getAllPackages();

require ("app/views/agency/single_package.view.php");