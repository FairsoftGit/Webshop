<?php

namespace App\Controllers;

use \Core\View;

/**
 * HomeController controller
 *
 * PHP version 7.0
 */
class HomeController extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Home/index.html');
    }
}
