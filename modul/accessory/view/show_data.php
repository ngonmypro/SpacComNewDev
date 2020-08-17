<?php include "../../../connect/connect_mysql.php";
// echo $_POST['idmbsocketselect'];
#CPU
if ($_POST['StatusData'] == 'cpu') {

    $sql_se = " SELECT *, series_Name, chipset_Name FROM tbldetailcpu
            INNER JOIN tblseries ON tbldetailcpu.detailcpu_IDseries = tblseries.series_ID
            INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
            WHERE chipset_Type = 1 ";

            if ($_POST['numselectcpu'] != 0) {
              $Select_chip = explode(",",$_POST['Select_chip']);
                for ($i=0; $i < $_POST['numselectcpu']; $i++) {
                  if ($i == 0) {
                    $sql_se .= " AND series_IDchipset = '".$Select_chip[$i]."'";
                  }else {
                    $sql_se .= " OR series_IDchipset = '".$Select_chip[$i]."'";
                  }
                }
            }

            if ($_POST['seriescpu'] != 0) {
              $sql_se .= " AND detailcpu_IDseries = '".$_POST['seriescpu']."'";
            }

            if ($_POST['socketcpu'] != 0) {
              $sql_se .= " AND detailcpu_IDsocket = '".$_POST['socketcpu']."'";
            }

            if ($_POST['idmbsocketselect'] != "") {
              $sql_se .= " AND detailcpu_IDsocket = '".$_POST['idmbsocketselect']."'";
            }

            $result_se = mysql_query($sql_se)or die(mysql_error());
            while ($row_se = mysql_fetch_array($result_se)) {

              $sql_se_img = " SELECT * FROM tblimgcpu WHERE imgcpu_IDdetailcpu = '".$row_se['detailcpu_ID']."' AND imgcpu_Statusmain = 1";
              $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
                while ($row_se_img = mysql_fetch_array($result_se_img)) {?>

<div class="col-md-3">
  <div class="row">
      <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['chipset_Name']; ?></h4>
      <h5><b><?php echo $row_se['detailcpu_Model']; ?></b></h5>
      <img src="upload/imagesCPU/<?php echo $row_se_img['imgcpu_Nameimg']; ?>" style="height:240px; width:240px;">
      <h5 align="center">Price <?php echo number_format($row_se['detailcpu_Price']); ?>.-</h5>
      <div align="center">
        <button type="button" class="btn btn-warning" OnClick="JavaScript:AddCPUSpec('<?php echo $row_se['detailcpu_IDsocket']; ?>','<?php echo $row_se_img['imgcpu_Nameimg']; ?>','<?php echo $row_se['detailcpu_Model']; ?>','<?php echo number_format($row_se['detailcpu_Price']); ?>','<?php echo $row_se['detailcpu_Price']; ?>');">ADD TO SPEC</button>
        <button type="button" class="btn btn-info" onClick="javascript:DetailCPU('<?php echo $row_se['detailcpu_ID'];?>','<?php echo $row_se['detailcpu_Model'];?>');">DETAIL</button>
      </div>
  </div>
  <br>
</div>
<?php }
  }
 }

# MB
 else if ($_POST['StatusData'] == 'mb') {

   $sql_se = " SELECT *, socket_Name, brand_Name FROM tbldetailmb
          INNER JOIN tblsocket ON tbldetailmb.detailmb_IDsocket = tblsocket.socket_ID
          INNER JOIN tblbrand ON tbldetailmb.detailmb_IDbrand = tblbrand.brand_ID
            WHERE brand_Type = 1";

        if ($_POST['numselectbrandmb'] != 0) {
          $Select_brandmb = explode(",",$_POST['Select_brandmb']);
            for ($i=0; $i < $_POST['numselectbrandmb']; $i++) {
              if ($i == 0) {
                $sql_se .= " AND detailmb_IDbrand = '".$Select_brandmb[$i]."'";
              }else {
                $sql_se .= " OR detailmb_IDbrand = '".$Select_brandmb[$i]."'";
              }
            }
        }

        if ($_POST['socketcpu'] != 0 ) {
          $sql_se .= " AND detailmb_IDsocket = '".$_POST['socketcpu']."'";
        }


        if ($_POST['socketmb'] != 0) {
          $sql_se .= " AND detailmb_IDsocket = '".$_POST['socketmb']."'";
        }

        $result_se = mysql_query($sql_se)or die(mysql_error());
        while ($row_se = mysql_fetch_array($result_se)) {

          $sql_se_img = " SELECT * FROM tblimgmb WHERE imgmb_IDdetailmb = '".$row_se['detailmb_ID']."' AND imgmb_Statusmain = 1";
          $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
            while ($row_se_img = mysql_fetch_array($result_se_img)) {
              // echo $_POST['socketmb'];
              ?>

    <div class="col-md-3">
      <div class="row">
        <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
        <h5><b><?php echo $row_se['detailmb_Model']; ?></b></h5>
        <img src="upload/imagesMB/<?php echo $row_se_img['imgmb_Nameimg']; ?>" style="height:240px; width:240px;">
        <h5 align="center">Price <?php echo number_format($row_se['detailmb_Price']); ?>.-</h5>
          <div align="center">
            <button type="button" class="btn btn-warning" OnClick="JavaScript:AddMBSpec('<?php echo $row_se['detailmb_ID']; ?>','<?php echo $row_se_img['imgmb_Nameimg']; ?>',
              '<?php echo $row_se['detailmb_Model']; ?>','<?php echo number_format($row_se['detailmb_Price']); ?>','<?php echo $row_se['detailmb_Price']; ?>','<?php echo $row_se['detailmb_IDsocket']; ?>');">ADD TO SPEC</button>
            <button type="button" class="btn btn-info" onClick="javascript:DetailMB('<?php echo $row_se['detailmb_ID'];?>','<?php echo $row_se['detailmb_Model'];?>');">DETAIL</button>
          </div>
      </div>
      <br>
    </div>
<?php }
    }
  }
  #VGA
else if ($_POST['StatusData'] == 'vga') {
  $sql_se = " SELECT *, series_Name, brand_Name FROM tbldetailvga
       INNER JOIN tblseries ON tbldetailvga.detailvga_IDseries = tblseries.series_ID
       INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
       INNER JOIN tblbrand ON tbldetailvga.detailvga_IDbrand = tblbrand.brand_ID
         WHERE chipset_Type = 2";

     if ($_POST['numselectvga'] != 0) {
       $Select_chipsetvga = explode(",",$_POST['Select_chipsetvga']);
         for ($i=0; $i < $_POST['numselectvga']; $i++) {
           if ($i == 0) {
             $sql_se .= " AND series_IDchipset = '".$Select_chipsetvga[$i]."'";
           }else {
             $sql_se .= " OR series_IDchipset = '".$Select_chipsetvga[$i]."'";
           }
         }
     }

     if ($_POST['seriesvga'] != 0 ) {
       $sql_se .= " AND detailvga_IDseries = '".$_POST['seriesvga']."'";
     }

     if ($_POST['brandvga'] != 0) {
       $sql_se .= " AND detailvga_IDbrand = '".$_POST['brandvga']."'";
     }

     $result_se = mysql_query($sql_se)or die(mysql_error());
     while ($row_se = mysql_fetch_array($result_se)) {

       $sql_se_img = " SELECT * FROM tblimgvga WHERE imgvga_IDdetailvga = '".$row_se['detailvga_ID']."' AND imgvga_Statusmain = 1";
       $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
         while ($row_se_img = mysql_fetch_array($result_se_img)) {
           // echo $_POST['socketmb'];
           ?>

 <div class="col-md-3">
   <div class="row">
     <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
     <h5><b><?php echo $row_se['detailvga_Model']; ?></b></h5>
     <img src="upload/imagesVGA/<?php echo $row_se_img['imgvga_Nameimg']; ?>" style="height:240px; width:240px;">
     <h5 align="center">Price <?php echo number_format($row_se['detailvga_Price']); ?>.-</h5>
       <div align="center">
         <button type="button" class="btn btn-warning" OnClick="JavaScript:AddVGASpec('<?php echo $row_se_img['imgvga_Nameimg']; ?>','<?php echo $row_se['detailvga_Model']; ?>','<?php echo number_format($row_se['detailvga_Price']); ?>','<?php echo $row_se['detailvga_Price']; ?>');">ADD TO SPEC</button>
         <button type="button" class="btn btn-info" onClick="javascript:DetailVGA('<?php echo $row_se['detailvga_ID'];?>','<?php echo $row_se['detailvga_Model'];?>');">DETAIL</button>
       </div>
   </div>
   <br>
 </div>
<?php }
 }
}
  #RAM
else if ($_POST['StatusData'] == 'ram') { #echo $_POST['idmbselect'];

$sql_se = " SELECT *, busram_Name, busram_ID, typeram_Name, brand_Name FROM tbldetailram
       INNER JOIN tblbusram ON tbldetailram.detailram_IDbusram = tblbusram.busram_ID
       INNER JOIN tbltyperam ON tblbusram.busram_IDtyperam = tbltyperam.typeram_ID
       INNER JOIN tblbrand ON tbldetailram.detailram_IDbrand = tblbrand.brand_ID
         WHERE brand_Type = 2";

     if ($_POST['numselecttyperam'] != 0) {
       $Select_typeram = explode(",",$_POST['Select_typeram']);
         for ($i=0; $i < $_POST['numselecttyperam']; $i++) {
           if ($i == 0) {
             $sql_se .= " AND typeram_ID = '".$Select_typeram[$i]."'";
           }else {
             $sql_se .= " OR typeram_ID = '".$Select_typeram[$i]."'";
           }
         }
     }

     if ($_POST['busram'] != 0) {
       $sql_se .= " AND detailram_IDbusram = '".$_POST['busram']."'";
     }

     if ($_POST['brandram'] != 0) {
       $sql_se .= " AND detailram_IDbrand = '".$_POST['brandram']."'";
     }


     $result_se = mysql_query($sql_se)or die(mysql_error());
     while ($row_se = mysql_fetch_array($result_se)) {



       $sql_se_img = " SELECT * FROM tblimgram WHERE imgram_IDdetailram = '".$row_se['detailram_ID']."' AND imgram_Statusmain = 1";
       $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
         while ($row_se_img = mysql_fetch_array($result_se_img)) {
           if ($_POST['idmbselect'] == "") { ?>

 <div class="col-md-3">
   <div class="row">
     <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
     <h5><b><?php echo $row_se['detailram_Name'].' '.$row_se['typeram_Name'].' '.$row_se['busram_Name']; ?></b></h5>
     <img src="upload/imagesRAM/<?php echo $row_se_img['imgram_Nameimg']; ?>" style="height:240px; width:240px;">
     <h5 align="center">Price <?php echo number_format($row_se['detailram_Price']); ?>.-</h5>
       <div align="center">
         <button type="button" class="btn btn-warning" OnClick="JavaScript:AddRAMSpec('<?php echo $row_se_img['imgram_Nameimg']; ?>','<?php echo $row_se['detailram_Name']; ?>','<?php echo number_format($row_se['detailram_Price']); ?>','<?php echo $row_se['detailram_Price']; ?>');">ADD TO SPEC</button>
         <button type="button" class="btn btn-info" onClick="javascript:DetailRAM('<?php echo $row_se['detailram_ID'];?>','<?php echo $row_se['detailram_Name'];?>');">DETAIL</button>
       </div>
   </div>
   <br>
 </div>
 <?php }else {
   $sql_se_mbbus = " SELECT * FROM tblmbbusram WHERE mbbusram_IDdetailmb = '".$_POST['idmbselect']."' AND mbbusram_IDbusram = '".$row_se['busram_ID']."'";
   $result_se_mbbus = mysql_query($sql_se_mbbus)or die(mysql_error());
     while ($row_se_mbbus = mysql_fetch_array($result_se_mbbus)) {
       // echo $row_se_mbbus['mbbusram_ID'].','.$row_se['brand_Name'];
      ?>
      <div class="col-md-3">
        <div class="row">
          <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
          <h5><b><?php echo $row_se['detailram_Name'].' '.$row_se['typeram_Name'].' '.$row_se['busram_Name']; ?></b></h5>
          <img src="upload/imagesRAM/<?php echo $row_se_img['imgram_Nameimg']; ?>" style="height:240px; width:240px;">
          <h5 align="center">Price <?php echo number_format($row_se['detailram_Price']); ?>.-</h5>
            <div align="center">
              <button type="button" class="btn btn-warning" OnClick="JavaScript:AddRAMSpec('<?php echo $row_se_img['imgram_Nameimg']; ?>','<?php echo $row_se['detailram_Name']; ?>','<?php echo number_format($row_se['detailram_Price']); ?>','<?php echo $row_se['detailram_Price']; ?>');">ADD TO SPEC</button>
              <button type="button" class="btn btn-info" onClick="javascript:DetailRAM('<?php echo $row_se['detailram_ID'];?>','<?php echo $row_se['detailram_Name'];?>');">DETAIL</button>
            </div>
        </div>
        <br>
      </div>
<?php }
    }
  }
}
?>
<?php }
  #HDD
else if ($_POST['StatusData'] == 'hdd') {
    $sql_se = " SELECT *, typehdd_Name, capacityhdd_Name, brand_Name FROM tbldetailhdd
     INNER JOIN tbltypehdd ON tbldetailhdd.detailhdd_IDtypehdd = tbltypehdd.typehdd_ID
     INNER JOIN tblcapacityhdd ON tbldetailhdd.detailhdd_IDcapacity = tblcapacityhdd.capacityhdd_ID
     INNER JOIN tblbrand ON tbldetailhdd.detailhdd_IDbrand = tblbrand.brand_ID";

   if ($_POST['typehdd'] != 0 ) {
     $sql_se .= " AND detailhdd_IDtypehdd = '".$_POST['typehdd']."'";
   }

   if ($_POST['capacityhdd'] != 0) {
     $sql_se .= " AND detailhdd_IDcapacity = '".$_POST['capacityhdd']."'";
   }

   if ($_POST['brandHDD'] != 0) {
     $sql_se .= " AND detailhdd_IDbrand = '".$_POST['brandHDD']."'";
   }

   $result_se = mysql_query($sql_se)or die(mysql_error());
   while ($row_se = mysql_fetch_array($result_se)) {

     $sql_se_img = " SELECT * FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$row_se['detailhdd_ID']."' AND imghdd_Statusmain = 1";
     $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
       while ($row_se_img = mysql_fetch_array($result_se_img)) {
         // echo $_POST['socketmb'];
         ?>

<div class="col-md-3">
 <div class="row">
   <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
   <h5><b><?php echo $row_se['detailhdd_Model']; ?></b></h5>
   <img src="upload/imagesHDD/<?php echo $row_se_img['imghdd_Nameimg']; ?>" style="height:240px; width:240px;">
   <h5 align="center">Price <?php echo number_format($row_se['detailhdd_Price']); ?>.-</h5>
     <div align="center">
       <button type="button" class="btn btn-warning" OnClick="JavaScript:AddHDDSpec('<?php echo $row_se_img['imghdd_Nameimg']; ?>','<?php echo $row_se['detailhdd_Model']; ?>','<?php echo number_format($row_se['detailhdd_Price']); ?>','<?php echo $row_se['detailhdd_Price']; ?>');">ADD TO SPEC</button>
       <button type="button" class="btn btn-info" onClick="javascript:DetailHDD('<?php echo $row_se['detailhdd_ID'];?>','<?php echo $row_se['detailhdd_Model'];?>');">DETAIL</button>
     </div>
 </div>
 <br>
</div>
<?php }
  }
}
  #HDD2
else if ($_POST['StatusData'] == 'hdd2') {
    $sql_se = " SELECT *, typehdd_Name, capacityhdd_Name, brand_Name FROM tbldetailhdd
     INNER JOIN tbltypehdd ON tbldetailhdd.detailhdd_IDtypehdd = tbltypehdd.typehdd_ID
     INNER JOIN tblcapacityhdd ON tbldetailhdd.detailhdd_IDcapacity = tblcapacityhdd.capacityhdd_ID
     INNER JOIN tblbrand ON tbldetailhdd.detailhdd_IDbrand = tblbrand.brand_ID";

   if ($_POST['typehdd'] != 0 ) {
     $sql_se .= " AND detailhdd_IDtypehdd = '".$_POST['typehdd']."'";
   }

   if ($_POST['capacityhdd'] != 0) {
     $sql_se .= " AND detailhdd_IDcapacity = '".$_POST['capacityhdd']."'";
   }

   if ($_POST['brandHDD'] != 0) {
     $sql_se .= " AND detailhdd_IDbrand = '".$_POST['brandHDD']."'";
   }

   $result_se = mysql_query($sql_se)or die(mysql_error());
   while ($row_se = mysql_fetch_array($result_se)) {

     $sql_se_img = " SELECT * FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$row_se['detailhdd_ID']."' AND imghdd_Statusmain = 1";
     $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
       while ($row_se_img = mysql_fetch_array($result_se_img)) {
         // echo $_POST['socketmb'];
         ?>

<div class="col-md-3">
 <div class="row">
   <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
   <h5><b><?php echo $row_se['detailhdd_Model']; ?></b></h5>
   <img src="upload/imagesHDD/<?php echo $row_se_img['imghdd_Nameimg']; ?>" style="height:240px; width:240px;">
   <h5 align="center">Price <?php echo number_format($row_se['detailhdd_Price']); ?>.-</h5>
     <div align="center">
       <button type="button" class="btn btn-warning" OnClick="JavaScript:AddHDDSpec2('<?php echo $row_se_img['imghdd_Nameimg']; ?>','<?php echo $row_se['detailhdd_Model']; ?>','<?php echo number_format($row_se['detailhdd_Price']); ?>','<?php echo $row_se['detailhdd_Price']; ?>');">ADD TO SPEC</button>
       <button type="button" class="btn btn-info" onClick="javascript:DetailHDD2('<?php echo $row_se['detailhdd_ID'];?>','<?php echo $row_se['detailhdd_Model'];?>');">DETAIL</button>
     </div>
 </div>
 <br>
</div>
<?php }
  }
}
  #HDD3
else if ($_POST['StatusData'] == 'hdd3') {
    $sql_se = " SELECT *, typehdd_Name, capacityhdd_Name, brand_Name FROM tbldetailhdd
     INNER JOIN tbltypehdd ON tbldetailhdd.detailhdd_IDtypehdd = tbltypehdd.typehdd_ID
     INNER JOIN tblcapacityhdd ON tbldetailhdd.detailhdd_IDcapacity = tblcapacityhdd.capacityhdd_ID
     INNER JOIN tblbrand ON tbldetailhdd.detailhdd_IDbrand = tblbrand.brand_ID";

   if ($_POST['typehdd'] != 0 ) {
     $sql_se .= " AND detailhdd_IDtypehdd = '".$_POST['typehdd']."'";
   }

   if ($_POST['capacityhdd'] != 0) {
     $sql_se .= " AND detailhdd_IDcapacity = '".$_POST['capacityhdd']."'";
   }

   if ($_POST['brandHDD'] != 0) {
     $sql_se .= " AND detailhdd_IDbrand = '".$_POST['brandHDD']."'";
   }

   $result_se = mysql_query($sql_se)or die(mysql_error());
   while ($row_se = mysql_fetch_array($result_se)) {

     $sql_se_img = " SELECT * FROM tblimghdd WHERE imghdd_IDdetailhdd = '".$row_se['detailhdd_ID']."' AND imghdd_Statusmain = 1";
     $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
       while ($row_se_img = mysql_fetch_array($result_se_img)) {
         // echo $_POST['socketmb'];
         ?>

<div class="col-md-3">
 <div class="row">
   <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
   <h5><b><?php echo $row_se['detailhdd_Model']; ?></b></h5>
   <img src="upload/imagesHDD/<?php echo $row_se_img['imghdd_Nameimg']; ?>" style="height:240px; width:240px;">
   <h5 align="center">Price <?php echo number_format($row_se['detailhdd_Price']); ?>.-</h5>
     <div align="center">
       <button type="button" class="btn btn-warning" OnClick="JavaScript:AddHDDSpec3('<?php echo $row_se_img['imghdd_Nameimg']; ?>','<?php echo $row_se['detailhdd_Model']; ?>','<?php echo number_format($row_se['detailhdd_Price']); ?>','<?php echo $row_se['detailhdd_Price']; ?>');">ADD TO SPEC</button>
       <button type="button" class="btn btn-info" onClick="javascript:DetailHDD3('<?php echo $row_se['detailhdd_ID'];?>','<?php echo $row_se['detailhdd_Model'];?>');">DETAIL</button>
     </div>
 </div>
 <br>
</div>
<?php }
  }
}
  #PW
else if ($_POST['StatusData'] == 'pw') {
  $sql_se = " SELECT *, wattpw_Name, brand_Name FROM tbldetailpw
       INNER JOIN tblwattpw ON tbldetailpw.detailpw_IDwattpw = tblwattpw.wattpw_ID
       INNER JOIN tblbrand ON tbldetailpw.detailpw_IDbrand = tblbrand.brand_ID";

     if ($_POST['wattpw'] != 0 ) {
       $sql_se .= " AND detailpw_IDwattpw = '".$_POST['wattpw']."'";
     }

     if ($_POST['brandpw'] != 0) {
       $sql_se .= " AND detailpw_IDbrand = '".$_POST['brandpw']."'";
     }

     $result_se = mysql_query($sql_se)or die(mysql_error());
     while ($row_se = mysql_fetch_array($result_se)) {

       $sql_se_img = " SELECT * FROM tblimgpw WHERE imgpw_IDdetailpw = '".$row_se['detailpw_ID']."' AND imgpw_Statusmain = 1";
       $result_se_img = mysql_query($sql_se_img)or die(mysql_error());
         while ($row_se_img = mysql_fetch_array($result_se_img)) {
           // echo $_POST['socketmb'];
           ?>

  <div class="col-md-3">
   <div class="row">
     <h4 style="color: rgb(254, 87, 25);"><?php echo $row_se['brand_Name']; ?></h4>
     <h5><b><?php echo $row_se['detailpw_Model']; ?></b></h5>
     <img src="upload/imagesPW/<?php echo $row_se_img['imgpw_Nameimg']; ?>" style="height:240px; width:240px;">
     <h5 align="center">Price <?php echo number_format($row_se['detailpw_Price']); ?>.-</h5>
       <div align="center">
         <button type="button" class="btn btn-warning" OnClick="JavaScript:AddPWSpec('<?php echo $row_se_img['imgpw_Nameimg']; ?>','<?php echo $row_se['detailpw_Model']; ?>','<?php echo number_format($row_se['detailpw_Price']); ?>','<?php echo $row_se['detailpw_Price']; ?>');">ADD TO SPEC</button>
         <button type="button" class="btn btn-info" onClick="javascript:DetailPW('<?php echo $row_se['detailpw_ID'];?>','<?php echo $row_se['detailpw_Model'];?>');">DETAIL</button>
       </div>
   </div>
   <br>
  </div>
  <?php }
  }
  } ?>


<!-- <html>
<body>
	<form name="frmMain" action="" method="post">
		<script language="JavaScript">


		</script>
		<input type="text" name="txtNumber" value="" OnChange="JavaScript:chkNum(this)">
	</form>
</body>
</html> -->
