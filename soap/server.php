<?php
    class StockService {
		function getStock($id) {	
			$stock = array(
				"1" => 100,
				"2" => 200,
				"3" => 300,
				"4" => 400,
				"5" => 500
			);
			if (isset($stock[$id])) {
				$quantity = $stock[$id];		
				return $quantity;
			} else {
				throw new SoapFault("Server", "Несуществующий id товара");
			}	
		}
    }
	ini_set("soap.wsdl_cache_enabled", "0");
	$server = new SoapServer("http://test/soap/stock.wsdl");
	$server->setClass("StockService");
	$server->handle();
?>