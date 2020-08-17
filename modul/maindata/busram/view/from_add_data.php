<?php include "../../../../connect/connect_mysql.php"; ?>
<div data-parsley-validate class="form-horizontal form-label-left">

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <input type='text' class="form-control" id="add_busram_name" placeholder="Please enter the name" maxlength="200"/>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <select class="form-control" id="add_busram_type">
            <option value="0"> # Select Type # </option>
              <?php
              $sqltyperam = 'SELECT typeram_ID, typeram_Name, typeram_Type FROM tbltyperam WHERE typeram_Type = 1';
              $resulttyperam = mysql_query($sqltyperam) or die(mysql_error());
                while ($rowtyperam = mysql_fetch_array($resulttyperam)) {
              ?>
              <option value="<?php echo $rowtyperam['typeram_ID']; ?>" ><?php echo $rowtyperam['typeram_Name'];?></option>
            <?php } ?>
          </select>
          <!-- <textarea rows="3"  class="form-control" id="add_chip_type" placeholder="Please enter the address" value=""><?php# echo $row_edit['EmployeeAddress']; ?></textarea> -->
        </div>
    </div>

</div>
