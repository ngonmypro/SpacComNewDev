<?php include "../../../connect/connect_mysql.php";

$sql_detailcpu = "SELECT *, series_Name, socket_Name FROM tbldetailcpu
                    INNER JOIN tblseries ON tbldetailcpu.detailcpu_IDseries = tblseries.series_ID
                    INNER JOIN tblsocket ON tbldetailcpu.detailcpu_IDsocket = tblsocket.socket_ID

                    WHERE detailcpu_ID = '".$_POST['CPUId']."'";
$result_detailcpu = mysql_query($sql_detailcpu)or die(mysql_error());
while ($rowdetailcpu = mysql_fetch_array($result_detailcpu)) {
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

<?php $sql_imgcpu = "SELECT * FROM tblimgcpu WHERE imgcpu_IDdetailcpu = '".$_POST['CPUId']."'";
$result_imgcpu = mysql_query($sql_imgcpu)or die(mysql_error());
while ($row_imgcpu = mysql_fetch_array($result_imgcpu)) { ?>

    <img class="mySlides w3-center" src="upload/imagesCPU/<?php echo $row_imgcpu['imgcpu_Nameimg']; ?>" style="width:433.5px; height:380px">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  <?php } ?>
    </div>
  </div>
  <!-- <div class="w3-col m1 w3-center"><p style="color:#fff;">.</p> </div> -->
  <div class="w3-col m6">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowdetailcpu['detailcpu_Model']; ?></h3>
    <?php if ($rowdetailcpu['detailcpu_IDseries'] != 0 || $rowdetailcpu['detailcpu_IDseries'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Series : <?php echo $rowdetailcpu['series_Name']; ?>
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_IDsocket'] != 0 || $rowdetailcpu['detailcpu_IDsocket'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Socket : <?php echo $rowdetailcpu['socket_Name']; ?>
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_Core'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI># OF CPU CORE : <?php echo $rowdetailcpu['detailcpu_Core']; ?>
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_Thread'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI># OF CPU THREADS : <?php echo $rowdetailcpu['detailcpu_Thread']; ?>
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_Frequency'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Frequency : <?php echo $rowdetailcpu['detailcpu_Frequency']; ?> GHz
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_Turbo'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Turbo Frequency : <?php echo $rowdetailcpu['detailcpu_Turbo']; ?> GHz
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_CacheL2'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Level 2 Cache : <?php echo $rowdetailcpu['detailcpu_CacheL2']; ?> MB
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_CacheL3'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Level 3 Cache : <?php echo $rowdetailcpu['detailcpu_CacheL3']; ?> MB
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_TDP'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Power consumption : <?php echo $rowdetailcpu['detailcpu_TDP']; ?>
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_Warranty'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Warranty : <?php echo $rowdetailcpu['detailcpu_Warranty']; ?> Year
      </div>
    </div>
  <?php }
  if ($rowdetailcpu['detailcpu_Price'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <div class="w3-row">
          <div class="w3-col m4"><br>
          Price :
          </div>
          <div class="w3-col m8">
            <h1><b><?php echo number_format($rowdetailcpu['detailcpu_Price']); ?>.-</b></h1>
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
