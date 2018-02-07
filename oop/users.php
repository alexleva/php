<?php
   function __autoload($name){
	   include "$name.class.php";
   }
   
   $User1 = new User("jeka123","q1w2e3","ssss");
	
 	$User2= new User("Kolya","koka21","123123");
	
	$User3 = new User("Dima","Dimon","Tyryry");
	
	
	$User1->showTitle();
	$User1->showinfo();
	$User2->showTitle();
	$User2->showinfo();
	$User3->showTitle();
	$User3->showinfo();
	
	
	
	$User4 = clone $User1;
	$User4->showTitle();
	$User4->showinfo();
	
	$SuperUser1 = new SuperUser("Jonh","jn","123wer","admin");
	
	$SuperUser1->showinfo();
	
	$SuperUser1->getInfo();
	print_r($SuperUser1->getInfo());



	echo "<hr>";
	echo "Всего поль. = " . User::$count1 . "<br>";
	echo "Всего поль. адм. = " . SuperUser::$count2 . "<br>";
	
	function checkObject($obj=" "){
		
		if($obj instanceof SuperUser){
			echo "что данный пользователь обладает правами администратора";
		}
		elseif($obj instanceof User){
			echo "что данный пользователь является обычным пользователем111";
		}
		else
			echo "то данный пользователь - неизвестный пользователь";
		
	}
	checkObject($SuperUser1);
	
	
	echo "<p>Количество обычных пользователей - ",
	        User::$users;
		
	echo "<p>Количество суперпользователей - ",
	        SuperUser::$count2;
	echo "<hr>", $User1->__toString($User1);
	echo "<hr>", $User2->__toString($User2);
	echo "<hr>", $User3->__toString($User3);
	echo "<hr>", $User4->__toString($User4);
	echo "<hr>", $SuperUser1->__toString($SuperUser1);
?>