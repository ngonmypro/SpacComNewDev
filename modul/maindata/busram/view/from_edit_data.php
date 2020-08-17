<?php include "../../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tblbusram WHERE busram_ID = '".$_POST['BusramId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_busram_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['busram_Name']; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_busram_type">
              <option value="0"> # Select Busram # </option>
                <?php
                $sqltyperam = 'SELECT typeram_ID, typeram_Name, typeram_Type FROM tbltyperam';
                $resulttyperam = mysql_query($sqltyperam) or die(mysql_error());
                  while ($rowtyperam = mysql_fetch_array($resulttyperam)) {
                ?>
                <option value="<?php echo $rowtyperam['typeram_ID']; ?>"
                  <?php if ($rowtyperam['typeram_ID'] == $row_edit['busram_IDtyperam']) {
                           echo 'selected="selected"';
                         } ?>>
                <?php if ($rowtyperam['typeram_Type'] == 1) {
                  echo $rowtyperam['typeram_Name']." (CPU)";
                }elseif ($rowtyperam['typeram_Type'] == 2) {
                  echo $rowtyperam['typeram_Name']." (VGA)";
                } ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_busram_status1" <?php if ($row_edit['busram_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_busram_status0" <?php if ($row_edit['busram_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
