<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['TyperamStatus'] == 'add') {
      $sql_se = " SELECT typeram_Name, typeram_Type FROM tbltyperam WHERE typeram_Name = '".$_POST['add_typeram_name']."' AND typeram_Type = '".$_POST['add_typeram_type']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbltyperam (typeram_Name, typeram_CreateBy, typeram_CreateTime, typeram_Type)
           VALUES ('".$_POST['add_typeram_name']."','".$_SESSION['UName']."',NOW() , '".$_POST['add_typeram_type']."')";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['TyperamStatus'] == 'edit') {
      $sql_up = "UPDATE tbltyperam SET typeram_Name = '".$_POST['edit_typeram_name']."', typeram_UpdateBy = '".$_SESSION['UName']."', typeram_UpdateTime = NOW(), typeram_Type = '".$_POST['edit_typeram_type']."', typeram_Status = '".$_POST['edit_typeram_status']."' WHERE typeram_ID = '".$_POST['TyperamId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['TyperamStatus'] == 'delete') {
      $sql_del = "DELETE FROM tbltyperam WHERE typeram_ID = '".$_POST['TyperamId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
