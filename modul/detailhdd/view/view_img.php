<?php include "../../../connect/connect_mysql.php";

$sql_detail = "SELECT *, capacityhdd_Name, brand_Name, typehdd_Name FROM tbldetailhdd
                    INNER JOIN tblcapacityhdd ON tbldetailhdd.detailhdd_IDcapacity = tblcapacityhdd.capacityhdd_ID
                    INNER JOIN tblbrand ON tbldetailhdd.detailhdd_IDbrand = tblbrand.brand_ID
                    INNER JOIN tbltypehdd ON tbldetailhdd.detailhdd_IDtypehdd = tbltypehdd.typehdd_ID
                    WHERE detailhdd_ID = '".$_POST['HDDId']."'";
$result_detail = mysql_query($sql_detail)or die(mysql_error());
while ($row_detail = mysql_fetch_array($result_detail)) {
?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<!-- <h2 class="w3-center">Manual Slideshow</h2> -->
<div class="w3-row">
  <?php $sql_count = " SELECT COUNT(imghdd_ID) AS Count FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
        $result_count = mysql_query($sql_count)or die(mysql_error());
        while ($row_count = mysql_fetch_array($result_count)) {
          $Count = $row_count['Count'];
        }

        if ($Count != 0) { ?>
  <div class="w3-col m6">
    <div class="w3-content w3-display-container">

<?php $sql_img = "SELECT * FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$_POST['HDDId']."'";
      $result_img = mysql_query($sql_img)or die(mysql_error());
        while ($row_img = mysql_fetch_array($result_img)) { ?>
    <img class="mySlides w3-center" src="upload/imagesHDD/<?php echo $row_img['imghdd_Nameimg']; ?>" style="width:433.5px; height:380px">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  <?php } ?>
    </div>
  </div>
<?php } #echo $Count;?>
  <!-- <div class="w3-col m1 w3-center"><p style="color:#fff;">.</p> </div> -->
  <div class="w3-col m6">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_detail['detailhdd_Model']; ?></h3>
    <?php if ($row_detail['detailhdd_IDbrand'] != 0 || $row_detail['detailhdd_IDbrand'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Brand : <?php echo $row_detail['brand_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailhdd_IDcapacity'] != 0 || $row_detail['detailhdd_IDcapacity'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Capacity : <?php echo $row_detail['capacityhdd_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailhdd_IDtypehdd'] != 0 || $row_detail['detailhdd_IDtypehdd'] != "") {
    ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Type Harddisk : <?php echo $row_detail['typehdd_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailhdd_Interface'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Interface : <?php echo $row_detail['detailhdd_Interface']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailhdd_warranty'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Warranty : <?php echo $row_detail['detailhdd_warranty']; ?> Year
      </div>
    </div>
  <?php }
  if ($row_detail['detailhdd_Price'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <div class="w3-row">
          <div class="w3-col m4"><br>
          Price :
          </div>
          <div class="w3-col m8">
            <h1><b><?php echo number_format($row_detail['detailhdd_Price']); ?>.-</b></h1>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>

</body>
</html>
<?php } ?>
