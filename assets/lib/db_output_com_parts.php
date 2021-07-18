<?php 
    include "page_bd.php";
    $query = "SELECT * FROM `com_parts`";
    $result = mysqli_query($link, $query);
    $com_parts = [];
    while($parts = mysqli_fetch_assoc($result)){
        $com_parts[] = $parts;
    }
?>  