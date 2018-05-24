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
    public $name;
    public $price;

    public function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public static function constructFromDatabase($id)
    {
        $db = static::getDB();
        $stmt = $db->prepare('select `id`, `name`, `price` from `product`');
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_CLASS);
    }
}
