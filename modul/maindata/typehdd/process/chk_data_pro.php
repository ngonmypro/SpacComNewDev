<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['TypehddStatus'] == 'add') {
      $sql_se = " SELECT typehdd_Name FROM tbltypehdd WHERE typehdd_Name = '".$_POST['add_typehdd_name']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbltypehdd (typehdd_Name, typehdd_CreateBy, typehdd_CreateTime)
           VALUES ('".$_POST['add_typehdd_name']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['TypehddStatus'] == 'edit') {
      $sql_up = "UPDATE tbltypehdd SET typehdd_Name = '".$_POST['edit_typehdd_name']."', typehdd_UpdateBy = '".$_SESSION['UName']."', typehdd_UpdateTime = NOW(), typehdd_Status = '".$_POST['edit_typehdd_status']."' WHERE typehdd_ID = '".$_POST['TypehddId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['TypehddStatus'] == 'delete') {
      $sql_del = "DELETE FROM tbltypehdd WHERE typehdd_ID = '".$_POST['TypehddId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
