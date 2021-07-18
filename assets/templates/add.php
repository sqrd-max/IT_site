<?php
include "../lib/page_bd.php";
$datatable = $_REQUEST['dt'];
$kategory = $_REQUEST['kat'];
$name = $_REQUEST['n'];
$price = $_REQUEST['p'];
$characteristics = $_REQUEST['c'];
$img = $_REQUEST['i'];

$qWery = "SELECT `name` FROM $datatable WHERE `name`='$name'";
$result_l = mysqli_query($link, $qWery);
if(mysqli_num_rows($result_l)===0){
$query = "INSERT INTO $datatable (`name`, `characteristics`, `price`, `img`, `kategori`)
VALUES ('$name', '$characteristics', $price, '$img', '$kategory')";
mysqli_query($link, $query);
}else
echo "Товар с таким именем уже существует!";

?>