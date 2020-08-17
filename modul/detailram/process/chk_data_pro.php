<?php session_start();
include "../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['RAMStatus'] == 'add') {
      $sql_se = " SELECT detailram_IDbusram, detailram_IDbrand, detailram_Name FROM tbldetailram WHERE detailram_IDbusram = '".$_POST['add_ram_busram']."' AND detailram_IDbrand = '".$_POST['add_ram_brand']."' AND detailram_Name = '".$_POST['add_ram_name']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbldetailram (detailram_IDbusram, detailram_IDbrand, detailram_Name, detailram_warranty, detailram_Price, detailram_CreateBy, detailram_CreateTime)
           VALUES ('".$_POST['add_ram_busram']."','".$_POST['add_ram_brand']."','".$_POST['add_ram_name']."','".$_POST['add_ram_warranty']."','".$_POST['add_ram_price']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['RAMStatus'] == 'edit') {
      $sql_up = "UPDATE tbldetailram SET detailram_IDbusram = '".$_POST['edit_ram_busram']."', detailram_IDbrand = '".$_POST['edit_ram_brand']."', detailram_Name = '".$_POST['edit_ram_name']."', detailram_warranty = '".$_POST['edit_ram_warranty']."',
          detailram_Price = '".$_POST['edit_ram_price']."', detailram_UpdateBy = '".$_SESSION['UName']."',  detailram_UpdateTime = NOW(), detailram_Status = '".$_POST['edit_ram_status']."' WHERE  detailram_ID = '".$_POST['RAMId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['RAMStatus'] == 'delete') {
      $sql_seimg =  "SELECT imgram_Nameimg FROM tblimgram WHERE imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgram_Nameimg'];
        $folder_path = "../../../upload/imagesRAM/$filename";
        unlink($folder_path);
      }

      $sql_delimg = "DELETE FROM tblimgram WHERE imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());

      $sql_del = "DELETE FROM tbldetailram WHERE detailram_ID = '".$_POST['RAMId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['RAMStatus'] == 'ShowImg') {
      $sql_show = "UPDATE tblimgram SET imgram_Status = '1' WHERE imgram_ID = '".$_POST['ImgRAMId']."' AND imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_show = mysql_query($sql_show)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['RAMStatus'] == 'HideImg') {
      $sql_hide = "UPDATE tblimgram SET imgram_Status = '0' WHERE imgram_ID = '".$_POST['ImgRAMId']."' AND imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_hide = mysql_query($sql_hide)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['RAMStatus'] == 'MainImg') {
      $sql_up_unmain = "UPDATE tblimgram SET imgram_Statusmain = '0' WHERE imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_up_unmain = mysql_query($sql_up_unmain)or die(mysql_error());

      $sql_up_main = "UPDATE tblimgram SET imgram_Statusmain = '1' WHERE imgram_ID = '".$_POST['ImgRAMId']."' AND imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_up_main = mysql_query($sql_up_main)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['RAMStatus'] == 'DelImg') {
      $sql_seimg =  "SELECT imgram_Nameimg FROM tblimgram WHERE imgram_ID = '".$_POST['ImgRAMId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgram_Nameimg'];
      }
      $folder_path = "../../../upload/imagesRAM/$filename";

      unlink($folder_path);
      // echo $folder_path;
      $sql_delimg = "DELETE FROM tblimgram WHERE imgram_ID = '".$_POST['ImgRAMId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());
        echo "Y";
    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
