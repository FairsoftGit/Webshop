<?php

namespace App\Controllers;
use App\Models\Product;
use \Core\View;

/**
 * HomeController controller
 *
 * PHP version 7.0
 */
class ProductController extends \Core\Controller
{
    /**
     * Before filter. Return false to stop the action from executing.
     *
     * @return void
     */
    protected function before()
    {
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {


        $id = $this->route_params["id"];
        $product = Product::constructFromDatabase($id);
        View::renderTemplate('Product/index.html', ["product" => $product]);
    }

}
