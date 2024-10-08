<?php

use app\library\Cart;
// use app\library\Product;

require '../vendor/autoload.php';

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

echo 'productsInCart: <pre>';
print_r($productsInCart);
echo '</pre><br><br><hr>';

if(isset($_GET['id'])) {

    $id = strip_tags($_GET['id']);

    $cart->remove($id);
    header('Location: mycart.php');

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sem título</title>
</head>
<body>
    <a href="/">Go to Home</a>
    <ul>
        <?php if(count($productsInCart) <= 0): ?>
            Nenhum produto no carrinho
        <?php endif; ?>
        <?php foreach($productsInCart as $product): ?>
        <li>
            <?= $product->getName() ?>
            <input type="text" value="<?= $product->getQuantity() ?>" />
            Price: R$ <?= number_format($product->getPrice(), 2, ',', '.') ?>
            Subtotal: R$ <?= number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
            <a href="?id=<?= $product->getId() ?>">remove</a>
        </li>
        <?php endforeach; ?>
        <li>Total: R$ <?= number_format($cart->getTotal(), 2, ',', '.') ?></li>
    </ul>

    <hr />

    <a href="checkout.php">Checkout</a>
</body>
</html>