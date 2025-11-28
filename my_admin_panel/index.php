<!--ОСНОВНАЯ СТРАНИЧКА-->

<?php
session_start();
?>


<?php
// 8 отдельных товаров
$product1 = ['id'=>1, 'name'=>'Товар 1'];
$product2 = ['id'=>2, 'name'=>'Товар 2'];
$product3 = ['id'=>3, 'name'=>'Товар 3'];
$product4 = ['id'=>4, 'name'=>'Товар 4'];
$product5 = ['id'=>5, 'name'=>'Товар 5'];
$product6 = ['id'=>6, 'name'=>'Товар 6'];
$product7 = ['id'=>7, 'name'=>'Товар 7'];
$product8 = ['id'=>8, 'name'=>'Товар 8'];


require 'includes/db.php';
$products = $pdo->query("SELECT * FROM products")->fetchAll();


// Инициализация корзины
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

// Добавление товара в корзину
if (isset($_POST['add_to_cart'])) {
    $id = (int)$_POST['product_id'];
    if (!isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] = 0;
    $_SESSION['cart'][$id]++;
    header('Location: index.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css"> 
<title>"Сладкая сказка"</title>
</head>
<body>


 <img src="images/67575675.png" class="logo" alt="Лого"></img>
 <h1 class="He"><a class="Heading">Магазин тортов </a><a class="Heading2">"Сладкая сказка"</a></h1>



  <header class="header">
    <container class="container">     <!--Кнопки для header-->
     <a href="headers/about_us.php"  class="button-header" >О нас</a>

      <details>
         <summary class="button-header">Каталог</summary>
<div>
  <a class="filter-btn" data-filter="all">Все</a>
  <a class="filter-btn" data-filter="category1">Песочные</a>
  <a class="filter-btn" data-filter="category2">Бисквитные</a>
  <a class="filter-btn" data-filter="category3">Вафельные</a>
  <a class="filter-btn" data-filter="category4">Творожные</a>
</div>
</details>

     <a href="..."  class="button-header" >Галерея</a>

     <?php if (isset($_SESSION["user"])): ?>
    <a href="reviews.php" class="button-header">Отзывы</a>
<?php endif; ?>

 
    </container>
  </header>
  

  
  <container2 class="container2">       <!--Контент под header: наши связи-->
    <h4><a class="Information">Телефон:  +7-916-876-88-99.</a></h4>
    <h4><a class="Information">г.Москва, Ул.Кантемировская, Россия, 59А</a></h4>
    <h4><a class="Information">График работы: С 09:00 до 21:00, Ежедневно.</a></h4>
  </container2>   



 <container3 class="container3">
  <?php if (isset($_SESSION["user"])): ?>
      <!-- Пользователь вошёл -->
      <?php if ($_SESSION["user"]["role"] === "admin"): ?>
          <a href="admin/dashboard.php" class="button">Личный кабинет</a>
      <?php else: ?>
          <a href="user/profile.php" class="button">Личный кабинет</a>
      <?php endif; ?>
      <a href="../my_admin_panel/logout.php" class="button2">Выйти</a>
      <a href="cart.php" class="button2">Корзина</a>
  <?php else: ?>
      <!-- Пользователь не вошёл -->
      <a href="login.php" class="button">Войти</a>
  <?php endif; ?>
</container3>

   





<!-- Кнопки фильтрации -->



<!-- Карточки... -->

<div class="cards" id="cards-container">
<?php foreach ($products as $p): ?>
    <div class="card" data-category="<?= htmlspecialchars($p['category']) ?>">
        <img src="<?= htmlspecialchars($p['image']) ?>" class="icon">

        <a href="#" class="icon2">Подробнее</a>
        <h3><?= htmlspecialchars($p['name']) ?></h3>
        <p><?= htmlspecialchars($p['description']) ?></p>

        <?php if (isset($_SESSION["user"])): ?>
        <form method="post">
            <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
            <button name="add_to_cart">В корзину</button>
        </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>

 





 <script src="script.js"></script>
 <?php include 'footer.php';?>
</body>
</html>