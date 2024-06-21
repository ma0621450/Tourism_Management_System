<?php
// require ("./app/config/seeder.php");

session_start();



require 'Router.php';
$router = new Router();

require 'routes.php';

$uri = isset($_GET['url']) ? $_GET['url'] : '/';
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);


