<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['SocketStatus'] == 'add') {
      $sql_se = " SELECT socket_Name, socket_IDchipset FROM tblsocket WHERE socket_Name = '".$_POST['add_socket_name']."' AND socket_IDchipset = '".$_POST['add_socket_chip']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblsocket (socket_IDchipset, socket_Name, socket_CreateBy, socket_CreateTime, socket_Type)
           VALUES ('".$_POST['add_socket_chip']."','".$_POST['add_socket_name']."','".$_SESSION['UName']."',NOW(),'".$_POST['add_socket_type']."')";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['SocketStatus'] == 'edit') {
      $sql_up = "UPDATE tblsocket SET socket_Name = '".$_POST['edit_socket_name']."', socket_IDchipset = '".$_POST['edit_socket_chip']."', socket_UpdateBy = '".$_SESSION['UName']."', socket_UpdateTime = NOW(), socket_Status = '".$_POST['edit_socket_status']."', socket_Type = '".$_POST['edit_socket_type']."' WHERE socket_ID = '".$_POST['SocketId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['SocketStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblsocket WHERE socket_ID = '".$_POST['SocketId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
