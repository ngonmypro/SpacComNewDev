<?php include "../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tbldetailvga WHERE detailvga_ID = '".$_POST['VGAId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_vga_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['detailvga_Model']; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Series</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_vga_series">
              <option value="0"> # Select Series # </option>
                <?php
                $sqlseries = 'SELECT series_ID, series_Name, chipset_Type FROM tblseries
                          INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
                          WHERE chipset_Type = 2';
                $resultseries = mysql_query($sqlseries) or die(mysql_error());
                  while ($rowseries = mysql_fetch_array($resultseries)) {
                ?>
                <option value="<?php echo $rowseries['series_ID']; ?>"
                  <?php if ($rowseries['series_ID'] == $row_edit['detailvga_IDseries']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowseries['series_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_vga_brand">
              <option value="0"> # Select Brand # </option>
                <?php
                $sqlbrand = 'SELECT brand_ID, brand_Name, brand_Type FROM tblbrand
                          WHERE brand_Type = 3';
                $resultbrand = mysql_query($sqlbrand) or die(mysql_error());
                  while ($rowbrand = mysql_fetch_array($resultbrand)) {
                ?>
                <option value="<?php echo $rowbrand['brand_ID']; ?>"
                  <?php if ($rowbrand['brand_ID'] == $row_edit['detailvga_IDbrand']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowbrand['brand_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">GPU Speed</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_gpuspeed" placeholder="Please enter the GPU Speed" maxlength="200" value="<?php echo $row_edit['detailvga_GPUspeed']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ram Speed</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_ramspeed" placeholder="Please enter the Ram Speed" maxlength="200" value="<?php echo $row_edit['detailvga_Ramspeed']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Capacity Ram</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_capacityram" placeholder="Please enter the Capacity Ram" maxlength="200" value="<?php echo $row_edit['detailvga_Capacityram']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type Ram</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_vga_typeram">
              <option value="0"> # Select Type Ram # </option>
                <?php
                $sqltyperam = 'SELECT typeram_ID, typeram_Name, typeram_Type FROM tbltyperam
                          WHERE typeram_Type = 2';
                $resulttyperam = mysql_query($sqltyperam) or die(mysql_error());
                  while ($rowtyperam = mysql_fetch_array($resulttyperam)) {
                ?>
                <option value="<?php echo $rowtyperam['typeram_ID']; ?>"
                  <?php if ($rowtyperam['typeram_ID'] == $row_edit['detailvga_IDtyperam']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowtyperam['typeram_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bus</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_bus" placeholder="Please enter the Bus" maxlength="200" value="<?php echo $row_edit['detailvga_Bus']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">DVI Port</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_dviport" placeholder="Please enter the DVI Port" maxlength="200" value="<?php echo $row_edit['detailvga_DVIport']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">HDMI Port</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_hdmiport" placeholder="Please enter the HDMI Port" maxlength="200" value="<?php echo $row_edit['detailvga_HDMIport']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Display Port</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_displayport" placeholder="Please enter the Display Port" maxlength="200" value="<?php echo $row_edit['detailvga_Displayport']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Power consumption</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_tdp" placeholder="Please enter the Power consumption" maxlength="200" value="<?php echo $row_edit['detailvga_TDP']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='number' class="form-control" id="edit_vga_price" placeholder="Please enter the Price" min="0" maxlength="200" value="<?php echo $row_edit['detailvga_Price']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_vga_warranty" placeholder="Please enter the Warranty" maxlength="200" value="<?php echo $row_edit['detailvga_warranty']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_vga_status1" <?php if ($row_edit['detailvga_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_vga_status0" <?php if ($row_edit['detailvga_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
