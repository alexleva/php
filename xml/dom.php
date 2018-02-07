<?php
header("Content-Type:text/html;charset:UTF-8");
$dom = new DOMDocument();
$dom->load("catalog.xml");
$root = $dom->documentElement;
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
	foreach ($root->childNodes as $element) {
		// Проверка на тип элемента
		if ($element->nodeType == 1) {
			echo "\t<tr>\n";
			foreach ($element->childNodes as $book) {
				if ($book->nodeType == 1)	{
					echo "<td>", $book->textContent, "</td>";	
				}	
			}
			echo "\t</tr>\n";
		}
	}
?>
	</table>
</body>
</html>





