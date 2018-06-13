<?php
/**
 * Created by PhpStorm.
 * User: SightVision
 * Date: 12-6-2018
 * Time: 09:45
 */

namespace App\Models;

use Models\Product;
use PDO;

class Cart extends \Core\Model
{
	private $items = [];


	public function addItem($id, $name, $price, $amount)
	{
		$this->items->id = $id;
		$this->items->name = $name;
		$this->items->price = $price;
		$this->items->amount = $amount;
	}


	/* define properties
	private $test = 'Test geslaagd, Jeroen!';
	private $productId;
	private $productName;
	private $salesPrice;
	private $amount;

	// define methods
	public function emptyCart(){}

	public function test(){
		return $this->test;
	}*/

}