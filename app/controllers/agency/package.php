<?php

require_once 'app/models/agencyModel.php';

$package = singlePackage();

$vp_info = getVpInfo();
require ("app/views/agency/single_package.view.php");