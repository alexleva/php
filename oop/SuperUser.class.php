<?php
class SuperUser extends User implements ISuperUser {
		static $count2 = 0;
		public $role = "admin";
		function __construct($n,$l,$p,$r){
			parent:: __construct($n,$l,$p);
			$this->role = $r;
			self::$count2++;
			parent::$count1--;
			
		}	
		
		function showinfo(){
			parent :: showinfo();
			echo "Роль = " . $this->role."<br>";
		}		
		function getInfo(){
			$arr = array();
			foreach ($this as $n=>$v){
				$arr[$n] = $v;
			}
			return $arr;
		}
	}
	




?>