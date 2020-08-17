<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['SeriesStatus'] == 'add') {
      $sql_se = " SELECT series_Name, series_IDchipset FROM tblseries WHERE series_Name = '".$_POST['add_series_name']."' AND series_IDchipset = '".$_POST['add_series_chip']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblseries (series_IDchipset, series_Name, series_CreateBy, series_CreateTime)
           VALUES ('".$_POST['add_series_chip']."','".$_POST['add_series_name']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['SeriesStatus'] == 'edit') {
      $sql_up = "UPDATE tblseries SET series_Name = '".$_POST['edit_series_name']."', series_IDchipset = '".$_POST['edit_series_chip']."', series_UpdateBy = '".$_SESSION['UName']."', series_UpdateTime = NOW(), series_Status = '".$_POST['edit_series_status']."' WHERE series_ID = '".$_POST['SeriesId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['SeriesStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblseries WHERE series_ID = '".$_POST['SeriesId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
