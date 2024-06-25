<?php

require_once ("app/middleware/middleware.php");


$router->get('/', 'app/controllers/customer/index.php', function () {
    authorizeGuestOrCustomer();
});


$router->get('register', 'app/controllers/auth/register.php');
$router->post('register', 'app/controllers/auth/register.php');

$router->get('login', 'app/controllers/auth/login.php');
$router->post('login', 'app/controllers/auth/login.php');

$router->get('logout', 'app/controllers/auth/destroy.php');

$router->get('Agency_Packages', 'app/controllers/agency/index.php', function () {
    authenticate();
    authorize(2);
});

$router->get('single_package', 'app/controllers/agency/package.php', function () {
    authenticate();
    authorize(2);
});
$router->post('single_package', 'app/controllers/agency/update.php', function () {
    authenticate();
    authorize(2);
});

$router->post('Agency_Packages', 'app/controllers/agency/create.php', function () {
    authenticate();
    authorize(2);
});
$router->get('a_inquiry', 'app/controllers/agency/inquiry.php', function () {
    authenticate();
    authorize(2);
});
$router->post('a_inquiry', 'app/controllers/agency/inquiry.php', function () {
    authenticate();
    authorize(2);
});
$router->get('package_bookings', 'app/controllers/agency/bookings.php', function () {
    authenticate();
    authorize(2);
});
$router->post('delete_agency_booking', 'app/controllers/agency/bookings.php', function () {
    authenticate();
    authorize(2);
});
$router->get('agency_profile', 'app/controllers/agency/profile.php', function () {
    authenticate();
    authorize(2);
});
$router->post('agency_profile', 'app/controllers/agency/profile.php', function () {
    authenticate();
    authorize(2);
});

$router->get('package', 'app/controllers/customer/package.php', function () {
    authenticate();
    authorize(3);
});
$router->post('package', 'app/controllers/customer/create.php', function () {
    authenticate();
    authorize(3);
});

$router->get('bookings', 'app/controllers/customer/bookings.php', function () {
    authenticate();
    authorize(3);
});
$router->post('delete_booking', 'app/controllers/customer/bookings.php', function () {
    authenticate();
    authorize(3);
});

$router->get('inquiry', 'app/controllers/customer/inquiry.php', function () {
    authenticate();
    authorize(3);
});
$router->post('inquiry', 'app/controllers/customer/inquiry.php', function () {
    authenticate();
    authorize(3);
});

$router->post('delete_inquiry', 'app/controllers/customer/delete_inquiry.php', function () {
    authenticate();
    authorize(3);
});
$router->get('user_profile', 'app/controllers/customer/profile.php', function () {
    authenticate();
    authorize(3);
});
$router->post('user_profile', 'app/controllers/customer/profile.php', function () {
    authenticate();
    authorize(3);
});

$router->get('admin', 'app/controllers/admin/index.php', function () {
    authenticate();
    authorize(1);
});
$router->get('admin_package', 'app/controllers/admin/package.php', function () {
    authenticate();
    authorize(1);
});
$router->get('admin_bookings', 'app/controllers/admin/bookings.php', function () {
    authenticate();
    authorize(1);
});
$router->get('add_services', 'app/controllers/admin/services.php', function () {
    authenticate();
    authorize(1);
});
$router->post('add_services', 'app/controllers/admin/services.php', function () {
    authenticate();
    authorize(1);
});
$router->get('add_destinations', 'app/controllers/admin/destinations.php', function () {
    authenticate();
    authorize(1);
});