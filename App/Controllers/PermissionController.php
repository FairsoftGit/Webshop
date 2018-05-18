<?php

namespace App\Controllers;
use App\Models\Permission;
use \Core\View;

/**
 * HomeController controller
 *
 * PHP version 7.0
 */
class PermissionController extends \Core\Controller
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
        View::renderTemplate('Permission/index.html', ['permissions' => Permission::getAll(), 'account' => $_SESSION['account'] ]);
    }

    public function addAction()
    {
        View::renderTemplate('Permission/add.html');
    }

    public function insertAction()
    {
        if (isset($_POST['Permission']))
        {
            $permission = $_POST['Permission'];

            $responseArray = array('result' => Permission::insert($permission), 'type' => 'Permissie');

            $encoded = json_encode($responseArray);
            header('Content-Type: application/json');
            echo $encoded;
        }
    }

    public function deleteAction()
    {
        if(isset($_POST['Permission']))
        {
            $permission = $_POST['Permission'];
            Permission::delete($permission);
        }
    }

}
