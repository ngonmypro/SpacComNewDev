<?
	session_start();
  // include "Connections/connect_mysql.php";
	$username = $_POST['username'];
	$password = $_POST['password'];

// echo $username.' - '.$password;
// echo "Y";
	if ($username == "admin" && $password == "01256987") {
		$_SESSION['Uuser'] = "admin";
		$_SESSION['UName'] = "Adminstator";

		echo "Y";
	}else {
		echo "username หรือ password ไม่ถูกต้อง <br> หรือคุณอาจ login ที่เครื่องอื่นอยู่แล้ว ";
	}

	// mysql_close($c); //close connection

?>
