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

    public static function constructFromDatabase($id)
    {
        $db = static::getDB();

        $stmt = $db->prepare('select `productId`, `productName`, `productDesc`, `salesPrice`, `imgUrl` from `product` WHERE `productId` = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject('App\Models\Product' ,['productId', 'productName', 'productDesc', 'salesPrice', 'imgUrl']);
    }

}
