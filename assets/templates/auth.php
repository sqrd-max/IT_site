<?php header('Content-Type:text/html; charset = utf-8');

include '../lib/page_bd.php';

$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];

$query = "SELECT `id_user`, `user_name`, `role` FROM users_data WHERE user_name = '$login' AND user_pass='$pass'";
$result = mysqli_query($link, $query);
$user = $result->fetch_assoc();

if(mysqli_num_rows($result)!=0){
    session_start();
    $_SESSION['login'] = $user['id_user'];
    $_SESSION['name'] = $user['user_name'];
    $_SESSION['role'] = $user['role'];
   	echo $_SESSION['role'];
}else{
    echo 'Неправильный логин и/или пароль!<br>';
    die;
}
    

