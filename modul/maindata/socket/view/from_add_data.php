<?php include "../../../../connect/connect_mysql.php"; ?>
<div data-parsley-validate class="form-horizontal form-label-left">

  <!--<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสพนักงาน</label>
      <div class="col-md-7 col-sm-7 col-xs-12">
        <input type='text' class="form-control" id="add_emp_code" placeholder="กรุณากรอก รหัสพนักงาน"/>
      </div>
    </div>-->

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_socket_name" placeholder="Please enter the name" maxlength="200"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chipset</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="add_socket_chip">
              <option value="0"> # Select Chipset # </option>
                <?php
                $sqlchipset = 'SELECT chipset_ID, chipset_Name, chipset_Type FROM tblchipset';
                $resultchipset = mysql_query($sqlchipset) or die(mysql_error());
                  while ($rowchipset = mysql_fetch_array($resultchipset)) {
                ?>
                <option value="<?php echo $rowchipset['chipset_ID']; ?>" ><?php if ($rowchipset['chipset_Type'] == 1) {
                  echo $rowchipset['chipset_Name']." (CPU)";
                }elseif ($rowchipset['chipset_Type'] == 2) {
                  echo $rowchipset['chipset_Name']." (VGA)";
                } ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="add_socket_type">
              <option value="0"> # Select Type # </option>
              <option value="1"> CPU </option>
              <option value="2"> Mainboard </option>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php #echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

</div>
