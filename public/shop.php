<?php
	include "../functions/is_logged_in.php";
	include "../class/class.sql.php";
	include "../config/config.php";
	//每页展示商品数
	define('MAXN','20');
	echo file_get_contents("../html/shop/head.html");
	$query = new sql();
	$sql->usr = DB_USR;
	$sql->pwd = DB_PWD;
	$sql->db = DB_NAME;
	$result = $sql->query("select count(id) from shop");
	if(isset($_GET["page"])){
		$max = $_GET["page"]*MAXN;
		if($result[0]<$max){
			$max = $result[0]
		}
		while(--$max){
			$body = file_get_contents("../html/shop/".$max+$_GET["page"]*MAXN.".html");
			echo $body;
		}
	}
	else{
		if($result[0]<MAXN){
			while(--$result[0]){
				$body = file_get_contents("../html/shop/".$result[0].".html");
				echo $body;
			}
		}
		else{
			$i = 1;
			while($i<=MAXN){
				$body = file_get_contents("../html/shop/".$i.".html");
				echo $body;
				$i++;
			}
		}
	}
	echo file_get_contents("../html/shop/foot.html");
?>
