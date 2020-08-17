<?php session_start();
include "../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['VGAStatus'] == 'add') {
      $sql_se = " SELECT detailvga_Model, detailvga_IDseries, detailvga_IDbrand, detailvga_IDtyperam FROM tbldetailvga WHERE detailvga_Model = '".$_POST['add_vga_name']."' AND detailvga_IDseries = '".$_POST['add_vga_series']."'
                  AND detailvga_IDbrand = '".$_POST['add_vga_brand']."' AND detailvga_IDtyperam = '".$_POST['add_vga_typeram']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbldetailvga (detailvga_IDseries, detailvga_IDbrand, detailvga_Model, detailvga_GPUspeed, detailvga_Ramspeed, detailvga_Capacityram, detailvga_IDtyperam, detailvga_Bus, detailvga_DVIport, detailvga_HDMIport, detailvga_Displayport, detailvga_TDP, detailvga_warranty, detailvga_Price, detailvga_CreateBy, detailvga_CreateTime)
           VALUES ('".$_POST['add_vga_series']."','".$_POST['add_vga_brand']."','".$_POST['add_vga_name']."','".$_POST['add_vga_gpuspeed']."','".$_POST['add_vga_ramspeed']."','".$_POST['add_vga_capacityram']."','".$_POST['add_vga_typeram']."','".$_POST['add_vga_bus']."','".$_POST['add_vga_dviport']."',
             '".$_POST['add_vga_hdmiport']."','".$_POST['add_vga_displayport']."','".$_POST['add_vga_tdp']."','".$_POST['add_vga_warranty']."','".$_POST['add_vga_price']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['VGAStatus'] == 'edit') {
      $sql_up = "UPDATE tbldetailvga SET detailvga_IDseries = '".$_POST['edit_vga_series']."', detailvga_IDbrand = '".$_POST['edit_vga_brand']."', detailvga_Model = '".$_POST['edit_vga_name']."', detailvga_GPUspeed = '".$_POST['edit_vga_gpuspeed']."', detailvga_Ramspeed = '".$_POST['edit_vga_ramspeed']."',
          detailvga_Capacityram = '".$_POST['edit_vga_capacityram']."', detailvga_IDtyperam = '".$_POST['edit_vga_typeram']."', detailvga_Bus = '".$_POST['edit_vga_bus']."', detailvga_DVIport = '".$_POST['edit_vga_dviport']."', detailvga_HDMIport = '".$_POST['edit_vga_hdmiport']."',
          detailvga_Displayport = '".$_POST['edit_vga_displayport']."', detailvga_TDP = '".$_POST['edit_vga_tdp']."', detailvga_warranty = '".$_POST['edit_vga_warranty']."', detailvga_Price = '".$_POST['edit_vga_price']."', detailvga_UpdateBy = '".$_SESSION['UName']."', detailvga_UpdateTime = NOW(),
          detailvga_Status = '".$_POST['edit_vga_status']."' WHERE detailvga_ID = '".$_POST['VGAId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['VGAStatus'] == 'delete') {
      $sql_seimg =  "SELECT imgvga_Nameimg FROM tblimgvga WHERE imgvga_IDdetailvga = '".$_POST['VGAId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgvga_Nameimg'];
        $folder_path = "../../../upload/imagesVGA/$filename";
        unlink($folder_path);
      }

      $sql_delimg = "DELETE FROM tblimgvga WHERE imgvga_IDdetailvga = '".$_POST['VGAId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());

      $sql_del = "DELETE FROM tbldetailvga WHERE detailvga_ID = '".$_POST['VGAId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['VGAStatus'] == 'ShowImg') {
      $sql_show = "UPDATE tblimgvga SET imgvga_Status = '1' WHERE imgvga_ID = '".$_POST['ImgVGAId']."' AND imgvga_IDdetailvga = '".$_POST['VGAId']."'";
      $result_show = mysql_query($sql_show)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['VGAStatus'] == 'HideImg') {
      $sql_hide = "UPDATE tblimgvga SET imgvga_Status = '0' WHERE imgvga_ID = '".$_POST['ImgVGAId']."' AND imgvga_IDdetailvga = '".$_POST['VGAId']."'";
      $result_hide = mysql_query($sql_hide)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['VGAStatus'] == 'MainImg') {
      $sql_up_unmain = "UPDATE tblimgvga SET imgvga_Statusmain = '0' WHERE imgvga_IDdetailvga = '".$_POST['VGAId']."'";
      $result_up_unmain = mysql_query($sql_up_unmain)or die(mysql_error());

      $sql_up_main = "UPDATE tblimgvga SET imgvga_Statusmain = '1' WHERE imgvga_ID = '".$_POST['ImgVGAId']."' AND imgvga_IDdetailvga = '".$_POST['VGAId']."'";
      $result_up_main = mysql_query($sql_up_main)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['VGAStatus'] == 'DelImg') {
      $sql_seimg =  "SELECT imgvga_Nameimg FROM tblimgvga WHERE imgvga_ID = '".$_POST['ImgVGAId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgvga_Nameimg'];
      }
      $folder_path = "../../../upload/imagesVGA/$filename";

      unlink($folder_path);
      // echo $folder_path;
      $sql_delimg = "DELETE FROM tblimgvga WHERE imgvga_ID = '".$_POST['ImgVGAId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());
        echo "Y";
    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
