<?php include "../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tbldetailhdd WHERE detailhdd_ID = '".$_POST['HDDId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_hdd_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['detailhdd_Model']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_hdd_brand">
              <option value="0"> # Select Brand # </option>
                <?php
                $sqlbrand = 'SELECT brand_ID, brand_Name, brand_Type FROM tblbrand
                          WHERE brand_Type = 4';
                $resultbrand = mysql_query($sqlbrand) or die(mysql_error());
                  while ($rowbrand = mysql_fetch_array($resultbrand)) {
                ?>
                <option value="<?php echo $rowbrand['brand_ID']; ?>"
                  <?php if ($rowbrand['brand_ID'] == $row_edit['detailhdd_IDbrand']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowbrand['brand_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type Harddisk</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_hdd_typehdd">
              <option value="0"> # Select Type Harddisk # </option>
                <?php
                $sqltypehdd = 'SELECT typehdd_ID, typehdd_Name FROM tbltypehdd';
                $resulttypehdd = mysql_query($sqltypehdd) or die(mysql_error());
                  while ($rowtypehdd = mysql_fetch_array($resulttypehdd)) {
                ?>
                <option value="<?php echo $rowtypehdd['typehdd_ID']; ?>"
                  <?php if ($rowtypehdd['typehdd_ID'] == $row_edit['detailhdd_IDtypehdd']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowtypehdd['typehdd_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Capacity</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_hdd_capacity">
              <option value="0"> # Select Capacity # </option>
                <?php
                $sqlcapacityhdd = 'SELECT capacityhdd_ID, capacityhdd_Name FROM tblcapacityhdd';
                $resultcapacityhdd = mysql_query($sqlcapacityhdd) or die(mysql_error());
                  while ($rowcapacityhdd = mysql_fetch_array($resultcapacityhdd)) {
                ?>
                <option value="<?php echo $rowcapacityhdd['capacityhdd_ID']; ?>"
                  <?php if ($rowcapacityhdd['capacityhdd_ID'] == $row_edit['detailhdd_IDcapacity']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowcapacityhdd['capacityhdd_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Interface</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_hdd_interface" placeholder="Please enter the Interface" min="0" maxlength="200" value="<?php echo $row_edit['detailhdd_Interface']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='number' class="form-control" id="edit_hdd_price" placeholder="Please enter the Price" min="0" maxlength="200" value="<?php echo $row_edit['detailhdd_Price']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_hdd_warranty" placeholder="Please enter the Warranty" maxlength="200" value="<?php echo $row_edit['detailhdd_warranty']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_hdd_status1" <?php if ($row_edit['detailhdd_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_hdd_status0" <?php if ($row_edit['detailhdd_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
