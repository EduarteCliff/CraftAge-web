<?php
	public class sql{
		public $location = "127.0.0.1";
		public $usr;
		public $pwd;
		public $db;
		
		function query($query){
			$connect = mysqli_connect($this->location,$this->usr,$this->pwd);
			mysqli_select_db($connect,$this->db);
			$result = mysqli_query($connect,$query);
			mysql_close($connect);
			return decode($result);
		}
		
		function decode($result){
			$tag = 0;
			while($row = mysqli_fetch_row($result)){
				$return[$tag] = $row[0];
				$tag++;
			}
			return $return;
		}
	}
?>