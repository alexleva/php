<?php

error_reporting(E_ALL);

try {
	$dsn = new PDO("sqlite2:users.db");

	$stmt = $dsn->prepare('SELECT * FROM user ORDER BY id');

	$stmt->execute();

	$it = new IteratorIterator($stmt);
	foreach($it as $row){
		$arrayObj = new ArrayObject($row);
		
		for($iterator = $arrayObj->getIterator();$iterator->valid();$iterator->next()){
	
			echo $iterator->current() . '<br />';
		}
		echo '<hr />';
	}

	$dsn = null;

}catch (PDOException $e){
	print "Error!: " . $e->getMessage() . "<br />";
}
?>