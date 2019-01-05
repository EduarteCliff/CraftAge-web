<?php
	function fetch_prefix($num){
		$tag = 1;
		while($num>0){
			$arr[$tag] = $num&1;
			$num>>1;
			$tag++;
		}
		return $arr;
	}
?>