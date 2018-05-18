<?php

namespace App\Models;

use PDO;

class Role extends \Core\Model
{
    protected $permissions;

    protected function __construct() {
        $this->permissions = array();
    }

    // return a role object with associated permissions
    public static function getRolePerms($role) {
        $roleObject = new Role();
        $db = static::getDB();
        $stmt = $db->prepare('SELECT `permission` FROM role_permission WHERE `role` = :role');
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $roleObject->permissions[$row["permission"]] = true;
        }
        return $roleObject;
    }

    // check if a permission is set
    public function hasPerm($permission) {
        return isset($this->permissions[$permission]);
    }

    /**
     * Get all the all the roles as an associative array
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('select `role` from role');
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
        }
    }

    /**
     * Get specific product by id
     * @param $id
     * @return array
     */
    public static function getRole($role)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT `role` FROM role WHERE `role` = :role');
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Update product
     * @param $id
     * @param $name
     * @param $price
     */
    public static function update($role)
    {
        $ret = 'succes';
        try {
            $db = static::getDB();
            $db->beginTransaction();
                $stmt = $db->prepare('update role set `role` = :role where `role` = :role');
                $stmt->bindParam(':role', $role);
                $stmt->execute();
            $db->commit();
            }
        catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens update.');
        }
        return $ret;
    }

    /**
     * Check if role exists
     * @param $role
     * @return integer //1 if exists else 0
     */
    public
    static function exists($role)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT EXISTS ( SELECT `role` from role WHERE  `role` = :role ) as result');
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insert role
     * @param $role
     * @return boolean result
     */
    public
    static function insert($role)
    {
        try {
            $ret = 'succes';
            $db = static::getDB();
            $db->beginTransaction();
            if (self::exists($role)['result'] == 0) {
                $stmt = $db->prepare('insert into role (`role`) values (:role)');
                $stmt->bindParam(':role', $role);
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
     * Delete role
     * @param $role
     */
    public
    static function delete($role)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('DELETE FROM role WHERE `role` = :role');
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new \Exception('Fout opgetreden tijdens delete.');
        }
    }
}
