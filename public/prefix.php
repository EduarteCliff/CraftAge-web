<?php
	include "../functions/is_logged_in.php";
	include "../functions/fetch_binary.php";
	include "../class/class.sql.php";
	include "../config/config.php";
	$sql = new sql();
	$sql->usr = DB_USR;
	$sql->pwd = DB_PWD;
	$sql->db = DB_NAME;
	$query = $sql->query("select prefix from ".DB_CLASS." where usr = '".$_SESSION["usr"]."'");
	$prefix = fetch_binary($query[0]);
	echo file_get_contents("../html/prefix/head.html");
	$i = 0;
	while($prefix[$i]!=2){
		if($prefix[$i]){
			echo file_get_contents("../html/prefix/" . $i . ".html");
		}
		$i++;
	}
	echo file_get_contents("../html/prefix/foot.html");
?>
