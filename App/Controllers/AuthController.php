<?php

namespace App\Controllers;

use App\Models\Product;
use \Core\View;
use App\Models\Auth;

/**
 * HomeController controller
 *
 * PHP version 7.0
 */
class AuthController extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function loginAction()
    {
        if (isset($_POST['Username']) && isset($_POST['Password'])) {
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            $_SESSION["username"] = Auth::login($username, $password);

            if(!isset( $_SESSION["username"]) ||  $_SESSION["username"] = '' ){
                $responseArray = array('result' => 'fail');
                $encoded = json_encode($responseArray);
                header('Content-Type: application/json');
                echo $encoded;
            }
            else
            {
                $responseArray = array('result' => 'success');
                $encoded = json_encode($responseArray);
                header('Content-Type: application/json');
                echo $encoded;
            }
        }
        else
        {
            view::renderTemplate('Auth/login.html');
        }
    }
}
