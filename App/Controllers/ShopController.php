<?php

namespace App\Controllers;
use \Core\View;

/**
 * HomeController controller
 *
 * PHP version 7.0
 */
class ShopController extends \Core\Controller
{
    public function addProductAction()
    {
        $productId = $this->route_params["id"];

        $_SESSION['cart_products'][] = array('id'=>1234, 'quantity'=>10);

        View::renderTemplate('Page/test.html');
    }
}
