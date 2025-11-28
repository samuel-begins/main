<?php
require '../includes/auth.php';
require '../includes/db.php';

// Проверяем id
if (!isset($_GET['id']) && !isset($_POST['id'])) {
    header('Location: products.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Удаляем товар (POST — безопаснее)
    $id = (int)$_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);

    // Можно добавить flash-сообщение в сессию тут, если нужно
    header('Location: products.php');
    exit;
} else {
    // Показываем экран подтверждения (GET)
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $p = $stmt->fetch();

    if (!$p) {
        // Товар не найден — назад к списку
        header('Location: products.php');
        exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Удалить товар</title>
</head>
<body>
    <h2>Удалить товар</h2>

    <p>Вы уверены, что хотите удалить товар:</p>
    <ul>
        <li><strong>ID:</strong> <?= htmlspecialchars($p['id']) ?></li>
        <li><strong>Название:</strong> <?= htmlspecialchars($p['name']) ?></li>
        <li><strong>Категория:</strong> <?= htmlspecialchars($p['category']) ?></li>
        <li><strong>Цена:</strong> <?= htmlspecialchars($p['price']) ?> ₽</li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($p['id']) ?>">
        <button type="submit">Да, удалить</button>
        <a href="products.php">Отмена</a>
    </form>
</body>
</html>
