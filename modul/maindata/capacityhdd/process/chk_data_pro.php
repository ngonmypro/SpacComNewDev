<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['CapacityhddStatus'] == 'add') {
      $sql_se = " SELECT capacityhdd_Name FROM tblcapacityhdd WHERE capacityhdd_Name = '".$_POST['add_capacityhdd_name']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblcapacityhdd (capacityhdd_Name, capacityhdd_CreateBy, capacityhdd_CreateTime)
           VALUES ('".$_POST['add_capacityhdd_name']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['CapacityhddStatus'] == 'edit') {
      $sql_up = "UPDATE tblcapacityhdd SET capacityhdd_Name = '".$_POST['edit_capacityhdd_name']."', capacityhdd_UpdateBy = '".$_SESSION['UName']."', capacityhdd_UpdateTime = NOW(), capacityhdd_Status = '".$_POST['edit_capacityhdd_status']."' WHERE capacityhdd_ID = '".$_POST['CapacityhddId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['CapacityhddStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblcapacityhdd WHERE capacityhdd_ID = '".$_POST['CapacityhddId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
