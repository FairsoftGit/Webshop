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

    private $productId;
    private $productName;
    private $productDesc;
    private $salesPrice;
    private $imgUrl;


    public static function constructFromDatabase($id)
    {
        $db = static::getDB();

        $stmt = $db->prepare('select `productId`, `productName`, `productDesc`, `salesPrice`, `imgUrl` from `product` WHERE `productId` = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
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
    }
    public function getImgUrl()
    {
        return $this->imgUrl;
    }
}
