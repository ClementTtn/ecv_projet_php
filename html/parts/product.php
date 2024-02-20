<?php
require_once dirname(__FILE__) . '/header.php';
require_once dirname(__FILE__) . '/../models/Product.php';

$product = Product::getProduct($_GET['id']);
?>

<?php if (empty($product)) : ?>
    <p>Produit introuvable</p>

<?php else : ?>
    <h2><?php echo $product->getName() ?></h2>
    <article>
        <img src="../<?php echo $product->getImg() ?>" alt="<?php echo $product->getName() ?>">
        <div>
            <p><?php echo $product->getDescription() ?></p>
            <p><?php echo $product->getPrice() ?>€</p>
            <form action="../handlers/createOrders.php" method="post">
                <div>
                    <label for="quantity">Quantité :</label>
                    <select name="quantity" id="quantity">
                        <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
                <button type="submit">Commander</button>
            </form>
        </div>
    </article>
<?php endif; ?>


<style>
    article {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 20rem;
        form{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            select {
                padding: 3px 15px;
            }
            button {
                margin-top: 1rem;
            }
        }
    }
    img {
        width: 400px;
        height: 400px;
    }
</style>
