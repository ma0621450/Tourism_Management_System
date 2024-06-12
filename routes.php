<?php

$router->get('/', 'app/controllers/customer/index.php');

$router->get('register', 'app/controllers/auth/register.php');
$router->post('register', 'app/controllers/auth/register.php');

$router->get('login', 'app/controllers/auth/login.php');
$router->post('login', 'app/controllers/auth/login.php');

$router->get('logout', 'app/controllers/auth/destroy.php');


$router->get('Agency_Packages', 'app/controllers/agency/index.php');
$router->get('single_package', 'app/controllers/agency/package.php');
$router->post('Agency_Packages', 'app/controllers/agency/create.php');


$router->get('package', 'app/controllers/customer/package.php');
$router->post('package', 'app/controllers/customer/create.php');
$router->post('package', 'app/controllers/customer/create.php');

$router->get('bookings', 'app/controllers/customer/bookings.php');

$router->get('inquiry', 'app/controllers/customer/inquiry.php');
$router->post('inquiry', 'app/controllers/customer/inquiry.php');