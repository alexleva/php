<?php
header("Content-Type:text/html;charset:UTF-8");

function Start($xml,$tag,$attributes){
if($tag != "BOOK" and $tag != "CATALOG"){
	echo "<td>";
}
if($tag == "BOOK"){
	echo "<tr>";
}
	
}
function Ends($xml,$tag){
	if($tag != "BOOK" and $tag != "CATALOG"){
	echo "</td>";
}
if($tag == "BOOK"){
	echo "</tr>";
}
}
function Text($xml,$data){
	echo $data;
}
$parser = xml_parser_create("UTF-8");
xml_set_element_handler($parser,"Start","Ends");
xml_set_character_data_handler($parser,"Text");
	
?>
<html>
	<head>
		<title>Каталог</title>
	</head>
	<body>
	<h1>Каталог книг</h1>
	<table border="1" width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
	<?php
		xml_parse($parser,file_get_contents("catalog.xml"));
	?>
	</table>
	</body>
</html>