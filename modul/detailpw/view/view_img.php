<?php include "../../../connect/connect_mysql.php";

$sql_detail = "SELECT *, wattpw_Name, brand_Name FROM tbldetailpw
                    INNER JOIN tblwattpw ON tbldetailpw.detailpw_IDwattpw = tblwattpw.wattpw_ID
                    INNER JOIN tblbrand ON tbldetailpw.detailpw_IDbrand = tblbrand.brand_ID
                    WHERE detailpw_ID = '".$_POST['PWId']."'";
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
  <?php $sql_count = " SELECT COUNT(imgpw_ID) AS Count FROM tblimgpw WHERE imgpw_IDdetailpw = '".$_POST['PWId']."'";
        $result_count = mysql_query($sql_count)or die(mysql_error());
        while ($row_count = mysql_fetch_array($result_count)) {
          $Count = $row_count['Count'];
        }

        if ($Count != 0) { ?>
  <div class="w3-col m6">
    <div class="w3-content w3-display-container">

<?php $sql_img = "SELECT * FROM tblimgpw WHERE imgpw_IDdetailpw = '".$_POST['PWId']."'";
      $result_img = mysql_query($sql_img)or die(mysql_error());
        while ($row_img = mysql_fetch_array($result_img)) { ?>
    <img class="mySlides w3-center" src="upload/imagesPW/<?php echo $row_img['imgpw_Nameimg']; ?>" style="width:433.5px; height:380px">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  <?php } ?>
    </div>
  </div>
<?php } #echo $Count;?>
  <!-- <div class="w3-col m1 w3-center"><p style="color:#fff;">.</p> </div> -->
  <div class="w3-col m6">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_detail['detailpw_Model']; ?></h3>
    <?php if ($row_detail['detailpw_IDbrand'] != 0 || $row_detail['detailpw_IDbrand'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Brand : <?php echo $row_detail['brand_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_IDwattpw'] != 0 || $row_detail['detailpw_IDwattpw'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Watt : <?php echo $row_detail['wattpw_Name']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_MBconnector'] != "") {
    ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Mainboard Connector : <?php echo $row_detail['detailpw_MBconnector']; ?> Port.
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_CPUconnector'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>CPU Connector : <?php echo $row_detail['detailpw_CPUconnector']; ?> Port.
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_PCIExconnector'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>PCIEx Connector : <?php echo $row_detail['detailpw_PCIExconnector']; ?> Port.
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_SATAconnector'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>SATA Connector : <?php echo $row_detail['detailpw_SATAconnector']; ?> Port.
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_MOLEXconnector'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>MOLEX Connector : <?php echo $row_detail['detailpw_MOLEXconnector']; ?> Port.
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_Powerinput'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Power Input : <?php echo $row_detail['detailpw_Powerinput']; ?>
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_CPUconnector'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>CPU Connector : <?php echo $row_detail['detailpw_CPUconnector']; ?> Port.
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_Warranty'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Warranty : <?php echo $row_detail['detailpw_Warranty']; ?> Year
      </div>
    </div>
  <?php }
  if ($row_detail['detailpw_Price'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <div class="w3-row">
          <div class="w3-col m4"><br>
          Price :
          </div>
          <div class="w3-col m8">
            <h1><b><?php echo number_format($row_detail['detailpw_Price']); ?>.-</b></h1>
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
