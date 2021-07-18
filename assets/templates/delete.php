<?php
    include "../lib/page_bd.php";
    $name = $_REQUEST['n'];
    $datatable = $_REQUEST['dt'];
    $query = "DELETE FROM $datatable WHERE `name`='$name'";
    mysqli_query($link, $query);
    $query = "ALTER TABLE $datatable AUTO_INCREMENT=0";
    mysqli_query($link, $query);
?>