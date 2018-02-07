<?php
$name = $gbook->cleardata($_POST["name"]);
$email = $gbook->cleardata($_POST["email"]);
$msg = $gbook->cleardata($_POST["msg"]);
if(!empty($name) and !empty($email) and !empty($msg)){
		$gbook->savePost($name,$email,$msg);
		header("Location: gbook.php");
}
else{
	$errMsg = "Заполните все поля формы!";
}

?>