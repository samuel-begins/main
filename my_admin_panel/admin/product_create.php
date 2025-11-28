<?php
require '../includes/auth.php';
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO products (name, description, category, price, image)
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['category'],
        $_POST['price'],
        $_POST['image']
    ]);
    header("Location: products.php");
    exit;
}
?>

<h2>Добавить товар</h2>

<form method="post">
Название<br>
<input name="name"><br><br>

Описание<br>
<textarea name="description"></textarea><br><br>

Категория<br>
<input name="category"><br><br>

Цена<br>
<input name="price" type="number"><br><br>

Путь к картинке (например images/cake1.png)<br>
<input name="image"><br><br>

<button>Сохранить</button>
</form>
