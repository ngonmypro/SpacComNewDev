<?php include "../../../connect/connect_mysql.php";

$sql_detailvga = "SELECT *, series_Name, brand_Name FROM tbldetailvga
                    INNER JOIN tblseries ON tbldetailvga.detailvga_IDseries = tblseries.series_ID
                    INNER JOIN tblbrand ON tbldetailvga.detailvga_IDbrand = tblbrand.brand_ID
                    INNER JOIN tbltyperam ON tbldetailvga.detailvga_IDtyperam = tbltyperam.typeram_ID

                    WHERE detailvga_ID = '".$_POST['VGAId']."'";
$result_detailvga = mysql_query($sql_detailvga)or die(mysql_error());
while ($row_detailvga = mysql_fetch_array($result_detailvga)) {
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
  <div class="w3-col m6">
    <div class="w3-content w3-display-container">

<?php $sql_imgvga = "SELECT * FROM tblimgvga WHERE imgvga_IDdetailvga = '".$_POST['VGAId']."'";
$result_imgvga = mysql_query($sql_imgvga)or die(mysql_error());
while ($row_imgvga = mysql_fetch_array($result_imgvga)) { ?>

    <img class="mySlides w3-center" src="upload/imagesVGA/<?php echo $row_imgvga['imgvga_Nameimg']; ?>" style="width:433.5px; height:380px">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  <?php } ?>
    </div>
  </div>
  <!-- <div class="w3-col m1 w3-center"><p style="color:#fff;">.</p> </div> -->
  <div class="w3-col m6">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_detailvga['detailvga_Model']; ?></h3>
    <?php if ($row_detailvga['detailvga_IDseries'] != 0 || $row_detailvga['detailvga_IDseries'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Series : <?php echo $row_detailvga['series_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_IDbrand'] != 0 || $row_detailvga['detailvga_IDbrand'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Brand : <?php echo $row_detailvga['brand_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_GPUspeed'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>GPU Speed : <?php echo $row_detailvga['detailvga_GPUspeed']; ?> MHz.
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_Ramspeed'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Ram Speed : <?php echo $row_detailvga['detailvga_Ramspeed']; ?> Gbps.
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_Capacityram'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Capacity Ram : <?php echo $row_detailvga['detailvga_Capacityram']; ?> Gb.
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_IDtyperam'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Type Ram : <?php echo $row_detailvga['typeram_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_Bus'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Bus : <?php echo $row_detailvga['detailvga_Bus']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_DVIport'] != "" || $row_detailvga['detailvga_HDMIport'] != "" || $row_detailvga['detailvga_Displayport'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Port : <?php echo $row_detailvga['detailvga_DVIport'];
        if ($row_detailvga['detailvga_DVIport'] != "" && $row_detailvga['detailvga_HDMIport'] != "") { echo ", "; } echo $row_detailvga['detailvga_HDMIport'];
        if (($row_detailvga['detailvga_DVIport'] != "" || $row_detailvga['detailvga_HDMIport'] != "") && $row_detailvga['detailvga_Displayport'] != "") { echo ", "; } echo $row_detailvga['detailvga_Displayport'];
          ?>
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_TDP'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Power consumption : <?php echo $row_detailvga['detailvga_TDP']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_warranty'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Warranty : <?php echo $row_detailvga['detailvga_warranty']; ?> Year
      </div>
    </div>
  <?php }
  if ($row_detailvga['detailvga_Price'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <div class="w3-row">
          <div class="w3-col m4"><br>
          Price :
          </div>
          <div class="w3-col m8">
            <h1><b><?php echo number_format($row_detailvga['detailvga_Price']); ?>.-</b></h1>
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
