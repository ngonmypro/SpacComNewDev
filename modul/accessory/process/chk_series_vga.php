<?php include "../../../connect/connect_mysql.php"; ?>
  <option value="0"> # Series # </option>
  <?php $Select_chipsetvga = explode(",",$_POST['Select_chipsetvga']);
  $sql_series = "SELECT * FROM tblseries
      INNER JOIN tblchipset ON tblseries.series_IDchipset = tblchipset.chipset_ID
      WHERE tblchipset.chipset_Type = 2";

  if ($_POST['numselectvga'] != 0) {
    for ($i=0; $i < $_POST['numselectvga']; $i++) {
      if ($i == 0) {
        $sql_series .= " AND series_IDchipset = '".$Select_chipsetvga[$i]."'";
      }else {
        $sql_series .= " OR series_IDchipset = '".$Select_chipsetvga[$i]."'";
      }
    }
  }
        $result_series = mysql_query($sql_series) or die(mysql_error());
        while ($row_series = mysql_fetch_array($result_series)) { ?>
  <option value="<?php echo $row_series['series_ID']; ?>" ><?php echo $row_series['series_Name']; ?></option>
<?php }?>
