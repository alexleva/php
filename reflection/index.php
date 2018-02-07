<?php
class ClassOne{
	public function sayHelloOne(){
		echo "Привет от ".__CLASS__."!";
	}
}
class ClassTwo{
	public function sayHelloTwo(){
		echo "Привет от ".__CLASS__."!";
	}
}
class ClassThree{
	public function sayHelloThree(){
		echo "Привет от ".__CLASS__."!";
	}
}
class ClassDelegator{
	private $list;
	function __construct(){
		$this->list[] = new stdClass();
	}
	function addObject($obj){
		
		$this->list[] = $obj;
	}
	function __call($name, $args){
		
		foreach($this->list as $obj){
			
			$r = new ReflectionClass($obj);
		
			if($r->hasMethod($name)){
                $method = $r->getMethod($name);
				if($method->isPublic() && !$method->isAbstract()){
					return $method->invoke($obj,$args);
				}
			}
		}
	}
}

$obj = new ClassDelegator();
$obj->addObject(new ClassThree());
$obj->addObject(new ClassTwo());
$obj->sayHelloThree();
$obj->sayHelloOne();
$obj->sayHelloTwo();

?>