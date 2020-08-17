<?php session_start();
include "../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['PWStatus'] == 'add') {
      $sql_se = " SELECT detailpw_IDbrand, detailpw_IDwattpw, detailpw_Model FROM tbldetailpw WHERE detailpw_IDbrand = '".$_POST['']."' AND detailpw_IDwattpw = '".$_POST['']."' AND detailpw_Model = '".$_POST['']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbldetailpw (detailpw_IDbrand, detailpw_IDwattpw, detailpw_Model, detailpw_MBconnector, detailpw_CPUconnector, detailpw_PCIExconnector, detailpw_SATAconnector, detailpw_MOLEXconnector, detailpw_Powerinput, detailpw_Price, detailpw_Warranty, detailpw_CreateBy, detailpw_CreateTime)
           VALUES ('".$_POST['add_pw_brand']."','".$_POST['add_pw_watt']."','".$_POST['add_pw_name']."','".$_POST['add_pw_mbconnector']."','".$_POST['add_pw_cpuconnector']."','".$_POST['add_pw_pciexconnector']."',
             '".$_POST['add_pw_sataconnector']."','".$_POST['add_pw_molexconnector']."','".$_POST['add_pw_powerinput']."','".$_POST['add_pw_price']."','".$_POST['add_pw_warranty']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['PWStatus'] == 'edit') {
      $sql_up = "UPDATE tbldetailpw SET detailpw_IDbrand = '".$_POST['edit_pw_brand']."', detailpw_IDwattpw = '".$_POST['edit_pw_watt']."', detailpw_Model = '".$_POST['edit_pw_name']."', detailpw_MBconnector = '".$_POST['edit_pw_mbconnector']."',
          detailpw_CPUconnector = '".$_POST['edit_pw_cpuconnector']."', detailpw_PCIExconnector = '".$_POST['edit_pw_pciexconnector']."', detailpw_SATAconnector = '".$_POST['edit_pw_sataconnector']."', detailpw_MOLEXconnector = '".$_POST['edit_pw_molexconnector']."',
          detailpw_Powerinput = '".$_POST['edit_pw_powerinput']."', detailpw_Price = '".$_POST['edit_pw_price']."', detailpw_Warranty = '".$_POST['edit_pw_warranty']."', detailpw_UpdateBy = '".$_SESSION['UName']."',  detailpw_UpdateTime = NOW(),
          detailpw_Status = '".$_POST['edit_pw_status']."' WHERE  detailpw_ID = '".$_POST['PWId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['PWStatus'] == 'delete') {
      $sql_seimg =  "SELECT imgpw_Nameimg FROM tblimgpw WHERE imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgpw_Nameimg'];
        $folder_path = "../../../upload/imagesPW/$filename";
        unlink($folder_path);
      }

      $sql_delimg = "DELETE FROM tblimgpw WHERE imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());

      $sql_del = "DELETE FROM tbldetailpw WHERE detailpw_ID = '".$_POST['PWId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['PWStatus'] == 'ShowImg') {
      $sql_show = "UPDATE tblimgpw SET imgpw_Status = '1' WHERE imgpw_ID = '".$_POST['ImgPWId']."' AND imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_show = mysql_query($sql_show)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['PWStatus'] == 'HideImg') {
      $sql_hide = "UPDATE tblimgpw SET imgpw_Status = '0' WHERE imgpw_ID = '".$_POST['ImgPWId']."' AND imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_hide = mysql_query($sql_hide)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['PWStatus'] == 'MainImg') {
      $sql_up_unmain = "UPDATE tblimgpw SET imgpw_Statusmain = '0' WHERE imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_up_unmain = mysql_query($sql_up_unmain)or die(mysql_error());

      $sql_up_main = "UPDATE tblimgpw SET imgpw_Statusmain = '1' WHERE imgpw_ID = '".$_POST['ImgPWId']."' AND imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_up_main = mysql_query($sql_up_main)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['PWStatus'] == 'DelImg') {
      $sql_seimg =  "SELECT imgpw_Nameimg FROM tblimgpw WHERE imgpw_ID = '".$_POST['ImgPWId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgpw_Nameimg'];
      }
      $folder_path = "../../../upload/imagesPW/$filename";

      unlink($folder_path);
      // echo $folder_path;
      $sql_delimg = "DELETE FROM tblimgpw WHERE imgpw_ID = '".$_POST['ImgPWId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());
        echo "Y";
    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
