<?php
	class sql{
		public $location = "127.0.0.1";
		public $usr;
		public $pwd;
		public $db;
		
      	        //调用方式 query(SQL语句,[是否返回结果]);
		function query($query,$res = 1){
			$connect = mysqli_connect($this->location,$this->usr,$this->pwd);
			mysqli_select_db($connect,$this->db);
			if($result = mysqli_query($connect,$query)){
              	if($res){
            	    $tag = 0;
                    while($row = mysqli_fetch_row($result)){
                        $return[$tag] = $row[0];
                        $tag++;
                    }
                    return $return;
                }
              	else{
                    return 1;
                }
            }
		}
	}
?>
