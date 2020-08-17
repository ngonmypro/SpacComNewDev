<?php include "../../../../connect/connect_mysql.php";

  $sql_edit = "SELECT * FROM tblchipset WHERE chipset_ID = '".$_POST['ChipId']."'";
  $result_edit = mysql_query($sql_edit)or die(mysql_error());
  while ($row_edit = mysql_fetch_array($result_edit)) {
 ?>
<div data-parsley-validate class="form-horizontal form-label-left">

  <!--<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสพนักงาน</label>
      <div class="col-md-7 col-sm-7 col-xs-12">
        <input type='text' class="form-control" id="edit_emp_code" placeholder="กรุณากรอก รหัสพนักงาน" value="<?php# echo $row_edit['EmployeeId']; ?>"/>
      </div>
    </div>-->

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">NAME</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_chip_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['chipset_Name']; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_chip_type">
              <option value="0"> # Select Type # </option>
              <option <?php if ($row_edit['chipset_Type'] == '1') { echo 'selected="selected"';} ?> value="1"> CPU </option>
              <option <?php if ($row_edit['chipset_Type'] == '2') { echo 'selected="selected"';} ?> value="2"> VGA </option>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_chip_status1" <?php if ($row_edit['chipset_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_chip_status0" <?php if ($row_edit['chipset_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }

  mysql_close($c);

?>
