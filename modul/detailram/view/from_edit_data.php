<?php include "../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tbldetailram WHERE detailram_ID = '".$_POST['RAMId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_ram_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['detailram_Name']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bus Ram</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_ram_busram">
              <option value="0"> # Select Bus Ram # </option>
                <?php
                $sqlbusram = 'SELECT busram_ID, busram_Name FROM tblbusram
                          INNER JOIN tbltyperam ON tblbusram.busram_IDtyperam = tbltyperam.typeram_ID
                          WHERE typeram_Type = 1
                          ORDER BY busram_Name ASC';
                $resultbusram = mysql_query($sqlbusram) or die(mysql_error());
                  while ($rowbusram = mysql_fetch_array($resultbusram)) {
                ?>
                <option value="<?php echo $rowbusram['busram_ID']; ?>"
                  <?php if ($rowbusram['busram_ID'] == $row_edit['detailram_IDbusram']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowbusram['busram_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_ram_brand">
              <option value="0"> # Select Brand # </option>
                <?php
                $sqlbrand = 'SELECT brand_ID, brand_Name, brand_Type FROM tblbrand
                          WHERE brand_Type = 2';
                $resultbrand = mysql_query($sqlbrand) or die(mysql_error());
                  while ($rowbrand = mysql_fetch_array($resultbrand)) {
                ?>
                <option value="<?php echo $rowbrand['brand_ID']; ?>"
                  <?php if ($rowbrand['brand_ID'] == $row_edit['detailram_IDbrand']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowbrand['brand_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='number' class="form-control" id="edit_ram_price" placeholder="Please enter the Price" min="0" maxlength="200" value="<?php echo $row_edit['detailram_Price']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_ram_warranty" placeholder="Please enter the Warranty" maxlength="200" value="<?php echo $row_edit['detailram_warranty']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_ram_status1" <?php if ($row_edit['detailram_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_ram_status0" <?php if ($row_edit['detailram_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
