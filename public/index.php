<?php
/*test*/
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
$languagePattern = '{language:^[a-zA-Z][a-zA-Z]}';
$idPattern = '{id:\d+}';

//General
$router->add($languagePattern . '/login', ['controller' => 'accountController', 'action' => 'login', 'namespace' => 'General']);

//Fairsoft
$router->add($languagePattern, ['controller' => 'PageController', 'action' => 'aboutUs', 'namespace' => 'Fairsoft']);
//$router->add('aboutUs', ['controller' => 'PageController', 'action' => 'aboutUs', 'namespace' => 'Fairsoft']);
//$router->add('contact', ['controller' => 'PageController', 'action' => 'contact', 'namespace' => 'Fairsoft']);
//$router->add('fairApp', ['controller' => 'PageController', 'action' => 'fairApp', 'namespace' => 'Fairsoft']);
//$router->add('fairBox/' . $idPattern, ['controller' => 'ProductController', 'action' => 'index', 'namespace' => 'Fairsoft']);
//$router->add('fairData', ['controller' => 'PageController', 'action' => 'fairData', 'namespace' => 'Fairsoft']);
//$router->add('fairGoggles', ['controller' => 'PageController', 'action' => 'fairGoggles', 'namespace' => 'Fairsoft']);
//$router->add('fairPayPlan', ['controller' => 'PageController', 'action' => 'fairPayPlan', 'namespace' => 'Fairsoft']);
//$router->add('fairRent', ['controller' => 'PageController', 'action' => 'fairRent', 'namespace' => 'Fairsoft']);
//$router->add('fairVest/{id:\d+}', ['controller' => 'ProductController', 'action' => 'index', 'namespace' => 'Fairsoft']);
//$router->add('faq', ['controller' => 'PageController', 'action' => 'faq', 'namespace' => 'Fairsoft']);
//$router->add('howItWorks', ['controller' => 'PageController', 'action' => 'howItWorks', 'namespace' => 'Fairsoft']);
//$router->add('orderAndDelivery', ['controller' => 'PageController', 'action' => 'orderAndDelivery', 'namespace' => 'Fairsoft']);
//$router->add('payments', ['controller' => 'PageController', 'action' => 'payments', 'namespace' => 'Fairsoft']);
//$router->add('sitemap', ['controller' => 'PageController', 'action' => 'sitemap', 'namespace' => 'Fairsoft']);
//$router->add('techSupport', ['controller' => 'PageController', 'action' => 'techSupport', 'namespace' => 'Fairsoft']);
//$router->add('terms', ['controller' => 'PageController', 'action' => 'terms', 'namespace' => 'Fairsoft']);
//$router->add('shop/addProduct/{id:\d+}', ['controller' => 'shopController', 'action' => 'addProduct' , 'namespace' => 'Fairsoft']);
////
////Fairboard
//$router->add('Fairboard', ['controller' => 'PageController', 'action' => 'Fairboard', 'namespace' => 'Fairboard']);
//$router->add('roles', ['controller' => 'RoleController', 'action' => 'index', 'namespace' => 'Fairboard']);
//$router->add('role/add', ['controller' => 'RoleController', 'action' => 'add', 'namespace' => 'Fairboard']);
//$router->add('permissions', ['controller' => 'PermissionController', 'action' => 'index', 'namespace' => 'Fairboard']);
//$router->add('permission/add', ['controller' => 'PermissionController', 'action' => 'add', 'namespace' => 'Fairboard']);
//$router->add('products', ['controller' => 'ProductController', 'action' => 'index', 'namespace' => 'Fairboard']);
//$router->add('Product/add', ['controller' => 'ProductController', 'action' => 'add', 'namespace' => 'Fairboard']);
//$router->add('Product/delete', ['controller' => 'ProductController', 'action' => 'delete', 'namespace' => 'Fairboard']);
//$router->add('items', ['controller' => 'ItemController', 'action' => 'index', 'namespace' => 'Fairboard']);
//$router->add('item/add', ['controller' => 'ItemController', 'action' => 'add', 'namespace' => 'Fairboard']);
//
//$router->add('', ['controller' => 'PageController', 'action' => 'aboutUs', 'namespace' => 'Fairsoft']);
//$router->add('{language:\d+}', ['controller' => 'ProductController', 'action' => 'index', 'namespace' => 'Fairsoft']);

if(!session_id())
{
    session_start();
}

$router->dispatch($_SERVER['QUERY_STRING']);