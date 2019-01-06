<?php
	function fetch_binary($num){
		$tag = 1;
		while($num>0){
			$arr[$tag] = $num&1;
			$num = $num>>1;
			$tag++;
		}
		$arr[$tag] = 2;
		return $arr;
	}
	
	function add($num,$tag){
		return $num+(1<<($tag-1));
	}
?>
