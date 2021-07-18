<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/normalize.css">
    <title>It site</title>
</head>
<body>
<header>
        <div class="header_top">
            <img class="logo" src="../img/icons/logo.png">
            <div class="header_links">
                <div class="header_links-basket">
                    <img class="basket" src="../img/icons/basket.png"><a href="basket.php">КОРЗИНА</a>
                </div>
                <div class="header_links-account">
                    <img class="account" src="../img/icons/user.png"> 
                    <?php if(isset($_SESSION['login'])) echo "<a href='../templates/unauth.php' id='unauth' class='unauth'><span>Привет, ".$_SESSION['name']."</span></a>";
                    else echo "<a href='reg-auth.php'>ВОЙТИ</a>";
                    ?>
                </div>
            </div> 
        </div>
    </header>
    <input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <label for="nav-toggle" class="nav-toggle" onclick=""></label>
        <ul>
            <li><a href="../../index.php">Главная</a></li>
            <li><a href="system_unit.php">Системные блоки</a></li>
            <li><a href="laptop.php">Ноутбуки</a></li>
            <li><a href="component_parts.php">Комплектующие</a></li>
            <li><a href="periphery.php">Периферия</a></li>
            <li><a href="accessories.php">Аксессуары</a></li>
        </ul>
    </nav>
    <div class="content">
        <div class="page_name">
                Корзина
        </div>
        <div class = "basket_gds">
            
        </div>
        <div class="price">
            Итог:  <span class="itogo"></span>₽
        </div>
        <div class = "zakaz">
            <button class = "oform_zakaz">ОФОРМИТЬ ЗАКАЗ</button></a>
        </div>
        <div class = "zakaz_tov">
            <div class = "zakaz_tov_inf">   
                <p style = "font-size:150%">Заполните данные</p>
                <form id = "zakaz_tovara">
                    <div class = "zakaz_tovara_inp">
                        <input id="1" type="text" class="inp" placeholder="ФИО"><br>
                        <input id="2" type="text" class="inp" placeholder="E-mail"><br>
                        <input id="3" type="text" class="inp" placeholder="Номер телефона"><br>
                        <input id="4" type="text" class="inp" placeholder="Адрес доставки"><br> 
                        <select class="delivery">
                            <option value="" disabled selected>Способ доставки</option>
                            <option value="1">DHL</option>
                            <option value="2">Почта России</option>
                            <option value="3">СДЭК</option>
                            <option value="4">Курьером до двери</option>
                        </select><br>
                        <div class="label">                  
                            <label>
                                <input type="checkbox" checked="checked" name="remember"> Согласие на обработку персональных данных
                            </label><br>
                        </div>  
                        <button class = "of-tov">Оформить заказ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<footer>
    <div class="end1">
        <div class="end1__phone">
            <img src="../img/icons/phone.png">
            +7 (899) 999-99-99
        </div>
        <div class="end1__mail">
            <img src="../img/icons/mail.png">
            sqrd_com@mail.ru
        </div>
    </div>
    <div class="end2">
        <div class="icons">
            <img src="../img/icons/twit.png">
            <img src="../img/icons/inst.png">
            <img src="../img/icons/vk.png">
            <img src="../img/icons/facebook.png">
        </div>
    </div>
</footer>
</div>
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/cart.js"></script>
</body>
</html>