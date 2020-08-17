<?php include "../../../connect/connect_mysql.php";
#CPU
if ($_POST['StatusData'] == 'cpu') {
?>
<div class="row">
  <div class="col-md-2">
    <div class="col-md-4">
      <b>Brand</b>
    </div>
    <div class="col-md-8">
      <?php $sql_se_chip = " SELECT chipset_ID, chipset_Name FROM tblchipset WHERE chipset_Type = 1";
      $result_se_chip = mysql_query($sql_se_chip)or die(mysql_error());
      $i_se_chip = 1;
      while ($row_se_chip = mysql_fetch_array($result_se_chip)) {?>
      <input type="checkbox" id="select_chipcpu<?php echo $i_se_chip; ?>" value="<?php echo $row_se_chip['chipset_ID'] ?>" OnClick="JavaScript:SelectChipCPU();"> &nbsp;<?php echo $row_se_chip['chipset_Name'] ?>
    <?php $i_se_chip += 1; } ?>
    <input type="hidden" id="count_se_chip" value="<?php echo $i_se_chip-1; ?>">
    </div>
  </div>
  <div class="col-md-4">
    <div class="col-md-4">
      <b>Series</b>
    </div>
    <div class="col-md-8">
      <select class="form-control" id="seriescpu" OnChange="JavaScript:SelectSeriesCPU();">
        <option value="0"> # Series # </option>
          <?php $sql_series = "SELECT * FROM tblseries
              INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
              WHERE tblchipset.chipset_Type = 1";
              $result_series = mysql_query($sql_series) or die(mysql_error());
                while ($row_series = mysql_fetch_array($result_series)) { ?>
        <option value="<?php echo $row_series['series_ID']; ?>"><?php echo $row_series['series_Name']; ?></option>
      <?php } ?>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="col-md-4">
      <b>Socket</b>
    </div>
    <div class="col-md-8">
      <select class="form-control" id="socketcpu"  OnChange="JavaScript:SelectSocketCPU();">
        <option value="0"> # Socket #</option>
          <?php $sql_socket = "SELECT * FROM tblsocket
              INNER JOIN tblchipset ON tblsocket.socket_IDchipset = tblchipset.chipset_ID
              WHERE tblchipset.chipset_Type = 1";
              $result_socket = mysql_query($sql_socket) or die(mysql_error());
                while ($row_socket = mysql_fetch_array($result_socket)) { ?>
        <option value="<?php echo $row_socket['socket_ID']; ?>"><?php echo $row_socket['socket_Name']; ?></option>
      <?php } ?>
      </select>
    </div>
  </div>
</div>
<input type="hidden" id="idmbsocketselect" value="<?php echo $_POST['idmbsocketselect']; ?>">
<?php }
#MB
else if ($_POST['StatusData'] == 'mb') { ?>
  <div class="row">
    <div class="col-md-4">
      <div class="col-md-4">
        <b>Socket</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="socketmb"  OnChange="JavaScript:SelectSocketMB();">
          <option value="0"> # Socket #</option>
            <?php $sql_socket = "SELECT * FROM tblsocket
                INNER JOIN tblchipset ON tblsocket.socket_IDchipset = tblchipset.chipset_ID
                WHERE tblchipset.chipset_Type = 1";
                $result_socket = mysql_query($sql_socket) or die(mysql_error());
                  while ($row_socket = mysql_fetch_array($result_socket)) { ?>
          <option value="<?php echo $row_socket['socket_ID']; ?>"><?php echo $row_socket['socket_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-2">
        <b>Brand</b>
      </div>
      <div class="col-md-10">
        <?php $sql_se_brand = " SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 1";
        $result_se_brand = mysql_query($sql_se_brand)or die(mysql_error());
        $i_se_brand = 1;
        while ($row_se_brand = mysql_fetch_array($result_se_brand)) {?>
        <input type="checkbox" id="select_brandmb<?php echo $i_se_brand; ?>" value="<?php echo $row_se_brand['brand_ID']; ?>" OnClick="JavaScript:SelectBrandMB();"> &nbsp;<?php echo $row_se_brand['brand_Name']; ?>
      <?php $i_se_brand += 1; } ?>
      <input type="hidden" id="count_se_brandmb" value="<?php echo $i_se_brand-1; ?>">
      </div>
    </div>
  </div>
  <input type="hidden" id="idcpusocketselect" value="<?php echo $_POST['idcpusocketselect']; ?>">
<?php }
#VGA
else if ($_POST['StatusData'] == 'vga') { ?>
  <div class="row">
    <div class="col-md-3">
      <div class="col-md-3">
        <b>Chipset</b>
      </div>
      <div class="col-md-9">
        <?php $sql_se_chipsetvga = " SELECT chipset_ID, chipset_Name FROM tblchipset WHERE chipset_Type = 2";
        $result_se_chipsetvga = mysql_query($sql_se_chipsetvga)or die(mysql_error());
        $i_se_chipsetvga = 1;
        while ($row_se_chipsetvga = mysql_fetch_array($result_se_chipsetvga)) {?>
        <input type="checkbox" id="select_chipsetvga<?php echo $i_se_chipsetvga; ?>" value="<?php echo $row_se_chipsetvga['chipset_ID']; ?>" OnClick="JavaScript:SelectChipsetVGA();"> &nbsp;<?php echo $row_se_chipsetvga['chipset_Name']; ?>
      <?php $i_se_chipsetvga += 1; } ?>
      <input type="hidden" id="count_se_chipsetvga" value="<?php echo $i_se_chipsetvga-1; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-4">
        <b>Series</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="seriesvga"  OnChange="JavaScript:SelectSseriesVGA();">
          <option value="0"> # Series #</option>
          <?php $sql_seriesvga = "SELECT * FROM tblseries
              INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
              WHERE tblchipset.chipset_Type = 2";
              $result_seriesvga = mysql_query($sql_seriesvga) or die(mysql_error());
                while ($row_seriesvga = mysql_fetch_array($result_seriesvga)) { ?>
        <option value="<?php echo $row_seriesvga['series_ID']; ?>"><?php echo $row_seriesvga['series_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Brand</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="brandvga"  OnChange="JavaScript:SelectBrandVGA();">
          <option value="0"> # Brand #</option>
          <?php $sql_brandvga = "SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 3";
              $result_brandvga = mysql_query($sql_brandvga) or die(mysql_error());
                while ($row_brandvga = mysql_fetch_array($result_brandvga)) { ?>
        <option value="<?php echo $row_brandvga['brand_ID']; ?>"><?php echo $row_brandvga['brand_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>
<?php }
#RAM
else if ($_POST['StatusData'] == 'ram') { ?>
  <div class="row">
    <div class="col-md-2">
      <div class="col-md-4">
        <b>Type</b>
      </div>
      <div class="col-md-8">
        <?php $sql_se_typeram = " SELECT typeram_ID, typeram_Name FROM tbltyperam WHERE typeram_Type = 1";
        $result_se_typeram = mysql_query($sql_se_typeram)or die(mysql_error());
        $i_se_typeram = 1;
        while ($row_se_typeram = mysql_fetch_array($result_se_typeram)) {?>
        <input type="checkbox" id="select_typeram<?php echo $i_se_typeram; ?>" value="<?php echo $row_se_typeram['typeram_ID']; ?>" OnClick="JavaScript:SelectTypeRam();"> &nbsp;<?php echo $row_se_typeram['typeram_Name']; ?>
      <?php $i_se_typeram += 1; } ?>
      <input type="hidden" id="count_se_typeram" value="<?php echo $i_se_typeram-1; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-3">
        <b>Bus</b>
      </div>
      <div class="col-md-9">
        <select class="form-control" id="busram" OnChange="JavaScript:SelectBusRam();">
          <option value="0"> # Bus # </option>
            <?php $sql_busram = "SELECT * FROM tblbusram
                INNER JOIN tbltyperam ON tblbusram.busram_IDtyperam = tbltyperam.typeram_ID
                WHERE tbltyperam.typeram_Type = 1";
                $result_busram = mysql_query($sql_busram) or die(mysql_error());
                  while ($row_busram = mysql_fetch_array($result_busram)) { ?>
          <option value="<?php echo $row_busram['busram_ID']; ?>"><?php echo $row_busram['busram_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-3">
        <b>Brand</b>
      </div>
      <div class="col-md-9">
        <select class="form-control" id="brandram" OnChange="JavaScript:SelectBrandRam();">
          <option value="0"> # Brand # </option>
            <?php $sql_brandram = " SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 2";
                $result_brandram = mysql_query($sql_brandram)or die(mysql_error());
                // $i_brandram = 1;
                  while ($row_brandram = mysql_fetch_array($result_brandram)) {?>
          <option value="<?php echo $row_brandram['brand_ID']; ?>"><?php echo $row_brandram['brand_Name']; ?></option>
          <?php } ?>
        </select>
      <!-- <input type="hidden" id="count_brandram" value="<?php #echo $i_brandram-1; ?>"> -->
      </div>
    </div>
  </div>
  <input type="hidden" id="idmbselect" value="<?php echo $_POST['idmbselect']; ?>">
<?php }
#HDD
else if ($_POST['StatusData'] == 'hdd') { ?>
  <div class="row">
    <div class="col-md-4">
      <div class="col-md-4">
        <b>Type</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="typehdd"  OnChange="JavaScript:SelectTypeHDD();">
          <option value="0"> # Type #</option>
          <?php $sql_typehdd = "SELECT * FROM tbltypehdd";
              $result_typehdd = mysql_query($sql_typehdd) or die(mysql_error());
                while ($row_typehdd = mysql_fetch_array($result_typehdd)) { ?>
        <option value="<?php echo $row_typehdd['typehdd_ID']; ?>"><?php echo $row_typehdd['typehdd_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Capacity</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="capacityhdd"  OnChange="JavaScript:SelectCapacityHDD();">
          <option value="0"> # Capacity #</option>
          <?php $sql_capacityhdd = "SELECT * FROM tblcapacityhdd";
              $result_capacityhdd = mysql_query($sql_capacityhdd) or die(mysql_error());
                while ($row_capacityhdd = mysql_fetch_array($result_capacityhdd)) { ?>
        <option value="<?php echo $row_capacityhdd['capacityhdd_ID']; ?>"><?php echo $row_capacityhdd['capacityhdd_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Brand</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="brandHDD"  OnChange="JavaScript:SelectBrandPW();">
          <option value="0"> # Brand #</option>
          <?php $sql_brandvga = "SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 5";
              $result_brandvga = mysql_query($sql_brandvga) or die(mysql_error());
                while ($row_brandvga = mysql_fetch_array($result_brandvga)) { ?>
        <option value="<?php echo $row_brandvga['brand_ID']; ?>"><?php echo $row_brandvga['brand_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>
<?php }
#HDD2
else if ($_POST['StatusData'] == 'hdd2') { ?>
  <div class="row">
    <div class="col-md-4">
      <div class="col-md-4">
        <b>Type</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="typehdd2"  OnChange="JavaScript:SelectTypeHDD2();">
          <option value="0"> # Type #</option>
          <?php $sql_typehdd = "SELECT * FROM tbltypehdd";
              $result_typehdd = mysql_query($sql_typehdd) or die(mysql_error());
                while ($row_typehdd = mysql_fetch_array($result_typehdd)) { ?>
        <option value="<?php echo $row_typehdd['typehdd_ID']; ?>"><?php echo $row_typehdd['typehdd_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Capacity</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="capacityhdd2"  OnChange="JavaScript:SelectCapacityHDD2();">
          <option value="0"> # Capacity #</option>
          <?php $sql_capacityhdd = "SELECT * FROM tblcapacityhdd";
              $result_capacityhdd = mysql_query($sql_capacityhdd) or die(mysql_error());
                while ($row_capacityhdd = mysql_fetch_array($result_capacityhdd)) { ?>
        <option value="<?php echo $row_capacityhdd['capacityhdd_ID']; ?>"><?php echo $row_capacityhdd['capacityhdd_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Brand</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="brandHDD2"  OnChange="JavaScript:SelectBrandPW2();">
          <option value="0"> # Brand #</option>
          <?php $sql_brandvga = "SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 5";
              $result_brandvga = mysql_query($sql_brandvga) or die(mysql_error());
                while ($row_brandvga = mysql_fetch_array($result_brandvga)) { ?>
        <option value="<?php echo $row_brandvga['brand_ID']; ?>"><?php echo $row_brandvga['brand_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>
<?php }
#HDD3
else if ($_POST['StatusData'] == 'hdd3') { ?>
  <div class="row">
    <div class="col-md-4">
      <div class="col-md-4">
        <b>Type</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="typehdd3"  OnChange="JavaScript:SelectTypeHDD3();">
          <option value="0"> # Type #</option>
          <?php $sql_typehdd = "SELECT * FROM tbltypehdd";
              $result_typehdd = mysql_query($sql_typehdd) or die(mysql_error());
                while ($row_typehdd = mysql_fetch_array($result_typehdd)) { ?>
        <option value="<?php echo $row_typehdd['typehdd_ID']; ?>"><?php echo $row_typehdd['typehdd_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Capacity</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="capacityhdd3"  OnChange="JavaScript:SelectCapacityHDD3();">
          <option value="0"> # Capacity #</option>
          <?php $sql_capacityhdd = "SELECT * FROM tblcapacityhdd";
              $result_capacityhdd = mysql_query($sql_capacityhdd) or die(mysql_error());
                while ($row_capacityhdd = mysql_fetch_array($result_capacityhdd)) { ?>
        <option value="<?php echo $row_capacityhdd['capacityhdd_ID']; ?>"><?php echo $row_capacityhdd['capacityhdd_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Brand</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="brandHDD3"  OnChange="JavaScript:SelectBrandPW3();">
          <option value="0"> # Brand #</option>
          <?php $sql_brandvga = "SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 5";
              $result_brandvga = mysql_query($sql_brandvga) or die(mysql_error());
                while ($row_brandvga = mysql_fetch_array($result_brandvga)) { ?>
        <option value="<?php echo $row_brandvga['brand_ID']; ?>"><?php echo $row_brandvga['brand_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>
<?php }
#PW
else if ($_POST['StatusData'] == 'pw') { ?>
  <div class="row">
    <div class="col-md-4">
      <div class="col-md-4">
        <b>Watt</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="wattpw"  OnChange="JavaScript:SelectWattPW();">
          <option value="0"> # Watt #</option>
          <?php $sql_wattpw = "SELECT * FROM tblwattpw";
              $result_wattpw = mysql_query($sql_wattpw) or die(mysql_error());
                while ($row_wattpw = mysql_fetch_array($result_wattpw)) { ?>
        <option value="<?php echo $row_wattpw['wattpw_ID']; ?>"><?php echo $row_wattpw['wattpw_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="col-md-4">
        <b>Brand</b>
      </div>
      <div class="col-md-8">
        <select class="form-control" id="brandpw"  OnChange="JavaScript:SelectBrandPW();">
          <option value="0"> # Brand #</option>
          <?php $sql_brandvga = "SELECT brand_ID, brand_Name FROM tblbrand WHERE brand_Type = 5";
              $result_brandvga = mysql_query($sql_brandvga) or die(mysql_error());
                while ($row_brandvga = mysql_fetch_array($result_brandvga)) { ?>
        <option value="<?php echo $row_brandvga['brand_ID']; ?>"><?php echo $row_brandvga['brand_Name']; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>
  <?php } ?>
<hr>
<input type="hidden" id="StatusData" value="<?php echo $_POST['StatusData']; ?>">

<div class="row" id="detail_data"></div>

<script type="text/javascript">
$(document).ready(function(){
var StatusData = $("#StatusData").val();

// $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData, idselect:idselect});
if (StatusData == "cpu") {
  var idmbsocketselect = $("#idmbsocketselect").val();
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,idmbsocketselect:idmbsocketselect});
}else if (StatusData == "mb") {
  var idcpusocketselect = $("#idcpusocketselect").val();
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData, idcpusocketselect:idcpusocketselect});
}else if (StatusData == "vga") {
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData});
}else if (StatusData == "ram") {
  var idmbselect = $("#idmbselect").val();
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData, idmbselect:idmbselect});
}else if (StatusData == "hdd") {
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData});
}else if (StatusData == "hdd2") {
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData});
}else if (StatusData == "hdd3") {
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData});
}else if (StatusData == "pw") {
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData});
}
});

</script>
