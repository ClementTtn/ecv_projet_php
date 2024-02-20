<?php
require 'parts/header.php';
require_once dirname(__FILE__) . '/models/Product.php';

$listProducts = Product::getListProduct();
?>

<h2>Catalogue des produits</h2>

<div class="listProducts">
    <?php if (empty($listProducts)) : ?>
    <p>Le catalogue est vide</p>

    <?php else : ?>
        <?php foreach ($listProducts as $product) : ?>
            <article>
                <p><?php echo $product['name'] ?></p>
                <p><?php echo $product['price'] ?>€</p>
                <img src="<?php echo $product['img'] ?>" alt="<?php echo $product['name'] ?>">
                <a href="parts/product.php?id=<?php echo $product['id']; ?>">
                    <button>Détails</button>
                </a>
            </article>
        <?php endforeach ?>
    <?php endif; ?>
</div>


<style>
    .listProducts {
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
        img {
            width: 150px;
            height: 150px;
            margin: 1rem 0;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
        }
    }
</style>
