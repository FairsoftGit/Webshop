<?php

namespace App\Controllers\Fairsoft;

use App\Models\Product;
use \Core\View;

/**
 * PageController
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

    public function indexAction()
    {
        $id = $this->route_params["id"];
        $product = Product::constructFromId($id);
        $image = $product->getImage(2, '.png');
        View::renderTemplate('Fairsoft/Product/index.html', ["product" => $product, "image" => $image]);
    }
}
