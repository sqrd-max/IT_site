<?php 
    include "page_bd.php";
    $query = "SELECT * FROM `system_unit`";
    $result = mysqli_query($link, $query);
    $system_unit = [];
    while($system = mysqli_fetch_assoc($result)){
        $system_unit[] = $system;
    }
?>  