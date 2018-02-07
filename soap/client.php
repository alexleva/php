<?php
	try {
		$client = new SoapClient("http://test/soap/stock.wsdl");
		$result = $client->getStock("2");
		echo "Текущий запас на складе: ", $result;
	} catch (SoapFault $exception) {
		echo $exception->getMessage();	
	}
?>