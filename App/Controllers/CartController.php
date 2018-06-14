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

	public function addAction(){
		// Set time of adding item to cookie
		$posttime = time();

		$toCookie = array(
			"id" => $_POST['productId'],
			"name" => $_POST['productName'],
			"price" => $_POST['salesPrice'],
			"amount" => $_POST['amount']
		);
		$json = json_encode($toCookie);
		setcookie(1, $json);

		$cookies = $_COOKIE[1];
		var_dump(json_decode($cookies, true));

	}
}