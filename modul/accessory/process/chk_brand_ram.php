<?php include "../../../connect/connect_mysql.php"; ?>
  <option value="0"> # Bus # </option>
  <?php $Select_typeram = explode(",",$_POST['Select_typeram']);
  $sql_typeram = "SELECT * FROM tblbusram";

  if ($_POST['numselecttyperam'] != 0) {
    for ($i=0; $i < $_POST['numselecttyperam']; $i++) {
      if ($i == 0) {
        $sql_typeram .= " WHERE busram_IDtyperam = '".$Select_typeram[$i]."'";
      }else {
        $sql_typeram .= " OR busram_IDtyperam = '".$Select_typeram[$i]."'";
      }
    }
  }
        $result_typeram = mysql_query($sql_typeram) or die(mysql_error());
        while ($row_typeram = mysql_fetch_array($result_typeram)) { ?>
  <option value="<?php echo $row_typeram['busram_ID']; ?>" ><?php echo $row_typeram['busram_Name']; ?></option>
<?php }?>
