<?php 
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;

        if ($user['role'] === 'admin') {
            header('Location: admin/dashboard.php');
        } else {
            header('Location: user/profile.php');
        }
        exit;
    } else {
        echo 'Неверный логин или пароль';
    }
}
?>

<form method="POST" action="">
    <label>Логин:</label>
    <input type="text" name="username" required><br>

    <label>Пароль:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Войти</button>
    <a href="registration.php"><button type="button">Регистрация</button></a>
</form>

<a href="index.php"  class="reg" >На главную</a>