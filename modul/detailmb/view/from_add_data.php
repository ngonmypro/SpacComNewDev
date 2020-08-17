<?php include "../../../connect/connect_mysql.php"; ?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_name" placeholder="Please enter the name" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_mb_socket">
            <option value="0"> # Select Socket # </option>
              <?php
              $sqlsocket = 'SELECT socket_ID, socket_Name, chipset_Type FROM tblsocket
                        INNER JOIN tblchipset ON tblsocket.socket_IDchipset = tblchipset.chipset_ID
                        WHERE chipset_Type = 1';
              $resultsocket = mysql_query($sqlsocket) or die(mysql_error());
                while ($rowsocket = mysql_fetch_array($resultsocket)) {
              ?>
              <option value="<?php echo $rowsocket['socket_ID']; ?>" ><?php echo $rowsocket['socket_Name']; ?></option>
            <?php } ?>
          </select>
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_mb_brand">
            <option value="0"> # Select Brand # </option>
              <?php
              $sqlbrand = 'SELECT brand_ID, brand_Name, brand_Type FROM tblbrand
                        WHERE brand_Type = 1';
              $resultbrand = mysql_query($sqlbrand) or die(mysql_error());
                while ($rowbrand = mysql_fetch_array($resultbrand)) {
              ?>
              <option value="<?php echo $rowbrand['brand_ID']; ?>" ><?php echo $rowbrand['brand_Name']; ?></option>
            <?php } ?>
          </select>
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Bus Ram</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <!-- <select class="form-control" id="add_mb_socket">
            <option value="0"> # Select Socket # </option> -->
              <?php
              $sqlbusram = 'SELECT busram_ID, busram_Name, typeram_Type FROM tblbusram
                        INNER JOIN tbltyperam ON tblbusram.busram_IDtyperam = tbltyperam.typeram_ID
                        WHERE typeram_Type = 1';
              $resultbusram = mysql_query($sqlbusram) or die(mysql_error());
              $numcountbusram = 1;
                while ($rowbusram = mysql_fetch_array($resultbusram)) {
              ?>
              <input type="checkbox" id="busrammb<?php echo $numcountbusram; ?>" value="<?php echo $rowbusram['busram_ID']; ?>"> <?php echo $rowbusram['busram_Name']; ?>&nbsp;&nbsp;
              <!-- <option value="" ></option> -->
            <?php $numcountbusram += 1; } ?>
          <!-- </select> -->
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
        <input type="hidden" id="numcountbusram" value="<?php echo $numcountbusram; ?>">
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Series CPU</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <!-- <select class="form-control" id="add_mb_socket">
            <option value="0"> # Select Socket # </option> -->
              <?php
              $sqlseries = 'SELECT series_ID, series_Name, chipset_Name FROM tblseries
                        INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
                        WHERE chipset_Type = 1';
              $resultseries = mysql_query($sqlseries) or die(mysql_error());
              $numcountseries = 1;
                while ($rowseries = mysql_fetch_array($resultseries)) {
              ?>
              <input type="checkbox" id="seriesmb<?php echo $numcountseries; ?>" value="<?php echo $rowseries['series_ID']; ?>"> <?php echo $rowseries['series_Name']; ?>&nbsp;&nbsp;
              <!-- <option value="" ></option> -->
            <?php $numcountseries += 1; } ?>
          <!-- </select> -->
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
        <input type="hidden" id="numcountseries" value="<?php echo $numcountseries; ?>">
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Graphics</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_graphics" placeholder="Please enter the Graphics" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Audio</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_audio" placeholder="Please enter the Audio" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Sata</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_sata" placeholder="Please enter the Sata" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">M.2</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_m2" placeholder="Please enter the M.2" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Slot</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_slot" placeholder="Please enter the Slot" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Lanspeed</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_lanspeed" placeholder="Please enter the Lanspeed" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Usb2</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_usb2" placeholder="Please enter the Usb2" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Usb3</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='number' class="form-control" id="add_mb_usb3" placeholder="Please enter the Usb3" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">DVIport</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_dviport" placeholder="Please enter the DVIport" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">HDMIport</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_hdmiport" placeholder="Please enter the HDMIport" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Audioport</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_audioport" placeholder="Please enter the Audioport" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Lanport</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_lanport" placeholder="Please enter the Lanport" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">FromFactor</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_fromfactor" placeholder="Please enter the FromFactor" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">warranty</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_mb_warranty" placeholder="Please enter the warranty" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='number' class="form-control" id="add_mb_price" placeholder="Please enter the Price" maxlength="200"/>
        </div>
    </div>

</div>
