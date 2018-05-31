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
    private $id;
    private $name;
    private $description;
    private $purchPrice;
    private $salesPrice;
    private $rentalPrice;
    private $discount;
    private $stock;

    public function __construct($id, $name, $description, $purchPrice, $salesPrice, $rentalPrice, $discount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->purchPrice = $purchPrice;
        $this->salesPrice = $salesPrice;
        $this->rentalPrice = $rentalPrice;
        $this->discount = $discount;
    }

    public static function constructFromId($id)
    {
        $db = static::getDB();

        $stmt = $db->prepare('select * from `Product` WHERE `id` = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject('App\Models\Product');
    }

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->prepare('select *, ( SELECT count(item.id) from item where item.productId = product.id) as stock from `product`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "App\Models\Product");
    }

    public static function delete($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('DELETE FROM product WHERE `id` = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens delete.');
        }
    }

    public function insert()
    {
        try {
            $return_value = '';
            $db = static::getDB();
            $stmt = $db->prepare('CALL sp_add_product(:name, :purchPrice, :salesPrice, :rentalPrice, :discount, :description, @id)');
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR, 50);
            $stmt->bindParam(':purchPrice', $this->purchPrice, PDO::PARAM_STR, 10);
            $stmt->bindParam(':salesPrice', $this->salesPrice, PDO::PARAM_STR, 10);
            $stmt->bindParam(':rentalPrice', $this->rentalPrice, PDO::PARAM_STR, 10);
            $stmt->bindParam(':discount', $this->discount, PDO::PARAM_STR, 10);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR, 1000);
            $stmt->bindParam('@id', $return_value, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT );
            $stmt->execute();
            return $this;
        }
        catch (PDOException $e)
        {
            throw new \Exception('Fout opgetreden tijdens delete.');
        }
    }

    public function getImage($size, $extension)
    {
        return Image::getImageByProduct($this->id, $size, $extension);
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPurchPrice()
    {
        return $this->purchPrice;
    }
    public function getSalesPrice()
    {
        return $this->salesPrice;
    }

    public function getRentalPrice()
    {
        $this->rentalPrice;
    }
    public function getDiscount()
    {
        $this->discount;
    }

    public function getStock()
    {
        $this->stock;
    }
}
