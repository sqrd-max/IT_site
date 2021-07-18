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
            <div class="header_search">
                <input type="text" id="search" class="search" placeholder="Поиск на странице">
                <button type="submit" id="search-btn" class="search-btn"><img class="search-btn-icon"src="../img/icons/search.png"></button>
            </div>
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