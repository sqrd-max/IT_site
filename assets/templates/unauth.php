<?php
    session_start();
    if(isset($_SESSION['login'])){
    	// unset($_SESSION['login']);
    	session_unset();
    	session_destroy();
    }
    header('Location: ../pages/reg-auth.php');
    die;
?>
