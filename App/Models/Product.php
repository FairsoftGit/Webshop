<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Product extends \Core\Model
{
<<<<<<< HEAD
    private $productId;
    private $productName;
    private $productDesc;
    private $salesPrice;
=======
    public $id;
    public $productName;
    public $productDesc;
    public $salesPrice;
    public $imgUrl;

    public function __construct($productId, $productName, $productDesc, $salesPrice, $imgUrl)
    {
        $this->id = $productId;
        $this->productName = $productName;
        $this->productDesc = $productDesc;
        $this->salesPrice = $salesPrice;
        $this->imgUrl = $imgUrl;
    }
>>>>>>> 63620cf3b8234c3878eb1217922ff87f29ae4f0d

    public static function constructFromDatabase($id)
    {
        $db = static::getDB();

        $stmt = $db->prepare('select `productId`, `productName`, `productDesc`, `salesPrice`, `imgUrl` from `product` WHERE `productId` = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
<<<<<<< HEAD
        return $stmt->fetchObject('App\Models\Product');
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getProductDesc()
    {
        return $this->productDesc;
    }

    public function getSalesPrice()
    {
        return $this->salesPrice;
=======
        return $stmt->fetchObject('App\Models\Product' ,['productId', 'productName', 'productDesc', 'salesPrice', 'imgUrl']);
>>>>>>> 63620cf3b8234c3878eb1217922ff87f29ae4f0d
    }

}
