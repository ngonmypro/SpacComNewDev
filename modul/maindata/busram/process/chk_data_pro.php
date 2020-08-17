<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['BusramStatus'] == 'add') {
      $sql_se = " SELECT busram_Name, busram_IDtyperam FROM tblbusram WHERE busram_Name = '".$_POST['add_busram_name']."' AND busram_IDtyperam = '".$_POST['add_busram_type']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblbusram (busram_Name, busram_IDtyperam, busram_CreateBy, busram_CreateTime)
           VALUES ('".$_POST['add_busram_name']."','".$_POST['add_busram_type']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['BusramStatus'] == 'edit') {
      $sql_up = "UPDATE tblbusram SET busram_Name = '".$_POST['edit_busram_name']."', busram_IDtyperam = '".$_POST['edit_busram_type']."', busram_UpdateBy = '".$_SESSION['UName']."', busram_UpdateTime = NOW(), busram_Status = '".$_POST['edit_busram_status']."' WHERE busram_ID = '".$_POST['BusramId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['BusramStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblbusram WHERE busram_ID = '".$_POST['BusramId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
