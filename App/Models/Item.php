<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Item extends \Core\Model
{
    /**
 * Get all the all the items as an associative array
 * @return array
 */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('select item.serial_code, Product.name from item inner join Product on item.product_id = Product.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all the all the items for given Product as an associative array
     * @param $product_id
     * @return array
     */
    public static function getByProduct($product_id)
    {
        $product_id = intval($product_id);
        $db = static::getDB();
        $stmt = $db->prepare('select item.serial_code, Product.name from item inner join Product on item.product_id = Product.id where item.product_id = :product_id');
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get specific item by id
     * @param $serial_code
     * @return array
     */
    public static function get($serial_code)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT `product_id`, `serial_code` FROM item WHERE `serial_code` = :serial_code');
        $stmt->bindParam(':serial_code', $serial_code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Check if item exists
     * @param $serial_code
     * @return boolean
     */
    public static function exists($serial_code)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT EXISTS ( SELECT `serial_code` from item WHERE  `serial_code` = :serial_code ) as result');
        $stmt->bindParam(':serial_code', $serial_code);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['result'];
    }

    /**
     * Insert item
     * @param $serial_code
     * @param $product_id
     */
    public static function insert($serial_code, $product_id)
    {
        try {
            $ret = 'succes';
            $product_id = intval($product_id);
            $db = static::getDB();
            $db->beginTransaction();

            if(self::exists($serial_code) == 0)
            {
                $stmt = $db->prepare('CALL sp_item_insert(:serial_code, :product_id)');
                $stmt->bindParam(':serial_code', $serial_code);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->execute();
            }
            else
            {
                $ret = 'duplicate';
            }
            $db->commit();
            return $ret;

        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens insert.');
        }
        $product_id = intval($product_id);
        $db = static::getDB();
        $stmt = $db->prepare('INSERT INTO item (`serial_code`, `product_id`) VALUES (:serial_code, :product_id)');
        $stmt->bindParam(':serial_code', $serial_code);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    }

    /**
     * Delete item
     * @param $serial_code
     */
    public static function delete($serial_code)
    {
        $db = static::getDB();
        $stmt = $db->prepare('DELETE FROM item WHERE `serial_code` = :serial_code');
        $stmt->bindParam(':serial_code', $serial_code);
        $stmt->execute();
    }

}
