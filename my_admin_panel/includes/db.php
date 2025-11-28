<?php
// Данные для подключения к базе
$host = 'localhost';
$database = 'admin_demo';
$username = 'root';         // Стандартный логин для локального сервера
$password = '';             // Обычно пароль пустой, если не меняли
$charset = 'utf8mb4';       // Кодировка для поддержки Unicode


// Формируем DSN-строку для PDO
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";


// Настройки PDO для обработки ошибок и получения ассоциативных массивов
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,         // Показывать ошибки в явном виде
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC     // Возвращать только именованные ключи
];


// Пробуем установить соединение
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Если не удалось подключиться — выводим сообщение и прерываем выполнение
    die('Не удалось подключиться к базе данных');
}
?>