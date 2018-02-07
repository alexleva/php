<?php
$id = abs((int)$_GET["del"]);
if($id){
	$gbook->deletePost($id);
	header("Location:gbook.php");
}else{
	$errMsg = "Хакер,ухади";
}
?>