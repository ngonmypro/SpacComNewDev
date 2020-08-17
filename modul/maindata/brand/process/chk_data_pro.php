<?php session_start();
include "../../../../connect/connect_mysql.php";
  // echo $_POST['SeriesStatus'];
    if ($_POST['BrandStatus'] == 'add') {
      $sql_se = " SELECT brand_Name FROM tblbrand WHERE brand_Name = '".$_POST['add_brand_name']."' AND brand_Type = '".$_POST['add_brand_type']."'";
      $result_se = mysql_query($sql_se)or die(mysql_error());
        if(mysql_num_rows($result_se) != 0){
      	   echo "N";
         }else{
           $sql_in = " INSERT INTO tblbrand (brand_Name, brand_CreateBy, brand_CreateTime, brand_Type)
           VALUES ('".$_POST['add_brand_name']."','".$_SESSION['UName']."',NOW() , '".$_POST['add_brand_type']."')";
           $result_in = mysql_query($sql_in)or die(mysql_error());
            echo "Y";
         }

    }else if ($_POST['BrandStatus'] == 'edit') {
      $sql_up = "UPDATE tblbrand SET brand_Name = '".$_POST['edit_brand_name']."', brand_UpdateBy = '".$_SESSION['UName']."', brand_UpdateTime = NOW(), brand_Status = '".$_POST['edit_brand_status']."', brand_Type = '".$_POST['edit_brand_type']."' WHERE brand_ID = '".$_POST['BrandId']."'";
      $result_up = mysql_query($sql_up)or die(mysql_error());
        echo "Y";

    }elseif ($_POST['BrandStatus'] == 'delete') {
      $sql_del = "DELETE FROM tblbrand WHERE brand_ID = '".$_POST['BrandId']."'";
      $result_del = mysql_query($sql_del)or die(mysql_error());
        echo "Y";

    }else {
      echo "N";
    }

  mysql_close($c);
 ?>
