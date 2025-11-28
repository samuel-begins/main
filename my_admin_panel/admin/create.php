<?php
require '../includes/auth.php';
require '../includes/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$_POST['title'], $_POST['content']]);
    header('Location: posts.php');
    exit;
}
?>


<h2>Новая статья</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Заголовок" required>
    <textarea name="content" placeholder="Текст" required></textarea>
    <button type="submit">Сохранить</button>
</form>
