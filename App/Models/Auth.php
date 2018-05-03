<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Auth extends \Core\Model
{
    /**
     * Get all the all the products as an associative array
     * @return array
     */
//    public static function login($username, $password)
//    {
//        try {
//            $db = static::getDB();
//            $stmt = $db->prepare('SELECT EXISTS ( SELECT `id` from account WHERE  `username` = :id AND `password` = :password ) as result');
//            $stmt->bindParam(':username', $username);
//            $stmt->bindParam(':password', $password);
//            $stmt->execute();
//            $result = $stmt->fetch(PDO::FETCH_ASSOC);
//            return $result['result'];
//        } catch (PDOException $e) {
//
//        }
//    }

    /**
     * Get all the all the products as an associative array
     * @return array
     */
    public static function login($username, $password)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('SELECT `username` from account WHERE  `username` = :username AND `password` = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $account = $stmt->fetch(PDO::FETCH_ASSOC);
            return $account['username'];
        } catch (PDOException $e) {

        }
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
}
