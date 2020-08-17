<?php
  session_start();

  if(isset($_SESSION['Uuser'])){
		header("location:index_backend.php");
	}else{
		header("location:index_spaccom.php");
	}

  date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

  	include "connect/create_new_db.php";
  	include "connect/create_new_table.php";

  	include "connect/connect_mysql.php";

 ?>
