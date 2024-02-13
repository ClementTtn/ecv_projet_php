<?php
require_once dirname(__FILE__) . '/../config/db.php';

class Orders
{
    private $id;
    private $user_id;
    private $product_id;
    private $order_date;

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

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setOrderDate($order_date) {
        $this->order_date = $order_date;
    }

    public function getOrderDate()
    {
        return $this->order_date;
    }

    public function toString() {
        return "Order id: '$this->id', User id: '$this->user_id', product id: '$this->product_id', order date: '$this->order_date'";
    }

    public static function getListOrders()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);
        $stmt = $dbh->prepare("SELECT * FROM orders");
        $stmt->execute();
        $resultArray = $stmt->fetchAll();
        return array_map(function ($item) {
            return $item;
        }, $resultArray);
    }

    public static function getOrders($id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT * FROM orders WHERE id = :id");
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}