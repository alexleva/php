<?php
class User extends AUser{
		public $name;
		public $login;
		public $password;
		static $users = 0; 
		protected $objNum = 0;
		static $count1 = 0;
		const INFO_TITLE = "Данные пользователя:";
		
		function __construct($n=" ",$l=" ",$p=" "){
			
			try{
				if ($n == " " or $l==" " or $p == " ") throw new Exception("Не все данные введены ");
				
			$this->name = $n;
			$this->login = $l;
			$this->password = $p;
			self::$count1++;
			$this->objNum += ++self::$users;
			
			}catch(Exception $e){
				echo $e->getMessage() . "<br>";
				}
		}		
		function showinfo(){
			
			echo " Имя пользователя = " . $this->name . "<br>";
			echo " Login пользователя = " . $this->login. "<br>";
			echo " Password пользователя = " . $this->password. "<br>";
			echo "<br>";
		}	
		function __clone(){
			 
			 $this->name = "Guest"; $this->login = "guest"; $this->password = "qwerty" ;
			 self::$count1++;
			 $this->objNum++;
		}
		function showTitle(){
			echo self::INFO_TITLE;
		}
		
		function __toString() {
			return "Объект #".$this->objNum.": ".$this->name;	
		}
		
		
	}
	

	
?>