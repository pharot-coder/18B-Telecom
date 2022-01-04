<?php
function db_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) {
   $mysqli = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);

   $mysqli->set_charset("utf8");
   if($mysqli->connect_error) 
     die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());

   return $mysqli;
}

$mysqli = db_connect('localhost','root','root','18bdb');

?>