<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login.php');
}

require 'inc/head.php';
require 'inc/data/products.php';

$cart = [];
foreach ($_SESSION['cart'] as $productId) {
    if(!key_exists($productId, $cart)) {
        $cart[$productId]['quantity'] = 0;
    }
    $cart[$productId]['name'] = $catalog[$productId]['name'];
    $cart[$productId]['quantity'] = $cart[$productId]['quantity'] + 1;
}
?>

    <section class="cookies container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Cookie</th>
                    <th scope="col">Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cart as $product) { ?>
                    <th><?= $product['name']?></th>
                    <td><?= $product['quantity']?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </section>
<?php require 'inc/foot.php'; ?>