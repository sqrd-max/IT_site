<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "assets/css/style.css">
    <link rel = "stylesheet" href = "assets/css/normalize.css">
    <title>It site</title>
</head>
<body>
    <header>
        <div class="header_top">
            <img class="logo" src="assets/img/icons/logo.png">
            <div class="header_links">
                <div class="header_links-basket">
                    <img class="basket" src="assets/img/icons/basket.png"><a href="assets/pages/basket.php">КОРЗИНА</a>
                </div>
                <div class="header_links-account">
                    <img class="account" src="assets/img/icons/user.png"> 
                    <?php if(isset($_SESSION['login'])) echo "<a href='assets/templates/unauth.php' id='unauth' class='unauth'><span>Привет, ".$_SESSION['name']."</span></a>";
                    else echo "<a href='assets/pages/reg-auth.php'>ВОЙТИ</a>";
                    ?>
                </div>
            </div> 
        </div>
    </header>
    <input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <label for="nav-toggle" class="nav-toggle" onclick=""></label>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="assets/pages/system_unit.php">Системные блоки</a></li>
            <li><a href="assets/pages/laptop.php">Ноутбуки</a></li>
            <li><a href="assets/pages/component_parts.php">Комплектующие</a></li>
            <li><a href="assets/pages/periphery.php">Периферия</a></li>
            <li><a href="assets/pages/accessories.php">Аксессуары</a></li>
        </ul>
    </nav>
    <div class="content">
            <div class="main-slider">
            <ul> 
                <li><img src="assets/img/slider/slide11.jpg" alt="image1"></li>
                <li><img src="assets/img/slider/slide1.jpg" alt="image3"></li>
                <li><img src="assets/img/slider/slide4.jpg" alt="image4"></li>
                <li><img src="assets/img/slider/slide5.jpg" alt="image5"></li>
            </ul>
            </div>
        <div class="baner">
            <h2>МЫ - Комфорт!</h2>
            <p>Сделай свое рабочее место
                удобным вместе с нами!</p>
        </div>
        <div class="action">
            <p>Акции нашего магазина</p>
        </div>
        <div class="gds">
        <?php
        include "assets/lib/db_output_main.php";
            foreach ($main_page as $main ){
                echo "<div class='gds1'><figure><img src='assets/img/main_page/".$main['img']."' height='270' width='250'>";
                echo "</figure><figcaption class='figure'><b> ".$main['name']."</b><br> Цена: <b>".$main['price']." ₽</b>";
                echo "<button class='add_to_cart' data-i='".$main['img']."' data-n='".$main['name']."' data-p='".$main['price'].
                "'data-c='".$main['characteristics']."' data-k='".$main['kategori']."'>Добавить в корзину</button><br>";
                if(isset($_SESSION['login'])) if($_SESSION['role']<3) echo "<button data-n='".$main['name']."' data-k='".$main['kategori']."' class ='change'>Изменить</button>";
                if(isset($_SESSION['login'])) if($_SESSION['role']<2) echo "<button data-n='".$main['name']."' data-k='".$main['kategori']."' class ='delete'>Удалить</button>";
                echo "</figcaption></div>";
            }
        ?>
        </div>
        <div class="edit-block">
            <div class="edit-product">
                <p class="edit-title"><b>ИЗМЕНЕНИЯ</b></p>
                <form class="editing-block">
                    <select class="editing-select"></select>
                    <input type="text" id="change-value" placeholder="Введите значение">
                    <button class="sub-change-btn">Изменить</button>
                </form>
            </div>
        </div> 
    </div>
<footer>
    <div class="end1">
        <div class="end1__phone">
            <img src="assets/img/icons/phone.png">
            +7 (899) 999-99-99
        </div>
        <div class="end1__mail">
            <img src="assets/img/icons/mail.png">
            sqrd_com@mail.ru
        </div>
    </div>
    <div class="end2">
        <div class="icons">
            <img src="assets/img/icons/twit.png">
            <img src="assets/img/icons/inst.png">
            <img src="assets/img/icons/vk.png">
            <img src="assets/img/icons/facebook.png">
        </div>
    </div>
</footer>
    <script src="assets/js/jquery-3.4.1.js"></script>
    <script src="assets/js/unslider-min.js"></script>
    <script src ="assets/js/add_to_cart.js"></script>
    <script src ="assets/js/edit.js"></script>
    <script src ="assets/js/delete.js"></script>
    <script>
        jQuery(document).ready(function($){
            $('.main-slider').unslider({
                autoplay: true, //тут я включаю автопролилстывание
                arrows: false //это для навигации с помощью стрелок, их CSS в отдельном файле
            });
        })
</script>
</body>
</html>