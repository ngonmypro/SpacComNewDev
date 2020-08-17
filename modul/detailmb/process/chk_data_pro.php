<?php session_start();
include "../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['MBStatus'] == 'add') {
      $sql_se = " SELECT detailmb_IDsocket, detailmb_IDbrand, detailmb_Model, detailmb_Price FROM tbldetailmb WHERE detailmb_IDsocket = '".$_POST['add_mb_socket']."' AND detailmb_IDbrand = '".$_POST['add_mb_brand']."'
                  AND detailmb_Model = '".$_POST['add_mb_name']."' AND detailmb_Price = '".$_POST['add_mb_price']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbldetailmb (detailmb_IDsocket, detailmb_IDbrand, detailmb_Model, detailmb_Graphic, detailmb_Audio, detailmb_Sata, detailmb_M2, detailmb_Slot, detailmb_Lanspeed, detailmb_Usb2,
             detailmb_Usb3, detailmb_DVIport, detailmb_HDMIport, detailmb_Audioport, detailmb_Lanport, detailmb_FromFactor, detailmb_warranty, detailmb_Price, detailmb_CreateBy, detailmb_CreateTime)
           VALUES ('".$_POST['add_mb_socket']."','".$_POST['add_mb_brand']."','".$_POST['add_mb_name']."','".$_POST['add_mb_graphics']."','".$_POST['add_mb_audio']."','".$_POST['add_mb_sata']."','".$_POST['add_mb_m2']."',
             '".$_POST['add_mb_slot']."','".$_POST['add_mb_lanspeed']."','".$_POST['add_mb_usb2']."','".$_POST['add_mb_usb3']."','".$_POST['add_mb_dviport']."','".$_POST['add_mb_hdmiport']."','".$_POST['add_mb_audioport']."',
             '".$_POST['add_mb_lanport']."','".$_POST['add_mb_fromfactor']."','".$_POST['add_mb_warranty']."','".$_POST['add_mb_price']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
              $NewIdMB = mysql_insert_id();

              $add_mb_busram = explode(",",$_POST['add_mb_busram']);
              for ($i=0; $i < $_POST['newnumcountbusram']; $i++) {
                $sql_in_busram = " INSERT INTO tblmbbusram(mbbusram_IDbusram, mbbusram_IDdetailmb, mbbusram_CreateBy, mbbusram_CreateTime)
                VALUES ($add_mb_busram[$i],$NewIdMB,'".$_SESSION['UName']."',NOW())";
                $result_in_busram = mysql_query($sql_in_busram)or die(mysql_error());
              }

              $add_mb_series = explode(",",$_POST['add_mb_series']);
              for ($i=0; $i < $_POST['newnumcountseries']; $i++) {
                $sql_in_series = " INSERT INTO tblmbseriescpu(mbseriescpu_IDseries, mbseriescpu_IDDetailMB, mbseriescpu_CreateBy, mbseriescpu_CreateTime)
                VALUES ($add_mb_series[$i],$NewIdMB,'".$_SESSION['UName']."',NOW())";
                $result_in_series = mysql_query($sql_in_series)or die(mysql_error());
              }
            echo "Y";
         }

    }else if ($_POST['MBStatus'] == 'edit') {
      $sql_up = "UPDATE tbldetailmb SET detailmb_IDsocket = '".$_POST['edit_mb_socket']."', detailmb_IDbrand = '".$_POST['edit_mb_brand']."', detailmb_Model = '".$_POST['edit_mb_name']."', detailmb_Graphic = '".$_POST['edit_mb_graphics']."',
       detailmb_Audio = '".$_POST['edit_mb_audio']."', detailmb_Sata = '".$_POST['edit_mb_sata']."', detailmb_M2 = '".$_POST['edit_mb_m2']."', detailmb_Slot = '".$_POST['edit_mb_slot']."', detailmb_Lanspeed = '".$_POST['edit_mb_lanspeed']."',
       detailmb_Usb2 = '".$_POST['edit_mb_usb2']."', detailmb_Usb3 = '".$_POST['edit_mb_usb3']."', detailmb_DVIport = '".$_POST['edit_mb_dviport']."', detailmb_HDMIport = '".$_POST['edit_mb_hdmiport']."', detailmb_Audioport = '".$_POST['edit_mb_audioport']."',
       detailmb_Lanport = '".$_POST['edit_mb_lanport']."', detailmb_FromFactor = '".$_POST['edit_mb_fromfactor']."', detailmb_warranty = '".$_POST['edit_mb_warranty']."', detailmb_Price = '".$_POST['edit_mb_price']."', detailmb_UpdateBy = '".$_SESSION['UName']."',
       detailmb_UpdateTime = NOW(),detailmb_Status = '".$_POST['edit_mb_status']."' WHERE detailmb_ID = '".$_POST['MBId']."'";
       $result_up = mysql_query($sql_up)or die(mysql_error());

      $sql_del_busram = "DELETE FROM tblmbbusram WHERE mbbusram_IDdetailmb = '".$_POST['MBId']."'";
      $result_del_busram = mysql_query($sql_del_busram)or die(mysql_error());

      $sql_del_seriescpu = "DELETE FROM tblmbseriescpu WHERE mbseriescpu_IDDetailMB = '".$_POST['MBId']."'";
      $result_del_seriescpu = mysql_query($sql_del_seriescpu)or die(mysql_error());

      $edit_mb_busram = explode(",",$_POST['edit_mb_busram']);
      for ($i=0; $i < $_POST['newnumcountbusram']; $i++) {
        $sql_in_busram = " INSERT INTO tblmbbusram(mbbusram_IDbusram, mbbusram_IDdetailmb, mbbusram_CreateBy, mbbusram_CreateTime)
        VALUES ($edit_mb_busram[$i],'".$_POST['MBId']."','".$_SESSION['UName']."',NOW())";
        $result_in_busram = mysql_query($sql_in_busram)or die(mysql_error());
      }

      $edit_mb_series = explode(",",$_POST['edit_mb_series']);
      for ($i=0; $i < $_POST['newnumcountseries']; $i++) {
        $sql_in_series = " INSERT INTO tblmbseriescpu(mbseriescpu_IDseries, mbseriescpu_IDDetailMB, mbseriescpu_CreateBy, mbseriescpu_CreateTime)
        VALUES ($edit_mb_series[$i],'".$_POST['MBId']."','".$_SESSION['UName']."',NOW())";
        $result_in_series = mysql_query($sql_in_series)or die(mysql_error());
      }
        echo "Y";

    }elseif ($_POST['MBStatus'] == 'delete') {
      $sql_seimg =  "SELECT imgmb_Nameimg FROM tblimgmb WHERE imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgmb_Nameimg'];
        $folder_path = "../../../upload/imagesMB/$filename";
        unlink($folder_path);
      }

      $sql_delimg = "DELETE FROM tblimgmb WHERE imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());

      $sql_del = "DELETE FROM tbldetailmb WHERE detailmb_ID = '".$_POST['MBId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());

      $sql_del_busram = "DELETE FROM tblmbbusram WHERE mbbusram_IDdetailmb = '".$_POST['MBId']."'";
      $result_del_busram = mysql_query($sql_del_busram)or die(mysql_error());

      $sql_del_seriescpu = "DELETE FROM tblmbseriescpu WHERE mbseriescpu_IDDetailMB = '".$_POST['MBId']."'";
      $result_del_seriescpu = mysql_query($sql_del_seriescpu)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['MBStatus'] == 'ShowImg') {
      $sql_show = "UPDATE tblimgmb SET imgmb_Status = '1' WHERE imgmb_ID = '".$_POST['ImgMBId']."' AND imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_show = mysql_query($sql_show)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['MBStatus'] == 'HideImg') {
      $sql_hide = "UPDATE tblimgmb SET imgmb_Status = '0' WHERE imgmb_ID = '".$_POST['ImgMBId']."' AND imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_hide = mysql_query($sql_hide)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['MBStatus'] == 'MainImg') {
      $sql_up_unmain = "UPDATE tblimgmb SET imgmb_Statusmain = '0' WHERE imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_up_unmain = mysql_query($sql_up_unmain)or die(mysql_error());

      $sql_up_main = "UPDATE tblimgmb SET imgmb_Statusmain = '1' WHERE imgmb_ID = '".$_POST['ImgMBId']."' AND imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_up_main = mysql_query($sql_up_main)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['MBStatus'] == 'DelImg') {
      $sql_seimg =  "SELECT imgmb_Nameimg FROM tblimgmb WHERE imgmb_ID = '".$_POST['ImgMBId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgmb_Nameimg'];
      }
      $folder_path = "../../../upload/imagesMB/$filename";

      unlink($folder_path);
      // echo $folder_path;
      $sql_delimg = "DELETE FROM tblimgmb WHERE imgmb_ID = '".$_POST['ImgMBId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());
        echo "Y";
    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
