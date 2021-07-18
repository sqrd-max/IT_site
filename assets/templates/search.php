<?php
    include "../lib/page_bd.php";
    $text = $_REQUEST['text'];
    $datatable = $_REQUEST['dt'];

    $query = "SELECT * FROM `$datatable` WHERE `name` LIKE '%$text%'";
    $result = mysqli_query($link, $query);
	if($result){
		$objects = [];
		while($obj = mysqli_fetch_assoc($result)){
			$objects[] = $obj;
		}
		mysqli_free_result($result);
		echo json_encode($objects, JSON_UNESCAPED_UNICODE);
	}else echo json_encode($objects=[], JSON_UNESCAPED_UNICODE);

	mysqli_close($link);
?>