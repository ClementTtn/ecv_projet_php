<?php
require_once dirname(__FILE__) . '/header.php';
require_once dirname(__FILE__) . '/../models/Orders.php';
require_once dirname(__FILE__) . '/../models/Product.php';

// Récupération des commandes pour un client
$listOrders = Orders::getListOrdersUser($_SESSION['userId']);
?>

<!-- Affichage du nom du client connecté -->
<h2>Espace client de <?php echo $_SESSION['name']; ?></h2>
<h3>Historique de vos commandes</h3>

<div class="listOrders">
    <!-- Liste commandes vide -->
    <?php if (empty($listOrders)) : ?>
        <p>Vous n'avez effectué aucune commande</p>

    <!-- Liste commandes pas vide -->
    <?php else : ?>
        <?php foreach ($listOrders as $order) : ?>
            <!-- Affichage d'une commande -->
            <article>
                <p>Commande n°<?php echo $order['id'] ?></p>
                <small><?php echo date('d/m/Y', strtotime($order['order_date'])) ?></small>
                <a href="product.php?id=<?php echo $order['product_id']; ?>">
                    <img src="../<?php echo Product::getProduct($order['product_id'])->getImg() ?>" alt="<?php echo Product::getProduct($order['product_id'])->getName() ?>">
                </a>
                <p>Produit : <?php echo Product::getProduct($order['product_id'])->getName() ?></p>
                <p>Quantité : <?php echo $order['quantity'] ?></p>
                <p>Prix total : <?php echo $order['quantity'] * Product::getProduct($order['product_id'])->getPrice()?>€</p>
            </article>
        <?php endforeach ?>
    <?php endif; ?>
</div>


<style>
    h3 {
        text-align: center;
        margin-bottom: 5rem;
    }

    .listOrders {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    article {
        display: flex;
        flex-direction: column;
        justify-content: center;
        border: 2px solid black;
        padding: 1rem;
        margin: 1rem;
        width: 300px;
        text-align: center;
        align-items: center;
        small{
            margin-bottom: 1rem;
        }
        img {
            width: 150px;
            height: 150px;
            margin: 1rem 0;
        }
    }
</style>