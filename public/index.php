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
$router->add('', ['controller' => 'page', 'action' => 'aboutUs']);
$router->add('aboutUs', ['controller' => 'page', 'action' => 'aboutUs']);
$router->add('contact', ['controller' => 'page', 'action' => 'contact']);
$router->add('fairApp', ['controller' => 'page', 'action' => 'fairApp']);
$router->add('fairBox', ['controller' => 'page', 'action' => 'fairBox']);
$router->add('fairData', ['controller' => 'page', 'action' => 'fairData']);
$router->add('fairGoggles', ['controller' => 'page', 'action' => 'fairGoggles']);
$router->add('fairPayPlan', ['controller' => 'page', 'action' => 'fairPayPlan']);
$router->add('fairRent', ['controller' => 'page', 'action' => 'fairRent']);
$router->add('fairVest', ['controller' => 'page', 'action' => 'fairVest']);
$router->add('faq', ['controller' => 'page', 'action' => 'faq']);
$router->add('howItWorks', ['controller' => 'page', 'action' => 'howItWorks']);
$router->add('orderAndDelivery', ['controller' => 'page', 'action' => 'orderAndDelivery']);
$router->add('payments', ['controller' => 'page', 'action' => 'payments']);
$router->add('sitemap', ['controller' => 'page', 'action' => 'sitemap']);
$router->add('techSupport', ['controller' => 'page', 'action' => 'techSupport']);
$router->add('terms', ['controller' => 'page', 'action' => 'terms']);
$router->add('{controller}/{action}');

if(!session_id())
{
    session_start();
}

$router->dispatch($_SERVER['QUERY_STRING']);