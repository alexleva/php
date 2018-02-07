<?php
$users = $gbook->getAll();
echo "<p>Всего записей: ".count($users);
 foreach($users as $user){
	$id = $user["id"];
	$name = $user["name"];
	$email = $user["email"];
	$msg = nl2br($user["msg"]);
	$ip = $user["ip"];
	$dt = date("d-m-Y H:i:s",$user["datetime"]*1);
	echo <<<LABEL
	<hr>
	<p>
		<a href="mailto:$email">$name</a> from[$ip
] @ $dt
		<br>$msg
	</p>
	<p align="right">
	<a href="gbook.php?del=$id">DELETE</a>
	</p>
LABEL;
 }

?>