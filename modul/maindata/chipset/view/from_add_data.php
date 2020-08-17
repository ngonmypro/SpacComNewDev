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
          <input type='text' class="form-control" id="add_chip_name" placeholder="Please enter the name" maxlength="200"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="add_chip_type">
              <option value="0"> # Select Type # </option>
              <option value="1"> CPU </option>
              <option value="2"> VGA </option>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

</div>
