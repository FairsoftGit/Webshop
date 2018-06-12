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
 * Error and Exception handlingloc
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
$router->add('fairApp/{id:\d+}', ['controller' => 'product', 'action' => 'index']);
$router->add('fairBox/{id:\d+}', ['controller' => 'product', 'action' => 'index']);
$router->add('fairData', ['controller' => 'page', 'action' => 'fairData']);
$router->add('fairGoggles/{id:\d+}', ['controller' => 'product', 'action' => 'index']);
$router->add('fairPayPlan', ['controller' => 'page', 'action' => 'fairPayPlan']);
$router->add('fairRent', ['controller' => 'page', 'action' => 'fairRent']);
$router->add('fairVest/{id:\d+}', ['controller' => 'product', 'action' => 'index']);
$router->add('faq', ['controller' => 'page', 'action' => 'faq']);
$router->add('howItWorks', ['controller' => 'page', 'action' => 'howItWorks']);
$router->add('orderAndDelivery', ['controller' => 'page', 'action' => 'orderAndDelivery']);
$router->add('payments', ['controller' => 'page', 'action' => 'payments']);
$router->add('sitemap', ['controller' => 'page', 'action' => 'sitemap']);
$router->add('techSupport', ['controller' => 'page', 'action' => 'techSupport']);
$router->add('terms', ['controller' => 'page', 'action' => 'terms']);

$router->add('cart', ['controller' => 'cart', 'action' => 'index']);
$router->add('add_to_cart', ['controller' => 'cart', 'action' => 'add_to_cart']);
$router->add('shop/addProduct/{id:\d+}', ['controller' => 'shop', 'action' => 'addProduct']);

if(!session_id())
{
    session_start();
}

$router->dispatch($_SERVER['QUERY_STRING']);