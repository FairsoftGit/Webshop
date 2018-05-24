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

    /**
     * Get all the all the products as an associative array
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('select  product.id,
                                    product.name,
                                    product.price,
                                    ( SELECT count(item.serial_code) from item where item.product_id = product.id) as stock
                                    from product');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return 'duplicate';
            } else {
                return 'error';
            }
        }
    }

    /**
     * Get specific product by id
     * @param $id
     * @return array
     */
    public static function get($id)
    {
        $id = intval($id);
        $db = static::getDB();
        $stmt = $db->prepare('SELECT `id`, `name`, `price` FROM product WHERE `id` = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update product
     * @param $id
     * @param $name
     * @param $price
     */
    public static function update($id, $name, $price)
    {
        $ret = 'succes';
        $id = intval($id);
        $price = intval($price);
        try {
            $db = static::getDB();
            $db->beginTransaction();
            if (self::existsByName($name, $id) == 0) {
                $stmt = $db->prepare('CALL sp_product_update(:id, :name, :price)');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);
                $stmt->execute();
            } else {
                $ret = 'duplicate';
            }
            $db->commit();
        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens update.');
        }
        return $ret;
    }

    /**
     * Check if product exists
     * @param $name
     * @param $id default 0 //If id is not 0 then search for duplicate name on other record.
     * @return integer //1 if exists else 0
     */
    public
    static function existsByName($name, $id = 0)
    {
        $id = intval($id);
        try {
            $db = static::getDB();
            if ($id != 0) {
                $stmt = $db->prepare('SELECT EXISTS ( SELECT `id` from product WHERE  `name` = :name AND `id` != :id ) as result');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':id', $id);
            } else {
                $stmt = $db->prepare('SELECT EXISTS ( SELECT `id` from product WHERE  `name` = :name ) as result');
                $stmt->bindParam(':name', $name);
            }

            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens update.');
        }
        return $result['result'];
    }

    /**
     * Check if product exists
     * @param $name
     * @return integer //1 if exists else 0
     */
    public
    static function exists($id)
    {
        $id = intval($id);
        $db = static::getDB();
        $stmt = $db->prepare('SELECT EXISTS ( SELECT `id` from product WHERE  `id` = :id ) as result');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['result'];
    }

    /**
     * Insert product
     * @param $name
     * @param $price
     * @return exception if thrown
     */
    public
    static function insert($name, $price)
    {
        try {
            $ret = 'succes';
            $price = intval($price);
            $db = static::getDB();
            $db->beginTransaction();

            if (self::existsByName($name) == 0) {
                $stmt = $db->prepare('CALL sp_product_insert(:name, :price)');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);
                $stmt->execute();
            } else {
                $ret = 'duplicate';
            }
            $db->commit();
            return $ret;

        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens insert.');
        }
    }

    /**
     * Delete product
     * @param $id
     */
    public
    static function delete($id)
    {
        try {
            $id = intval($id);
            $db = static::getDB();
            $stmt = $db->prepare('DELETE FROM product WHERE `id` = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens delete.');
        }
    }
}
