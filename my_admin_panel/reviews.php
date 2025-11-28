<?php
session_start();
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $review = $_POST['review'];

    $stmt = $pdo->prepare("INSERT INTO reviews (username, review) VALUES (?, ?)");
    $stmt->execute([$username, $review]);

    header("Location: reviews.php?success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Оставить отзыв</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="comment">
<h2 class="comments1">Оставьте отзыв</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Ваше имя" class="comments2" required><br><br>
    <textarea name="review" placeholder="Ваш отзыв" class="comments3" required></textarea><br><br>
    <button type="submit" class="comments4">Отправить</button>
</form>

<?php if(isset($_GET['success'])): ?>
<p style="color:green;">Спасибо, отзыв отправлен!</p>
<?php endif; ?>
</div>


<style>
    .comment{
        text-align: center;
        margin-top: 180px;
    }

    .comments2{
        background-color: rgb(255, 162, 74);
        width: 350px;
        height: 40px;
    }

    .comments3{
        background-color: rgb(255, 162, 74);
        width: 350px;
        height: 40px;
    }

    .comments5{
        text-decoration: none;
        position: absolute;
        margin-left:15px;
        margin-top: -370px;
        color: white;
        background-color: brown;
        border: 10px solid brown;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .comments5:hover {
    background-color: rgb(255, 162, 74);     /* изменение фона */
    border-color: rgb(255, 162, 74);         /* изменение рамки */
    }
    .comments5:hover {
    background-color: rgb(255, 162, 74);     /* изменение фона */
    border-color: rgb(255, 162, 74);         /* изменение рамки */
    }

</style>


<p><a href="index.php" class="comments5">На главную</a></p>


<script src="script.js"></script>
</body>
</html>