<?php 
    include "page_bd.php";
    $query = "SELECT * FROM `laptop`";
    $result = mysqli_query($link, $query);
    $laptop = [];
    while($lap = mysqli_fetch_assoc($result)){
        $laptop[] = $lap;
    }
?>  