<?php include "../../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tbltyperam WHERE typeram_ID = '".$_POST['TyperamId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_typeram_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['typeram_Name']; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_typeram_type">
              <option value="0"> # Select Type # </option>
              <option <?php if ($row_edit['typeram_Type'] == '1') { echo 'selected="selected"';} ?> value="1"> RAM </option>
              <option <?php if ($row_edit['typeram_Type'] == '1') { echo 'selected="selected"';} ?> value="2"> VGA </option>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_typeram_status1" <?php if ($row_edit['typeram_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_typeram_status0" <?php if ($row_edit['typeram_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
