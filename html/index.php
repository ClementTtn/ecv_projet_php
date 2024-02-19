<?php
require_once dirname(__FILE__) . '/parts/header.php';
require_once dirname(__FILE__) . '/models/Product.php';

$listProducts = Product::getListProduct();
?>

<h2>Catalogue des produits</h2>

<?php if (empty($listProducts)) : ?>
<p>Le catalogue est vide</p>

<?php else : ?>
    <?php foreach ($listProducts as $product) : ?>
        <article>
            <p><?php echo $product['name'] ?></p>
            <p><?php echo $product['price'] ?></p>
            <a href="parts/product.php?id=<?php echo $product['id']; ?>">
                <button>Détails</button>
            </a>
        </article>
        <hr>
    <?php endforeach ?>
<?php endif; ?>

