<?php
	function fetch_prefix($num){
		$tag = 1;
		while($num>0){
			$arr[$tag] = $num&1;
			$num>>1;
			$tag++;
		}
		$arr[$tag] = 2;
		return $arr;
	}
	
	function add_prefix($num,$tag){
		$num += 1<<($tag-1);
	}
?>
