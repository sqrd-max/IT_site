<?php 
    include "page_bd.php";
    $query = "SELECT * FROM `main_page`";
    $result = mysqli_query($link, $query);
    $main_page = [];
    while($main = mysqli_fetch_assoc($result)){
        $main_page[] = $main;
    }
?>  