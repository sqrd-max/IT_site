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
<body class="reg-auth-body">
    <div class="content-reg">
        <h2 class="reg-auth-title"><span id="reg_h">Регистрация</span> / <span id="auth_h">Авторизация</span></h2>  
        <form id="registration">
            <div class = "row">
                <input id="1" type="text" placeholder="USER LOGIN"><br>
                <input id="2" type="text" placeholder="E-MAIL"><br>
                <input id="3" type="password" placeholder="PASSWORD"><br>
                <input id="4" type="password" placeholder="REPEAT PASSWORD"><br>
            </div> 
            <br>
            <button id="reg-btn">Регистрация</button>
            <input type="reset" value="Очистить" style="border: none;width: 160px; height: 40px;">
        </form>
        <form id="autorization">
            <div class = "row2">
                <input id="login" type="text" placeholder="USER LOGIN"><br>
                <input id="pass" type="password" placeholder="PASSWORD">
            </div>
            <br>
            <button id="auth-btn">Войти</button>
            <input type="reset" value="Очистить" style="border: none;width: 160px; height: 40px;">
        </form>
        <br><br><br>
        <p id="error" class="error"></p>
    </div>
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/reg_auth.js"></script>
</body>
</html>