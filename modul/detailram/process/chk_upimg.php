<?php session_start();

date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
include "../../../connect/connect_mysql.php";

//echo $_GET['CPUId'];
$date = date("Ymd-His");
$name = $_SESSION['UName'];
$target_dir = "../../../upload/imagesRAM/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$uploadDetail = 0;
$response = "";
//echo "T".$target_file;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  //echo "3";
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$response = "เสียใจด้วย, ไฟล์ที่สามารถ อัปโหลดได้ ต้องเป็นไฟล์ JPG, JPEG, PNG & GIF เท่านั้น.";
    $uploadOk = 0;
	$uploadDetail = 4;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
	if ($uploadDetail == 1){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจากไม ่ไช่ไฟล์รูปภาพ.";
	}else
	if($uploadDetail == 2){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.";
	}else
	if($uploadDetail == 3){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.";
	}else
	if($uploadDetail == 4){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิืด JPG, JPEG, PNG & GIF เท่านั้น.";
	}

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$response = "ไฟล์ ". basename( $_FILES["fileToUpload"]["name"]). " อัปโหลด เสร็จเรียบร้อย.";
		$data = 0; //result success
		//rename file
    echo basename( $_FILES["fileToUpload"]["name"]);
		rename ($target_dir . basename( $_FILES["fileToUpload"]["name"]), $target_dir . 'RAM-' . $date . '-' . $_GET['RAMId'] . '.' . $imageFileType);

		$target_file_n = 'RAM-' . $date . '-' . $_GET['RAMId'] . '.' . $imageFileType;
    //echo '</br>'.$target_file_n;
		//--- update data in table employee_tb
		$sql_se = " SELECT imgram_ID , imgram_IDdetailram FROM tblimgram WHERE imgram_IDdetailram = '".$_GET['RAMId']."'";
		$result_se = mysql_query($sql_se) or die(mysql_error());
		while ($row_se = mysql_fetch_array($result_se)) {
			$sql_up = " UPDATE  tblimgram SET  imgram_Statusmain = '0' WHERE  imgram_ID = '".$row_se['imgram_ID']."'";
			$result_up = mysql_query($sql_up) or die(mysql_error());
		}

		$sql = " INSERT INTO  tblimgram (imgram_IDdetailram, imgram_Nameimg, imgram_CreateBy, imgram_CreateTime)
		VALUES ('".$_GET['RAMId']."', '{$target_file_n}', '{$name}', NOW()) ";
		$result = mysql_query($sql) or die(mysql_error());

    $uploadDetail = 5;

  } else {
        //echo "Sorry, there was an error uploading your file.";
		$response = "เสียใจด้วย , มีข้อผิดพลาดในการ อัปโหลดไฟล์ของคุณ.";
		$data = 1; //result success
    }
}

	echo "{$uploadDetail}";

	mysql_close($c); //close connection
?>
