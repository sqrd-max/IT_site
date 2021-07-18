<?php
include "../lib/page_bd.php";
$name = $_REQUEST['n'];
$datatable = $_REQUEST['dt'];
$option = $_REQUEST['option'];
$value = $_REQUEST['value'];

if($option=="name"){
    $qWery = "SELECT `name` FROM `$datatable` WHERE `name`='$value'";
    $result_l = mysqli_query($link, $qWery);
    if(mysqli_num_rows($result_l)===0){
        $query = "UPDATE `$datatable` SET `name`='$value' WHERE `name`='$name'";
        $rezult = mysqli_query($link, $query);
    }else echo "Товар со схожим именем уже существует";
}else{
    if($option=="price"){$value=(int)$value; $query = "UPDATE `$datatable` SET `$option`=$value";}
    else  $query = "UPDATE `$datatable` SET `$option`='$value'";
    $query.=" WHERE `name`='$name'";
    $rezult = mysqli_query($link, $query);
}
?>
