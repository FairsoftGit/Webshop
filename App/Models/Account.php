<?php
namespace App\Models;
use PDO;

class Account extends \Core\Model
{
    private $id, $username, $password, $email, $isActive, $created, $modified, $roles;

    private function __construct($id, $username, $password, $email, $isActive, $created, $modified)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->isActive = $isActive;
        $this->created = $created;
        $this->modified = $modified;
    }

    public function hasPrivilege($perm) {
        foreach ($this->roles as $role) {
            if ($role->hasPerm($perm)) {
                return true;
            }
        }
        return false;
    }

    protected function initRoles() {
        $this->roles = array();
        $db = static::getDB();
        $stmt = $db->prepare('SELECT `roleId` FROM account_role WHERE `accountId` = :accountId');
        $stmt->bindParam(':accountId', $this->id);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->roles[$row["roleId"]] = Role::getRolePerms($row["roleId"]);
        }
    }

    public static function login($username, $password)
    {
        try {
            $db = static::getDB();
            $stmt = $db->prepare('SELECT * from account WHERE  `username` = :username AND `password` = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            $account = new Account($record['id'], $record['username'], $record['password'], $record['email'], $record['isActive'], $record['created'], $record['modified']);
            $account->initRoles();
            return $account;
        } catch (PDOException $e) {
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getIsActive()
    {
        return $this->isActive;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function getModified()
    {
        return $this->modified;
    }
}
