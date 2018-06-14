<?php
namespace App\Models;
use PDO;

class Language extends \Core\Model
{
    private $id, $code, $name;

    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('SELECT * from `language`');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Language');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
        }
    }

    public static function exists($code)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('SELECT `code` from `language` where `code` = :code');
            $stmt->bindParam(':code', $code);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Language');
            $stmt->execute();
            $language = $stmt->fetch();
            if(is_null($language))
            {
                return false;
            }
            return true;
        } catch (PDOException $e) {
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }
}
