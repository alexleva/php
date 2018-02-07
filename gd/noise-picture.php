<?php
session_start();

$im = imageCreateFromJPEG("images/noise.jpg");
$black = imagecolorallocate($im, 64, 64, 64);
imageantialias($im, true);
$nChars = 5;
$randStr = substr(md5(uniqid()), 0, $nChars);
$_SESSION["randStr"] = $randStr;
$x = 20;
$y = 30;
$deltaX = 40;

for ($i=0; $i<strlen($randStr); $i++)
{
	$size = rand(18, 30);
	$angle = -30 + rand(0,60);
	imageTTFText($im, $size, $angle, $x, $y, $black, "fonts/bellb.ttf", 
		$randStr{$i});
	$x += $deltaX;
}

header("Content-type: image/jpeg");
imageJPEG($im, "", 90);
?>
