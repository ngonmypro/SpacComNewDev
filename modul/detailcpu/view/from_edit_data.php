<?php include "../../../connect/connect_mysql.php";
$sql_edit = "SELECT * FROM tbldetailcpu WHERE detailcpu_ID = '".$_POST['CPUId']."'";
$result_edit = mysql_query($sql_edit)or die(mysql_error());
while ($row_edit = mysql_fetch_array($result_edit)) {
?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="edit_cpu_name" placeholder="Please enter the name" maxlength="200" value="<?php echo $row_edit['detailcpu_Model']; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Series</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_cpu_series">
              <option value="0"> # Select Series # </option>
                <?php
                $sqlseries = 'SELECT series_ID, series_Name, chipset_Type FROM tblseries
                          INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
                          WHERE chipset_Type = 1';
                $resultseries = mysql_query($sqlseries) or die(mysql_error());
                  while ($rowseries = mysql_fetch_array($resultseries)) {
                ?>
                <option value="<?php echo $rowseries['series_ID']; ?>"
                  <?php if ($rowseries['series_ID'] == $row_edit['detailcpu_IDseries']) {
                           echo 'selected="selected"';
                         } ?>
                ><?php echo $rowseries['series_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <select class="form-control" id="edit_cpu_socket">
              <option value="0"> # Select Socket # </option>
                <?php
                $sqlsocket = 'SELECT socket_ID, socket_Name, chipset_Type FROM tblsocket
                          INNER JOIN tblchipset ON tblsocket.socket_IDchipset = tblchipset.chipset_ID
                          WHERE chipset_Type = 1';
                $resultsocket = mysql_query($sqlsocket) or die(mysql_error());
                  while ($rowsocket = mysql_fetch_array($resultsocket)) {
                ?>
                <option value="<?php echo $rowsocket['socket_ID']; ?>"
                  <?php if ($rowsocket['socket_ID'] == $row_edit['detailcpu_IDsocket']) {
                           echo 'selected="selected"';
                         } ?>
                  ><?php echo $rowsocket['socket_Name']; ?></option>
              <?php } ?>
            </select>
            <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Core</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_core" placeholder="Please enter the Core" maxlength="200" value="<?php echo $row_edit['detailcpu_Core']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thread</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_thread" placeholder="Please enter the Thread" maxlength="200" value="<?php echo $row_edit['detailcpu_Thread']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Frequency</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_frequency" placeholder="Please enter the Frequency" maxlength="200" value="<?php echo $row_edit['detailcpu_Frequency']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Turbo</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_turbo" placeholder="Please enter the Turbo" maxlength="200" value="<?php echo $row_edit['detailcpu_Turbo']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">CacheL2</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_cacheL2" placeholder="Please enter the CacheL2" maxlength="200" value="<?php echo $row_edit['detailcpu_CacheL2']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">CacheL3</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_cacheL3" placeholder="Please enter the CacheL3" maxlength="200" value="<?php echo $row_edit['detailcpu_CacheL3']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Power consumption</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_tdp" placeholder="Please enter the Power consumption" maxlength="200" value="<?php echo $row_edit['detailcpu_TDP']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='number' class="form-control" id="edit_cpu_price" placeholder="Please enter the Price" min="0" maxlength="200" value="<?php echo $row_edit['detailcpu_Price']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type='text' class="form-control" id="edit_cpu_warranty" placeholder="Please enter the Warranty" maxlength="200" value="<?php echo $row_edit['detailcpu_Warranty']; ?>"/>
          </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
          <div class="col-md-7 col-sm-7 col-xs-12">
            <input type="radio" name="status" id="edit_cpu_status1" <?php if ($row_edit['detailcpu_Status'] == '1') { echo "checked";} ?> value="1"> Active
            &nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" name="status" id="edit_cpu_status0" <?php if ($row_edit['detailcpu_Status'] == '0') { echo "checked";} ?> value="0"> InActive
          </div>
      </div>

</div>
<?php }
  mysql_close($c);
  ?>
