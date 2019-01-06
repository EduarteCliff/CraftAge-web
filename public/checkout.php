<?php
  echo "the checkout page";
  echo "<br>";
  session_start();
  echo "结帐金额:" . $_POST["amount"];
  echo "<br>";
  echo "玩家ID:" . $_SESSION["usr"];
?>
