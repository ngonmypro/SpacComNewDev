<?php include "../../../connect/connect_mysql.php";

$sql_detailram = "SELECT *, busram_Name, brand_Name, typeram_Name FROM tbldetailram
                    INNER JOIN tblbusram ON tbldetailram.detailram_IDbusram = tblbusram.busram_ID
                    INNER JOIN tblbrand ON tbldetailram.detailram_IDbrand = tblbrand.brand_ID
                    INNER JOIN tbltyperam ON tblbusram.busram_IDtyperam = tbltyperam.typeram_ID
                    WHERE detailram_ID = '".$_POST['RAMId']."'";
$result_detailram = mysql_query($sql_detailram)or die(mysql_error());
while ($row_detailram = mysql_fetch_array($result_detailram)) {
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
  <?php $sql_count = " SELECT COUNT(imgram_ID) AS Count FROM tblimgram WHERE imgram_IDdetailram = '".$_POST['RAMId']."'";
        $result_count = mysql_query($sql_count)or die(mysql_error());
        while ($row_count = mysql_fetch_array($result_count)) {
          $Count = $row_count['Count'];
        }

        if ($Count != 0) { ?>
  <div class="w3-col m6">
    <div class="w3-content w3-display-container">

<?php $sql_imgvga = "SELECT * FROM tblimgram WHERE imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_imgvga = mysql_query($sql_imgvga)or die(mysql_error());
        while ($row_imgvga = mysql_fetch_array($result_imgvga)) { ?>
    <img class="mySlides w3-center" src="upload/imagesRAM/<?php echo $row_imgvga['imgram_Nameimg']; ?>" style="width:433.5px; height:380px">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  <?php } ?>
    </div>
  </div>
<?php } #echo $Count;?>
  <!-- <div class="w3-col m1 w3-center"><p style="color:#fff;">.</p> </div> -->
  <div class="w3-col m6">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_detailram['detailram_Name']; ?></h3>
    <?php if ($row_detailram['detailram_IDbrand'] != 0 || $row_detailram['detailram_IDbrand'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Brand : <?php echo $row_detailram['brand_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailram['detailram_IDbusram'] != 0 || $row_detailram['detailram_IDbusram'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Bus : <?php echo $row_detailram['busram_Name']; ?> MHz.
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Type Ram : <?php echo $row_detailram['typeram_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailram['detailram_warranty'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Warranty : <?php echo $row_detailram['detailram_warranty']; ?> Year
      </div>
    </div>
  <?php }
  if ($row_detailram['detailram_Price'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <div class="w3-row">
          <div class="w3-col m4"><br>
          Price :
          </div>
          <div class="w3-col m8">
            <h1><b><?php echo number_format($row_detailram['detailram_Price']); ?>.-</b></h1>
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
