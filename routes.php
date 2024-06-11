<?php

$router->get('/', 'app/controllers/index.php');

$router->get('register', 'app/controllers/auth/register.php');
$router->post('register', 'app/controllers/auth/register.php');

$router->get('login', 'app/controllers/auth/login.php');
$router->post('login', 'app/controllers/auth/login.php');

$router->get('logout', 'app/controllers/auth/destroy.php');


$router->get('Agency_Packages', 'app/controllers/agency/index.php');
$router->post('Agency_Packages', 'app/controllers/agency/create.php');


