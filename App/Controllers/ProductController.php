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
        if(!$this->isAuthenticated()){
            header('location: /account/login');
            return false;
        }
       $account = $_SESSION['account'];
       return $account->hasPrivilege("product");
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Product/index.html', ['products' => Product::getAll(), 'account' => $_SESSION['account'] ]);
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
        if(isset($_POST['id']))
        {
            $id = intval($_POST['id']);
            Product::delete($id);
            header('location: /product/index');
        }
    }

}
