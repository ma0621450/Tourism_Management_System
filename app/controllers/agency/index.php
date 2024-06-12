<?php



require_once 'app/models/agencyModel.php';


$destinations = getAllDestinations();


$services = getAllServices();

$packages = getAllPackages();


require ("app/views/agency/packages.view.php");