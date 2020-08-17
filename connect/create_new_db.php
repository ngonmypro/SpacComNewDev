<?
	$host="localhost";
	$user="root";
	$pw="123456";
	$dbname="";
	$c=mysql_connect($host,$user,$pw);
	$create_db = mysql_query("CREATE DATABASE IF NOT EXISTS computer_db;");
 	if(!$create_db){
		echo"No Create data base";
		mysql_close($c);
		exit();
	}
	mysql_close($c);
 ?>
