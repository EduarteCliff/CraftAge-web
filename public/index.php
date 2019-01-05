<?php
	start:
	session_start();
	include "../config/config.php";
	if(isset($_SESSION["usr"])){
		include "../class/class.sql.php";
		$sql = new sql();
		$sql->usr = DB_USR;
		$sql->pwd = DB_PWD;
		$sql->db = DB_NAME;
		$query = $sql->query("select count(*) from ".DB_CLASS." where usr = '".$_SESSION["usr"]."' && pwd = '".$_SESSION["pwd"]."'");
		if(!$query[0]){
			session_destroy();
			goto start;
		}
		$page = file_get_contents("../html/index.html");
		$page = str_replace("<!--!*usr_img*!-->","/img/usr/" . $_SESSION["usr"] . ".png",$page);
	}
	else if(isset($_POST["usr"])){
		include "../class/class.sql.php";
		$sql = new sql();
		$sql->usr = DB_USR;
		$sql->pwd = DB_PWD;
		$sql->db = DB_NAME;
		$query = $sql->query("select count(*) from ".DB_CLASS." where usr = '".$_POST["usr"]."' && pwd = '".md5($_POST["pwd"])."'");
		if(!$query[0]){
			session_destroy();
			goto start;
		}
		$_SESSION["usr"] = $_POST["usr"];
		$_SESSION["pwd"] = md5($_POST["pwd"]);
		$page = file_get_contents("../html/index.html");
		$page = str_replace("<!--!*usr_img*!-->","/img/usr/" . $_SESSION["usr"] . ".png",$page);
	}
	else{
		$page = file_get_contents("../html/index.html");
		$page = str_replace("<!--!*usr_img*!-->","<a href='/login/'>登陆</a>",$page);
	}
	echo $page;
?>