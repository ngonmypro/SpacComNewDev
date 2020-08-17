<?php include "../../../connect/connect_mysql.php"; ?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_name" placeholder="Please enter the name" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_pw_brand">
            <option value="0"> # Select Brand # </option>
              <?php
              $sqlbrand = 'SELECT brand_ID, brand_Name, brand_Type FROM tblbrand
                        WHERE brand_Type = 5';
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
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Watt</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_pw_watt">
            <option value="0"> # Select Watt # </option>
              <?php
              $sqltypewatt = 'SELECT wattpw_ID, wattpw_Name FROM tblwattpw';
              $resulttypewatt = mysql_query($sqltypewatt) or die(mysql_error());
                while ($rowtypewatt = mysql_fetch_array($resulttypewatt)) {
              ?>
              <option value="<?php echo $rowtypewatt['wattpw_ID']; ?>" ><?php echo $rowtypewatt['wattpw_Name']; ?></option>
            <?php } ?>
          </select>
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Mainboard Connector</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_mbconnector" placeholder="Please enter the Mainboard Connector" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">CPU Connector</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_cpuconnector" placeholder="Please enter the CPU Connector" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">PCIEx Connector</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_pciexconnector" placeholder="Please enter the PCIEx Connector" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">SATA Connector</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_sataconnector" placeholder="Please enter the SATA Connector" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">MOLEX Connector</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_molexconnector" placeholder="Please enter the MOLEX Connector" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Power Input</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_powerinput" placeholder="Please enter the Power Input" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='number' class="form-control" id="add_pw_price" placeholder="Please enter the Price" min="0" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_pw_warranty" placeholder="Please enter the Warranty" maxlength="200"/>
        </div>
    </div>

</div>
