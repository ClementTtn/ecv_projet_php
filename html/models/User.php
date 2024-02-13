<?php
require_once dirname(__FILE__) . '/../config/db.php';

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct()
    {
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function toString() {
        return "User id: '$this->id', name: '$this->name', email: '$this->email'";
    }

    public static function getUser($id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT id, name, email FROM user WHERE id = :id");
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}