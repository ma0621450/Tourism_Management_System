<?php

$router->get('/', 'app/controllers/customer/index.php');

$router->get('register', 'app/controllers/auth/register.php');
$router->post('register', 'app/controllers/auth/register.php');

$router->get('login', 'app/controllers/auth/login.php');
$router->post('login', 'app/controllers/auth/login.php');

$router->get('logout', 'app/controllers/auth/destroy.php');


$router->get('Agency_Packages', 'app/controllers/agency/index.php');

$router->get('single_package', 'app/controllers/agency/package.php');
$router->post('single_package', 'app/controllers/agency/update.php');


$router->post('Agency_Packages', 'app/controllers/agency/create.php');
$router->get('a_inquiry', 'app/controllers/agency/inquiry.php');
$router->post('a_inquiry', 'app/controllers/agency/inquiry.php');
$router->get('package_bookings', 'app/controllers/agency/bookings.php');


$router->get('package', 'app/controllers/customer/package.php');
$router->post('package', 'app/controllers/customer/create.php');
$router->post('package', 'app/controllers/customer/create.php');

$router->get('bookings', 'app/controllers/customer/bookings.php');

$router->get('inquiry', 'app/controllers/customer/inquiry.php');
$router->post('inquiry', 'app/controllers/customer/inquiry.php');


$router->post('delete_inquiry', 'app/controllers/customer/delete_inquiry.php');


$router->get('admin', 'app/controllers/admin/index.php');
$router->get('admin_package', 'app/controllers/admin/package.php');
$router->get('admin_bookings', 'app/controllers/admin/bookings.php');



