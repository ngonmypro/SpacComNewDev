<?php session_start();
include "../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['CPUStatus'] == 'add') {
      $sql_se = " SELECT detailcpu_Model, detailcpu_IDseries, detailcpu_IDsocket, detailcpu_Price FROM tbldetailcpu WHERE detailcpu_Model = '".$_POST['add_cpu_name']."' AND detailcpu_IDseries = '".$_POST['add_cpu_series']."'
                  AND detailcpu_IDsocket = '".$_POST['add_cpu_socket']."' AND detailcpu_Price = '".$_POST['add_cpu_price']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tbldetailcpu (detailcpu_IDseries, detailcpu_IDsocket, detailcpu_Model, detailcpu_Core, detailcpu_Thread, detailcpu_Frequency, detailcpu_Turbo, detailcpu_CacheL2, detailcpu_CacheL3, detailcpu_TDP, detailcpu_Price, detailcpu_Warranty, detailcpu_CreateBy, detailcpu_CreateTime)
           VALUES ('".$_POST['add_cpu_series']."','".$_POST['add_cpu_socket']."','".$_POST['add_cpu_name']."','".$_POST['add_cpu_core']."','".$_POST['add_cpu_thread']."','".$_POST['add_cpu_frequency']."','".$_POST['add_cpu_turbo']."','".$_POST['add_cpu_cacheL2']."','".$_POST['add_cpu_cacheL3']."',
             '".$_POST['add_cpu_tdp']."','".$_POST['add_cpu_price']."','".$_POST['add_cpu_warranty']."','".$_SESSION['UName']."',NOW())";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['CPUStatus'] == 'edit') {
      $sql_up = "UPDATE tbldetailcpu SET detailcpu_Model = '".$_POST['edit_cpu_name']."', detailcpu_IDseries = '".$_POST['edit_cpu_series']."', detailcpu_IDsocket = '".$_POST['edit_cpu_socket']."', detailcpu_Core = '".$_POST['edit_cpu_core']."', detailcpu_Thread = '".$_POST['edit_cpu_thread']."', detailcpu_Frequency = '".$_POST['edit_cpu_frequency']."',
      detailcpu_Turbo = '".$_POST['edit_cpu_turbo']."', detailcpu_CacheL2 = '".$_POST['edit_cpu_cacheL2']."', detailcpu_CacheL3 = '".$_POST['edit_cpu_cacheL3']."', detailcpu_TDP = '".$_POST['edit_cpu_tdp']."', detailcpu_Price = '".$_POST['edit_cpu_price']."', detailcpu_Warranty = '".$_POST['edit_cpu_warranty']."', detailcpu_UpdateBy = '".$_SESSION['UName']."',
      detailcpu_UpdateTime = NOW(), detailcpu_Status = '".$_POST['edit_cpu_status']."' WHERE detailcpu_ID = '".$_POST['CPUId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['CPUStatus'] == 'delete') {
      $sql_seimg =  "SELECT imgcpu_Nameimg FROM tblimgcpu WHERE imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgcpu_Nameimg'];
        $folder_path = "../../../upload/imagesCPU/$filename";
        unlink($folder_path);
      }

      $sql_delimg = "DELETE FROM tblimgcpu WHERE imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());

      $sql_del = "DELETE FROM tbldetailcpu WHERE detailcpu_ID = '".$_POST['CPUId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['CPUStatus'] == 'ShowImg') {
      $sql_show = "UPDATE tblimgcpu SET imgcpu_Status = '1' WHERE imgcpu_ID = '".$_POST['ImgCPUId']."' AND imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
      $result_show = mysql_query($sql_show)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['CPUStatus'] == 'HideImg') {
      $sql_hide = "UPDATE tblimgcpu SET imgcpu_Status = '0' WHERE imgcpu_ID = '".$_POST['ImgCPUId']."' AND imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
      $result_hide = mysql_query($sql_hide)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['CPUStatus'] == 'MainImg') {
      $sql_up_unmain = "UPDATE tblimgcpu SET imgcpu_Statusmain = '0' WHERE imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
      $result_up_unmain = mysql_query($sql_up_unmain)or die(mysql_error());

      $sql_up_main = "UPDATE tblimgcpu SET imgcpu_Statusmain = '1' WHERE imgcpu_ID = '".$_POST['ImgCPUId']."' AND imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
      $result_up_main = mysql_query($sql_up_main)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['CPUStatus'] == 'DelImg') {
      $sql_seimg =  "SELECT imgcpu_Nameimg FROM tblimgcpu WHERE imgcpu_ID = '".$_POST['ImgCPUId']."'";
      $result_seimg = mysql_query($sql_seimg)or die(mysql_error());
      while ($seimg = mysql_fetch_array($result_seimg)){
        $filename = $seimg['imgcpu_Nameimg'];
      }
      $folder_path = "../../../upload/imagesCPU/$filename";

      unlink($folder_path);
      // echo $folder_path;
      $sql_delimg = "DELETE FROM tblimgcpu WHERE imgcpu_ID = '".$_POST['ImgCPUId']."'";
      $result_delimg = mysql_query($sql_delimg)or die(mysql_error());
        echo "Y";
    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
