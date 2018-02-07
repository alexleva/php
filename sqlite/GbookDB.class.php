<?php
include "IGbookDB.class.php";
	class GbookDB implements IGbookDB{
		const DB_NAME = "gbook.db";
		protected $_db;
		
		function __construct(){
			
			 
			if(!file_exists (self::DB_NAME)){
				$this->_db = new SQLiteDatabase(self::DB_NAME);
				
				$sql="CREATE TABLE msgs(
				id INTEGER PRIMARY KEY,
				name TEXT,
				email TEXT,
				msg TEXT,
				datetime INTEGER,
				ip TEXT
				)";
				$this->_db->query($sql);
			}
			else{
				$this->_db = new SQLiteDatabase(self::DB_NAME);
			}
		}
		function __destruct(){
		unset($this->_db);
		}	
		function cleardata($data){
			$data = stripslashes($data);
			$data = strip_tags($data);
			$data = trim($data);
			$data = sqlite_escape_string($data);
			return $data;
		}
		function savePost($name, $email, $msg){
			$ip = $_SERVER["REMOTE_ADDR"];
			$dt = time();
			$sql = "INSERT INTO msgs(
									name,
									email,
									msg,
									ip,
									datetime)
									VALUES(
									'$name',
									'$email',
									'$msg',
									'$ip',
									 $dt)";
									 
			$this->_db->query($sql);
		}
		function getAll(){
			$sql = "SELECT id , name, email, msg,ip,datetime 
			FROM msgs ORDER BY id DESC";
			$result = $this->_db->arrayQuery($sql,SQLITE_ASSOC);
			return $result;
		}
		function deletePost($id){
			$sql = "DELETE FROM msgs
			WHERE id = $id";
			$this->_db->query($sql);
		}		
		
	}
	
?>