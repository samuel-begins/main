<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header('Location: ../login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<h1>Личный кабинет</h1>
<p><b>Логин:</b> <?= htmlspecialchars($user['username']) ?></p>
<p><b>Email:</b> <?= htmlspecialchars($user['email']) ?></p>
<p><b>Имя:</b> <?= htmlspecialchars($user['first_name']) ?></p>
<p><b>Фамилия:</b> <?= htmlspecialchars($user['last_name']) ?></p>
<p><b>Отчество:</b> <?= htmlspecialchars($user['middle_name']) ?></p>
<p><b>Телефон:</b> <?= htmlspecialchars($user['phone']) ?></p>
<a href="../logout.php">Выйти</a>

<a href="../index.php"  class="reg" >На главную</a>