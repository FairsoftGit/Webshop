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

	// define properties
	private $test = 'Test geslaagd, Jeroen!';
	private $productId;
	private $productName;
	private $salesPrice;
	private $amount;

	// define methods
	public function emptyCart(){}

	public function test(){
		return $this->test;
	}

}