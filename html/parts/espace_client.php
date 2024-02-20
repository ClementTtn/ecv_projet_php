<?php
require_once dirname(__FILE__) . '/header.php';
require_once dirname(__FILE__) . '/../models/Orders.php';
require_once dirname(__FILE__) . '/../models/Product.php';

$listOrders = Orders::getListOrdersUser($_SESSION['userId']);
?>

<h2>Bienvenue <?php echo $_SESSION['name']; ?></h2>
<h3>Historique de vos commandes</h3>

<?php if (empty($listOrders)) : ?>
    <p>Vous n'avez effectué aucune commande</p>

<?php else : ?>
    <?php foreach ($listOrders as $order) : ?>
        <article>
            <p>Commande n°<?php echo $order['id'] ?></p>
            <p>Date : <?php echo $order['order_date'] ?></p>
            <p>Produit : <?php echo Product::getProduct($order['product_id'])->getName() ?></p>
            <p>Quantité : <?php echo $order['quantity'] ?></p>
            <p>Prix total : <?php echo $order['quantity'] * Product::getProduct($order['product_id'])->getPrice()?>€</p>
        </article>
        <hr>
    <?php endforeach ?>
<?php endif; ?>


