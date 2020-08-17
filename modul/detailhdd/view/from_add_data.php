<?php include "../../../connect/connect_mysql.php"; ?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_hdd_name" placeholder="Please enter the name" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_hdd_brand">
            <option value="0"> # Select Brand # </option>
              <?php
              $sqlbrand = 'SELECT brand_ID, brand_Name, brand_Type FROM tblbrand
                        WHERE brand_Type = 4';
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
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Type Harddisk</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_hdd_typehdd">
            <option value="0"> # Select Type Harddisk # </option>
              <?php
              $sqltypehdd = 'SELECT typehdd_ID, typehdd_Name FROM tbltypehdd';
              $resulttypehdd = mysql_query($sqltypehdd) or die(mysql_error());
                while ($rowtypehdd = mysql_fetch_array($resulttypehdd)) {
              ?>
              <option value="<?php echo $rowtypehdd['typehdd_ID']; ?>" ><?php echo $rowtypehdd['typehdd_Name']; ?></option>
            <?php } ?>
          </select>
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Capacity</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_hdd_capacity">
            <option value="0"> # Select Capacity # </option>
              <?php
              $sqlcapacityhdd = 'SELECT capacityhdd_ID, capacityhdd_Name FROM tblcapacityhdd';
              $resultcapacityhdd = mysql_query($sqlcapacityhdd) or die(mysql_error());
                while ($rowcapacityhdd = mysql_fetch_array($resultcapacityhdd)) {
              ?>
              <option value="<?php echo $rowcapacityhdd['capacityhdd_ID']; ?>" ><?php echo $rowcapacityhdd['capacityhdd_Name']; ?></option>
            <?php } ?>
          </select>
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Interface</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_hdd_interface" placeholder="Please enter the Interface" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='number' class="form-control" id="add_hdd_price" placeholder="Please enter the Price" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_hdd_warranty" placeholder="Please enter the Warranty" maxlength="200"/>
        </div>
    </div>

</div>
