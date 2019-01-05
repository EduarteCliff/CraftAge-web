<?php
	session_start();
	if(isset($_SESSION["usr"])){
		header("location:/");
	}
	include "../class/class.sql.php";
	include "../config/config.php";
	if(isset($_POST["usr"])){
		$body = file_get_contents("../html/login_2.html");
		$sql = new sql();
		$sql->usr = DB_USR;
		$sql->pwd = DB_PWD;
		$sql->db = DB_NAME;
		$query = $sql->query("select count(*) from ".DB_CLASS." where usr = '".$_POST["usr"]."' && pwd = '".md5($_POST["pwd"])."'");
		if($query[0]){
			$_SESSION["usr"] = $_POST["usr"];
			$_SESSION["pwd"] = md5($_POST["pwd"]);
			$body = str_replace("<!--notify-->","<script>sweetAlert('success', '登陆成功!','success')</script>",$body);
		}
		else{
			$body = str_replace("<!--notify-->","<script>sweetAlert('Oops', '用户名或密码错误!','error')</script>",$body);
		}
		echo $body;
	}
	else{
		$body = file_get_contents("../html/login.html");
		echo $body;
	}
?>