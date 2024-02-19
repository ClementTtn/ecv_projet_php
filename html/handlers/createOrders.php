<?php
session_start();
require_once dirname(__FILE__) . '/../models/Orders.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo '400 Bad Request';
    exit();
}

if (empty($_POST["product_id"])) {
    echo 'Aucun produit n\'est renseigné pour la création de la commande.';
    exit();
}

$orders = new Orders();
$newOrder = $orders
    ->setUserId(filter_var($_SESSION['userId'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setProductId(filter_var($_POST['product_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setQuantity(filter_var($_POST['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setOrderDate()
    ->save();

header("Location: /../parts/confirmation.php");
