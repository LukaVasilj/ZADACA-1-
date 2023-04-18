<?php

// Load the necessary model classes
require_once 'models/City.php';
require_once 'models/Country.php';
require_once 'models/Actor.php';

// Define the available routes for the application
$routes = array(
    'default' => array(
        'controller' => 'HomeController',
        'action' => 'index'
    ),
    'city' => array(
        'controller' => 'CityController',
        'action' => 'index'
    ),
    'city/view' => array(
        'controller' => 'CityController',
        'action' => 'view'
    ),
    'country' => array(
        'controller' => 'CountryController',
        'action' => 'index'
    ),
    'country/view' => array(
        'controller' => 'CountryController',
        'action' => 'view'
    ),
    'actor' => array(
        'controller' => 'ActorController',
        'action' => 'index'
    ),
    'actor/view' => array(
        'controller' => 'ActorController',
        'action' => 'view'
    ),
);

// Parse the URL to determine the controller and action
$url = isset($_GET['url']) ? $_GET['url'] : 'default';
$url_parts = explode('/', $url);
$controller_name = ucfirst($url_parts[0]) . 'Controller';
$action_name = isset($url_parts[1]) ? $url_parts[1] : 'index';

// Check if the requested route exists, and if so, load the appropriate controller and call the requested action
if (array_key_exists($url, $routes)) {
    $controller_name = $routes[$url]['controller'];
    $action_name = $routes[$url]['action'];
}

// Load the controller and call the appropriate action
$controller_file = 'controllers/' . $controller_name . '.php';
if (file_exists($controller_file)) {
    require_once $controller_file;
    $controller = new $controller_name();
    $controller->$action_name();
} else {
    // If the requested controller doesn't exist, show an error message
    echo 'Error: Invalid URL';
}