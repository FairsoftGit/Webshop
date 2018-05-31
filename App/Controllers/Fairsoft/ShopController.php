<?php

namespace App\Controllers\Fairsoft;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class ShopController extends \Core\Controller
{
    public function addProductAction()
    {
        $productId = $this->route_params["id"];

        $_SESSION['cart_products'][] = array('id'=>1234, 'quantity'=>10);

        View::renderTemplate('PageController/test.html');
    }
}
