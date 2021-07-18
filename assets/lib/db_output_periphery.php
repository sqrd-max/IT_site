<?php 
    include "page_bd.php";
    $query = "SELECT * FROM `periphery`";
    $result = mysqli_query($link, $query);
    $periphery = [];
    while($peri = mysqli_fetch_assoc($result)){
        $periphery[] = $peri;
    }
?>  