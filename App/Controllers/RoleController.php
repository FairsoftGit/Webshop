<?php

namespace App\Controllers;
use App\Models\Role;
use \Core\View;

/**
 * HomeController controller
 *
 * PHP version 7.0
 */
class RoleController extends \Core\Controller
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
        View::renderTemplate('Role/index.html', ['roles' => Role::getAll(), 'account' => $_SESSION['account'] ]);
    }

    public function addAction()
    {
        View::renderTemplate('Role/add.html');
    }

    public function insertAction()
    {
        if (isset($_POST['Role']))
        {
            $role = $_POST['Role'];
            $responseArray = array('result' => Role::insert($role), 'type' => 'Rol');

            $encoded = json_encode($responseArray);
            header('Content-Type: application/json');
            echo $encoded;
        }
    }

    public function deleteAction()
    {
        if(isset($_POST['Key']))
        {
            $key = $_POST['Key'];
            $responseArray = array('result' => Role::delete($key), 'type' => 'Rol');

            $encoded = json_encode($responseArray);
            header('Content-Type: application/json');
            echo $encoded;

        }
    }

}
