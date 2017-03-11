<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $datbase = "crud_php_db";
  $link = mysqli_connect($host,$user,$password);
  $link->select_db($datbase);
?>
