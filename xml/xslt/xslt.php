<?php
	$xmlDoc = new DOMDocument();
	$xmlDoc->load("catalog.xml");
	$xslDoc = new DOMDocument();
	$xslDoc->load("catalog.xsl");
	$proc = new XSLTProcessor();
	$proc->importStylesheet($xslDoc);
	echo $proc->transformToXML($xmlDoc);
?>