<?php



require_once 'app/models/agencyModel.php';


$destinations = getAllDestinations();


$services = getAllServices();

require ("app/views/agency/packages.view.php");
