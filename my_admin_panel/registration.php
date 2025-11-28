<?php
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $phone = $_POST['phone'];

    if ($password !== $password_repeat) {
        echo "Пароли не совпадают";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role, email, first_name, last_name, middle_name, phone) VALUES (?, ?, 'user', ?, ?, ?, ?, ?)");
        $stmt->execute([$username, $hash, $email, $first_name, $last_name, $middle_name, $phone]);
        echo "Регистрация прошла успешно! <a href='login.php'>Войти</a>";
    }
}
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Логин" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="password" name="password_repeat" placeholder="Повторите пароль" required><br>
    <input type="text" name="first_name" placeholder="Имя" required><br>
    <input type="text" name="last_name" placeholder="Фамилия" required><br>
    <input type="text" name="middle_name" placeholder="Отчество" required><br>
    <input type="text" name="phone" placeholder="Телефон" required><br>
    <button type="submit">Зарегистрироваться</button>
</form>
