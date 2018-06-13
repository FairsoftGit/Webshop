<?php
/**
 * Created by PhpStorm.
 * User: SightVision
 * Date: 12-6-2018
 * Time: 09:46
 */

namespace App\Controllers;
use App\Models\Cart;
use \Core\View;

class CartController extends \Core\Controller
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
		$cart = new Cart;
		View::renderTemplate('Cart/index.html', ["cart" => $cart]);
	}

	public function add_to_cartAction()
	{
		$cart = new Cart;
		View::renderTemplate('Cart/index.html', ["cart" => $cart,
			""]);
	}

}