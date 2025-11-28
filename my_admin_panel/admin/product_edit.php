<?php
require '../includes/auth.php';
require '../includes/db.php';

$id = (int)$_GET['id'];

$product = $pdo->prepare("SELECT * FROM products WHERE id=?");
$product->execute([$id]);
$p = $product->fetch();

if (!$p) die("Товар не найден");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("
        UPDATE products
        SET name=?, description=?, category=?, price=?, image=?
        WHERE id=?
    ");
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['category'],
        $_POST['price'],
        $_POST['image'],
        $id
    ]);
    header("Location: products.php"); 
    exit;
}
?>

<h2>Редактировать товар</h2>

<form method="post">
Название<br>
<input name="name" value="<?= htmlspecialchars($p['name']) ?>"><br><br>

Описание<br>
<textarea name="description"><?= htmlspecialchars($p['description']) ?></textarea><br><br>

Категория<br>
<input name="category" value="<?= $p['category'] ?>"><br><br>

Цена<br>
<input name="price" type="number" value="<?= $p['price'] ?>"><br><br>

Путь к картинке<br>
<input name="image" value="<?= $p['image'] ?>"><br><br>

<button>Сохранить</button>
</form>
