<?php
require '../includes/auth.php';
require '../includes/db.php';

$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>

<h2>Товары</h2>
<a href="product_create.php">Добавить товар</a>

<table border="1" cellpadding="5">
<tr>
 <th>ID</th><th>Название</th><th>Категория</th><th>Цена</th><th>Действия</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
 <td><?= $p['id'] ?></td>
 <td><?= htmlspecialchars($p['name']) ?></td>
 <td><?= $p['category'] ?></td>
 <td><?= $p['price'] ?> ₽</td>
 <td>
   <a href="product_edit.php?id=<?= $p['id'] ?>">Редактировать</a>
   <a href="product_delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Удалить товар?')">Удалить</a>
 </td>
</tr>
<?php endforeach; ?>
</table>


<a href="dashboard.php"  class="reg" >Назад</a>