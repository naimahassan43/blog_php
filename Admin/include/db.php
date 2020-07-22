<?php 

 $db = mysqli_connect("localhost","root","","ssb275");

 if($db){
 	//echo "Database Connected";
 }
 else{
 	die("MySQLi Error". mysqli_error($db));
 }

?>