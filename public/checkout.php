<?php
  include "../functions/is_logged_in.php";
	include "../class/class.sql.php";
	include "../config/config.php";
  $sql = new sql();
	$sql->usr = DB_USR;
	$sql->pwd = DB_PWD;
	$sql->db = DB_NAME;
  $sql->query("");
  echo "the checkout page";
  echo "<br>";
  session_start();
  echo "结帐金额:" . $_POST["amount"];
  echo "<br>";
  echo "玩家ID:" . $_SESSION["usr"];
?>
