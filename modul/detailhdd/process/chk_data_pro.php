<?php session_start();
include "../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['HDDStatus'] == 'add') {
      $sql_se = " SELECT detailhdd_IDcapacity, detailhdd_IDtypehdd, detailhdd_IDbrand, detailhdd_Model FROM tbldetailhdd WHERE detailhdd_IDcapacity = '".$_POST['add_hdd_capacity']."' AND detailhdd_IDtypehdd = '".$_POST['add_hdd_typehdd']."' AND detailhdd_IDbrand = '".$_POST['add_hdd_brand']."' AND detailhdd_Model = '".$_POST['add_hdd_name']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbldetailhdd (detailhdd_IDcapacity, detailhdd_IDtypehdd, detailhdd_IDbrand, detailhdd_Model, detailhdd_Interface, detailhdd_Price, detailhdd_warranty, detailhdd_CreateBy, detailhdd_CreateTime)
           VALUES ('".$_POST['add_hdd_capacity']."','".$_POST['add_hdd_typehdd']."','".$_POST['add_hdd_brand']."','".$_POST['add_hdd_name']."','".$_POST['add_hdd_interface']."','".$_POST['add_hdd_price']."','".$_POST['add_hdd_warranty']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['HDDStatus'] == 'edit') {
      $sql_up = "UPDATE tbldetailhdd SET detailhdd_IDcapacity = '".$_POST['edit_hdd_capacity']."', detailhdd_IDtypehdd = '".$_POST['edit_hdd_typehdd']."', detailhdd_IDbrand = '".$_POST['edit_hdd_brand']."', detailhdd_Model = '".$_POST['edit_hdd_name']."',
          detailhdd_Interface = '".$_POST['edit_hdd_interface']."', detailhdd_Price = '".$_POST['edit_hdd_price']."', detailhdd_warranty = '".$_POST['edit_hdd_warranty']."', detailhdd_UpdateBy = '".$_SESSION['UName']."',  detailhdd_UpdateTime = NOW(),
          detailhdd_Status = '".$_POST['edit_hdd_status']."' WHERE  detailhdd_ID = '".$_POST['HDDId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['HDDStatus'] == 'delete') {
      $sql_seimg =  "SELECT imghdd_Nameimg FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imghdd_Nameimg'];
        $folder_path = "../../../upload/imagesHDD/$filename";
        unlink($folder_path);
      }

      $sql_delimg = "DELETE FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());

      $sql_del = "DELETE FROM tbldetailhdd WHERE detailhdd_ID = '".$_POST['HDDId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['HDDStatus'] == 'ShowImg') {
      $sql_show = "UPDATE tblimghdd SET imghdd_Status = '1' WHERE imghdd_ID = '".$_POST['ImgHDDId']."' AND imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_show = mysql_query($sql_show)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['HDDStatus'] == 'HideImg') {
      $sql_hide = "UPDATE tblimghdd SET imghdd_Status = '0' WHERE imghdd_ID = '".$_POST['ImgHDDId']."' AND imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_hide = mysql_query($sql_hide)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['HDDStatus'] == 'MainImg') {
      $sql_up_unmain = "UPDATE tblimghdd SET imghdd_Statusmain = '0' WHERE imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_up_unmain = mysql_query($sql_up_unmain)or die(mysql_error());

      $sql_up_main = "UPDATE tblimghdd SET imghdd_Statusmain = '1' WHERE imghdd_ID = '".$_POST['ImgHDDId']."' AND imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_up_main = mysql_query($sql_up_main)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['HDDStatus'] == 'DelImg') {
      $sql_seimg =  "SELECT imghdd_Nameimg FROM tblimghdd WHERE imghdd_ID = '".$_POST['ImgHDDId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imghdd_Nameimg'];
      }
      $folder_path = "../../../upload/imagesHDD/$filename";

      unlink($folder_path);
      // echo $folder_path;
      $sql_delimg = "DELETE FROM tblimghdd WHERE imghdd_ID = '".$_POST['ImgHDDId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());
        echo "Y";
    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
