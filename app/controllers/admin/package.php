<?php
require ("app/models/adminModel.php");

$packages = getPackagesOfAgencies();

require ("app/views/admin/packages.view.php");

