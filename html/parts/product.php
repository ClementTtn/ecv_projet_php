<?php
require_once dirname(__FILE__) . '/header.php';
require_once dirname(__FILE__) . '/../models/Product.php';

$product = Product::getProduct($_GET['id']);
?>

<?php if (empty($product)) : ?>
    <p>Produit introuvable</p>

<?php else : ?>
    <article>
        <p><?php echo $product->getName() ?></p>
        <p><?php echo $product->getDescription() ?></p>
        <p><?php echo $product->getPrice() ?></p>
        <form method="get">
            <label for="quantity">Quantité :</label>
            <select name="quantity" id="quantity">
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                ?>
            </select>
            <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
            <button type="submit">Commander</button>
        </form>
    </article>
<?php endif; ?>
