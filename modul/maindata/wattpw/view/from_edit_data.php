<?php include "../../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tblwattpw WHERE wattpw_ID = '".$_POST['WattpwId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_wattpw_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['wattpw_Name']; ?>"/>
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_wattpw_status1" <?php if ($row_edit['wattpw_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_wattpw_status0" <?php if ($row_edit['wattpw_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
