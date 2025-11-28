<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css"> 
<title>"Сладкая сказка"</title>
</head>
<body>


<img src="../images/67575675.png" class="logo" alt="Лого"></img>
  <h1 class="He"><a class="Heading">Магазин тортов </a><a class="Heading2">"Сладкая сказка"</a></h1>



  <header class="header">
    <container class="container">     <!--Кнопки для header-->
     <a href="../index.php"  class="button-header" >На главную</a>

     <a href="..."  class="button-header" >Галерея</a>
     <a href="..."  class="button-header" >Творожные</a>
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
      <a href="../Вход и Регистрация/profile.php" class="button">Личный кабинет</a>
      <a href="../Вход и Регистрация/logout.php" class="button2">Выйти</a>
      <a href="cart.php" class="button2">Корзина</a>
  <?php else: ?>
      <!-- Пользователь не вошёл -->
      
  <?php endif; ?>
</container3>
   

<!-- Кнопки фильтрации -->



<p class="tex">
   <span>
 <span class="sp">•</span> Группа компаний «Сладкая сказка» - один из лидеров российского кондитерского рынка, основанный в 1990 году. <br>
<br>
 <span class="sp">•</span> С 2004 года «Сладкая сказка» развивает собственное производство в городе Иваново. <br>
<br>
 <span class="sp">•</span> Сегодня это современный комплекс: с 29-ю производственными линиями и 16800м2 производственных помещений; 
<br>
штатом более 500 сотрудников; мощностью более 5500 тонн продукции в год; складскими площадями свыше 5200м2. <br>
<br>
 <span class="sp">•</span> В России действует масштабная система дистрибуции, сотрудничество с лучшими компаниями, 
<br>
контракты с крупнейшими региональными и национальными сетями, 
<br>
а также экспортируется зарубеж.
<br>
 
  </p>


<img src="../images/Map.png" class="photo" alt="Моя картинка">

<p class="tex2">
<span class="sp">•</span> АДРЕС: Россия, Москва, Кантемировская улица, 59А <br>
<br>
<span class="sp">•</span> ТЕЛЕФОН: +7-916-876-88-99 <br>
<br>
<span class="sp">•</span> email: sweet@mail.ru
</p>


<hr class="short-line">



 <script src="script.js"></script>
</body>
</html>


