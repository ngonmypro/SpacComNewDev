<html>
<head>
<title>ThaiCreate.Com PHP Sending Email</title>
</head>
<body>
<?php
	$strTo = $_POST["txtTo"];
	$strSubject = $_POST["txtSubject"];
	$strMessage = nl2br($_POST["txtDescription"]);

	//*** Uniqid Session ***//
	$strSid = md5(uniqid(time()));

	$strHeader = "";
	$strHeader .= "From: ".$_POST["txtFormName"]."<".$_POST["txtFormEmail"].">\nReply-To: ".$_POST["txtFormEmail"]."";

	$strHeader .= "MIME-Version: 1.0\n";
	$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
	$strHeader .= "This is a multi-part message in MIME format.\n";

	$strHeader .= "--".$strSid."\n";
	$strHeader .= "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
	$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
	$strHeader .= $strMessage."\n\n";

	//*** Attachment ***//
	if($_FILES["fileAttach"]["name"] != "")
	{
		$strFilesName = $_FILES["fileAttach"]["name"];
		$strContent = chunk_split(base64_encode(file_get_contents($_FILES["fileAttach"]["tmp_name"])));
		$strHeader .= "--".$strSid."\n";
		$strHeader .= "Content-Type: application/octet-stream; name=\"".$strFilesName."\"\n"; 
		$strHeader .= "Content-Transfer-Encoding: base64\n";
		$strHeader .= "Content-Disposition: attachment; filename=\"".$strFilesName."\"\n\n";
		$strHeader .= $strContent."\n\n";
	}


	$flgSend = @mail($strTo,$strSubject,null,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		echo "Email Sending.";
	}
	else
	{
		echo "Email Can Not Send.";
	}
?>
</body>
</html>
