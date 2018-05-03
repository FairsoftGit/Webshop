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
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Product/index.html', ['products' => Product::getAll() ]);
    }

    public function editAction()
    {
        if(isset($_GET['Id']))
        {
            $id = intval($_GET['Id']);
            View::renderTemplate('Product/edit.html', ['product' => Product::get($id)]);
        }
    }

    public function addAction()
    {
        View::renderTemplate('Product/add.html');
    }

    public function updateAction()
    {
        if (isset($_POST['Id']) && isset($_POST['Name']) && isset($_POST['Price']))
        {
            $id = intval($_POST['Id']);
            $name = $_POST['Name'];
            $price = intval($_POST['Price']);

            $responseArray = array('result' => Product::update($id, $name, $price), 'type' => 'Product');

            $encoded = json_encode($responseArray);
            header('Content-Type: application/json');
            echo $encoded;
        }
    }

    public function insertAction()
    {
        if (isset($_POST['Name']) && isset($_POST['Price']))
        {
            $name = $_POST['Name'];
            $price = intval($_POST['Price']);

            $responseArray = array('result' => Product::insert($name, $price), 'type' => 'Product');

            $encoded = json_encode($responseArray);
            header('Content-Type: application/json');
            echo $encoded;
        }
    }

    public function deleteAction()
    {
        if(isset($_GET['Id']))
        {
            $id = intval($_GET['Id']);
            Product::delete($id);
            header('location: /product/index');
        }
    }

}
