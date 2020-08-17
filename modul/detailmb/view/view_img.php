<?php include "../../../connect/connect_mysql.php";

$sql_detailmb = "SELECT *, brand_Name, socket_Name FROM tbldetailmb
                    INNER JOIN tblbrand ON tbldetailmb.detailmb_IDbrand = tblbrand.brand_ID
                    INNER JOIN tblsocket ON tbldetailmb.detailmb_IDsocket = tblsocket.socket_ID
                    -- INNER JOIN tblmbbusram ON tbldetailmb.detailmb_ID = tblmbbusram.mbbusram_IDdetailmb
                    -- INNER JOIN tblmbseriescpu ON tbldetailmb.detailmb_ID = tblmbseriescpu.mbseriescpu_IDDetailMB

                    WHERE detailmb_ID = '".$_POST['MBId']."'";
$result_detailmb = mysql_query($sql_detailmb)or die(mysql_error());
while ($row_detailmb = mysql_fetch_array($result_detailmb)) {
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

<?php $sql_imgmb = "SELECT * FROM tblimgmb WHERE imgmb_IDdetailmb = '".$_POST['MBId']."'";
$result_imgmb = mysql_query($sql_imgmb)or die(mysql_error());
while ($row_imgmb = mysql_fetch_array($result_imgmb)) { ?>

    <img class="mySlides w3-center" src="upload/imagesMB/<?php echo $row_imgmb['imgmb_Nameimg']; ?>" style="width:433.5px; height:380px">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  <?php } ?>
    </div>
  </div>
  <!-- <div class="w3-col m1 w3-center"><p style="color:#fff;">.</p> </div> -->
  <div class="w3-col m6">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_detailmb['detailmb_Model']; ?></h3>
    <?php if ($row_detailmb['detailmb_IDbrand'] != 0 || $row_detailmb['detailmb_IDbrand'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Brand : <?php echo $row_detailmb['brand_Name']; ?>
      </div>
    </div>
  <?php }
  $sql_seriesmb = " SELECT *, series_Name FROM tblmbseriescpu
            INNER JOIN tblseries ON tblmbseriescpu.mbseriescpu_IDseries = tblseries.series_ID

            WHERE mbseriescpu_IDDetailMB = '".$_POST['MBId']."'";
  $result_seriesmb = mysql_query($sql_seriesmb)or die(mysql_error());
    $seriesmb = "";
    while ($row_seriesmb = mysql_fetch_array($result_seriesmb)) {
      if ($seriesmb == "") {
        $seriesmb = $row_seriesmb['series_Name'];
      }else {
        $seriesmb .= ', '.$row_seriesmb['series_Name'];
      }
    }
    if ($seriesmb != "") {
  ?>
  <div class="w3-row">
    <div class="w3-col m2"><p style="color:#fff;">.</p></div>
    <div class="w3-col m10">
      <LI>Series : <?php echo $seriesmb; ?>
    </div>
  </div>
  <?php }
  if ($row_detailmb['detailmb_IDsocket'] != 0 || $row_detailmb['detailmb_IDsocket'] != "") {?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Socket : <?php echo $row_detailmb['socket_Name']; ?>
      </div>
    </div>
  <?php }
  $sql_bus = " SELECT *, busram_Name FROM tblmbbusram
            INNER JOIN tblbusram ON tblmbbusram.mbbusram_IDbusram = tblbusram.busram_ID

            WHERE mbbusram_IDdetailmb = '".$_POST['MBId']."'";
  $result_bus = mysql_query($sql_bus)or die(mysql_error());
    $busrammb = "";
    while ($row_bus = mysql_fetch_array($result_bus)) {
      if ($busrammb == "") {
        $busrammb = $row_bus['busram_Name'];
      }else {
        $busrammb .= ', '.$row_bus['busram_Name'];
      }
    }
    if ($busrammb != "") {
  ?>
  <div class="w3-row">
    <div class="w3-col m2"><p style="color:#fff;">.</p></div>
    <div class="w3-col m10">
      <LI>Bus : <?php echo $busrammb; ?>
    </div>
  </div>
  <?php }
  if ($row_detailmb['detailmb_Graphic'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Graphics : <?php echo $row_detailmb['detailmb_Graphic']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Audio'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Audio : <?php echo $row_detailmb['detailmb_Audio']; ?> CH
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Sata'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Sata : <?php echo $row_detailmb['detailmb_Sata']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_M2'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>M.2 : <?php echo $row_detailmb['detailmb_M2']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Slot'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Slot Ram : <?php echo $row_detailmb['detailmb_Slot']; ?> Slot
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Lanspeed'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Lan : <?php echo $row_detailmb['detailmb_Lanspeed']; ?> Mb/s
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Usb2'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>USB 2.0 : <?php echo $row_detailmb['detailmb_Usb2']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Usb3'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>USB 3.0 : <?php echo $row_detailmb['detailmb_Usb3']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_DVIport'] != "" || $row_detailmb['detailmb_HDMIport'] != "" || $row_detailmb['detailmb_Audioport'] != "" || $row_detailmb['detailmb_Audioport'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Port : <?php echo $row_detailmb['detailmb_DVIport'];
        if ($row_detailmb['detailmb_DVIport'] != "" && $row_detailmb['detailmb_HDMIport'] != "") { echo ", "; } echo $row_detailmb['detailmb_HDMIport'];
        if (($row_detailmb['detailmb_DVIport'] != "" || $row_detailmb['detailmb_HDMIport'] != "") && $row_detailmb['detailmb_Audioport'] != "") { echo ", "; } echo $row_detailmb['detailmb_Audioport'];
        if (($row_detailmb['detailmb_DVIport'] != "" || $row_detailmb['detailmb_HDMIport'] != "" || $row_detailmb['detailmb_Audioport'] != "") && $row_detailmb['detailmb_Lanport'] != "") { echo ", "; } echo $row_detailmb['detailmb_Lanport'];
          ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_FromFactor'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Factor : <?php echo $row_detailmb['detailmb_FromFactor']; ?>
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_warranty'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <LI>Warranty : <?php echo $row_detailmb['detailmb_warranty']; ?> Year
      </div>
    </div>
  <?php }
  if ($row_detailmb['detailmb_Price'] != "") {
  ?>
    <div class="w3-row">
      <div class="w3-col m2"><p style="color:#fff;">.</p></div>
      <div class="w3-col m10">
        <div class="w3-row">
          <div class="w3-col m4"><br>
          Price :
          </div>
          <div class="w3-col m8">
            <h1><b><?php echo number_format($row_detailmb['detailmb_Price']); ?>.-</b></h1>
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
