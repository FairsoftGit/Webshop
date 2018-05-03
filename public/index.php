<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

$router->add('', ['controller' => 'home', 'action' => 'index']);
$router->add('{controller}/{action}');


if(!session_id())
{
    session_start();
}

if(!isset($_SESSION["username"]))
{
    $_SERVER['QUERY_STRING'] = 'auth/login';
}

$router->dispatch($_SERVER['QUERY_STRING']);