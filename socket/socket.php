<?php
$soc = fsockopen("test",80,$e1,$e2,30);
$str = "name=Jeka&age=25";
$out = "POST /socket/dummy.php HTTP/1.1\r\n";
$out .= "Host: test\r\n";
$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
$out .= "Content-Length: ".strlen($str)."\r\n\r\n";
$out .= $str . "\r\n\r\n";
fputs($soc,$out);
while(!feof($soc)){
	echo fgets($soc,4096)."<br>";
}
fclose($soc);
?>
