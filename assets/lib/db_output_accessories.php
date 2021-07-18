<?php 
    include "page_bd.php";
    $query = "SELECT * FROM `accessories`";
    $result = mysqli_query($link, $query);
    $accessories = [];
    while($access = mysqli_fetch_assoc($result)){
        $accessories[] = $access;
    }
?>  