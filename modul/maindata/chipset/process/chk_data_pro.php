<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['ChipStatus'];
    if ($_POST['ChipStatus'] == 'add') {
      $sql_se = " SELECT chipset_Name, chipset_Type FROM tblchipset WHERE chipset_Name = '".$_POST['add_chip_name']."' AND chipset_Type = '".$_POST['add_chip_type']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblchipset (chipset_Name, chipset_CreateBy, chipset_CreateTime, chipset_Type)
           VALUES ('".$_POST['add_chip_name']."','".$_SESSION['UName']."',NOW(),'".$_POST['add_chip_type']."')";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['ChipStatus'] == 'edit') {
      $sql_up = "UPDATE tblchipset SET chipset_Name = '".$_POST['edit_chip_name']."', chipset_Type = '".$_POST['edit_chip_type']."', chipset_UpdateBy = '".$_SESSION['UName']."', chipset_UpdateTime = NOW(), chipset_Status = '".$_POST['edit_chip_status']."' WHERE chipset_ID = '".$_POST['ChipId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['ChipStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblchipset WHERE chipset_ID = '".$_POST['ChipId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
