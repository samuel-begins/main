<?php
require '../includes/auth.php';
?>


<h1>Добро пожаловать, <?php echo $_SESSION['user']['username']; ?>!</h1>


<ul>
    <li><a href="products.php">Управление статьями</a></li>
    <li><a href="../logout.php">Выход</a></li>
</ul>

<a href="../index.php"  class="reg" >На главную</a>