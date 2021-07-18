<?php header('Content-Type:text/html; charset = utf-8');
include "../lib/page_bd.php";
$username = $_GET['username'];
mysqli_real_escape_string($link, $username);
$email = $_GET['email'];
mysqli_real_escape_string($link, $email);
$password = $_GET['password'];
mysqli_real_escape_string($link, $password);
$pass_repeat = $_GET['pass_repeat'];
mysqli_real_escape_string($link, $pass_repeat);
$res='';

$checkUserName = false;
$checkEmail = false;
$check_pass = false;
$chech_prepeat = false;

//проверка на корректность ввода данных в поле "USER LOGIN"
if(strlen($username)>=3&&strlen($username)<=50)  
    $checkUserName = true;
else if(strlen($username)==0)
    $res= $res."Введите данные в поле 'USER LOGIN'<br>";
else
    $res = $res."В поле 'USER LOGIN' должно быть от 3 до 50 символов<br>";

//проверка на корректность ввода данных в поле "EMAIL
$ru_symb = preg_match("/[\а-яА-Я]/", $email);

if(strlen($email)>0 && preg_match("/[\а-яА-Я]/", $email)==0){ 
    $dog = strpos($email, '@');
    $dot = strpos($email, '.');
    $checkEmail = ($dog && $dot && $dog<$dot);
}else if(strlen($email)==0)
    $res= $res."Введите данные в поле 'EMAIL'<br>";
if($checkEmail==false && strlen($email)>0)
    $res= $res."Поле 'EMAIL' должно содержать англоязычные символы, '@' и точку<br>";

//проверка на корректность ввода данных в поле "Пароль"
$ru_symb = preg_match("/[\а-яА-Я]/", $password);

if(strlen($password)>=4&&strlen($password)<=32 && preg_match("/[\а-яА-Я]/", $password)==0)  
    $check_pass = true;
else if(strlen($password)==0)
    $res= $res."Введите данные в поле 'PASSWORD'<br>";
else
    $res = $res."В поле 'PASSWORD' должно быть от 4 до 32 символов и оно должно содержать англоизычные символы<br>";

//проверка на корректность ввода данных в поле "Повторный ввод пароля"
if((strlen($pass_repeat)>=4&&strlen($pass_repeat)<=32) && $password==$pass_repeat)  
    $chech_prepeat = true;
else if(strlen($pass_repeat)==0)
    $res= $res."Введите данные в поле 'REPEAT PASSWORD'<br>";
else
    $res = $res."Поля 'PASSWORD' и поле 'REPEAT PASSWORD' должны совпадать<br>";


//общая проверка
if($checkUserName && $checkEmail && $check_pass && $chech_prepeat){

    $qWery = "SELECT `id_user` FROM `users_data` WHERE `user_name`='$username'";
    $result_l = mysqli_query($link, $qWery);

    if(mysqli_num_rows($result_l)===0){
        $query = "INSERT INTO `users_data` (`user_name`, `user_mail`, `user_pass`, `user_rdate`, `role`) 
        VALUES ('$username', '$email', '$password', NOW(), 3)";
        $rezult = mysqli_query($link, $query);
        $res = "Данные успешно отправлены!";
        // echo $query;
    }else
       $res = "Пользователь с данным логином уже существует";
    echo $res;

}else 
    echo $res;
?>

