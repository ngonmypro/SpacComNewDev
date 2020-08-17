<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['WattpwStatus'] == 'add') {
      $sql_se = " SELECT wattpw_Name FROM tblwattpw WHERE wattpw_Name = '".$_POST['add_wattpw_name']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblwattpw (wattpw_Name, wattpw_CreateBy, wattpw_CreateTime)
           VALUES ('".$_POST['add_wattpw_name']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['WattpwStatus'] == 'edit') {
      $sql_up = "UPDATE tblwattpw SET wattpw_Name = '".$_POST['edit_wattpw_name']."', wattpw_UpdateBy = '".$_SESSION['UName']."', wattpw_UpdateTime = NOW(), wattpw_Status = '".$_POST['edit_wattpw_status']."' WHERE wattpw_ID = '".$_POST['WattpwId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['WattpwStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblwattpw WHERE wattpw_ID = '".$_POST['WattpwId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
