<?php
require '../includes/auth.php';
require '../includes/db.php';


$posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();
?>


<h2>Статьи</h2>
<a href="create.php">Добавить новую</a>


<table>
    <tr>
        <th>ID</th><th>Заголовок</th><th>Дата</th><th>Действия</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= $post['created_at'] ?></td>
            <td>
                <a href="edit.php?id=<?= $post['id'] ?>">Редактировать</a>
                <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Удалить запись?');">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


<!--ЭТА СТРАНИЧКА НЕ НУЖНА!-->
<!--ЭТА СТРАНИЧКА НЕ НУЖНА!-->
<!--ЭТА СТРАНИЧКА НЕ НУЖНА!-->