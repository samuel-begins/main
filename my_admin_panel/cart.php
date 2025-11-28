<!--Реализация добавления карточек в корзину-->

<?php
session_start();
require 'includes/db.php';


$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
$products = array_column($products, null, 'id'); 


// 8 отдельных товаров
$product1 = ['id'=>1, 'name'=>'Товар 1'];
$product2 = ['id'=>2, 'name'=>'Товар 2'];
$product3 = ['id'=>3, 'name'=>'Товар 3'];
$product4 = ['id'=>4, 'name'=>'Товар 4'];
$product5 = ['id'=>5, 'name'=>'Товар 5'];
$product6 = ['id'=>6, 'name'=>'Товар 6'];
$product7 = ['id'=>7, 'name'=>'Товар 7'];
$product8 = ['id'=>8, 'name'=>'Товар 8'];

// Удаление товара
if (isset($_POST['remove_id'])) {
    $id = (int)$_POST['remove_id'];
    unset($_SESSION['cart'][$id]);
    header('Location: cart.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Корзина</title></head>
<body>
<h1>Корзина</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Корзина пуста</p>
<?php else: ?>
    <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
        <p>
            <?=$products[$id]['name']?> — Количество: <?=$qty?>   <!-- ← изменена 41 строка -->
            <form method="post" style="display:inline">
                <input type="hidden" name="remove_id" value="<?=$id?>">
                <button type="submit">Удалить</button>
            </form>
        </p>
    <?php endforeach; ?>
<?php endif; ?>



<p><a href="index.php">Назад в магазин</a></p>
</body>
</html>