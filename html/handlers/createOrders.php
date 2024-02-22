<?php
session_start();
require_once dirname(__FILE__) . '/../models/Orders.php';

// Si la méthode du formulaire est POST -> message d'erreur
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo '400 Bad Request';
    exit();
}

// Si le formulaire ne retourne pas de product_id -> création de la commande impossible
if (empty($_POST["product_id"])) {
    echo 'Aucun produit n\'est renseigné pour la création de la commande.';
    exit();
}

// Nouvelle commande
$orders = new Orders();
// Définition des propriétés de la commande
$newOrder = $orders
    ->setUserId(filter_var($_SESSION['userId'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setProductId(filter_var($_POST['product_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setQuantity(filter_var($_POST['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS))
    ->setOrderDate()
    // Enregistrement de la commande
    ->save();

// Redirection vers confirmation.php
header("Location: /../parts/confirmation.php");
