<?php include "../../../connect/connect_mysql.php"; ?>
  <option value="0"> # Socket # </option>
  <?php $Select_chip = explode(",",$_POST['Select_chip']);
  $sql_socket = "SELECT * FROM tblsocket
      INNER JOIN tblchipset ON tblsocket.socket_IDchipset = tblchipset.chipset_ID
      INNER JOIN tblseries ON tblsocket.socket_IDchipset = tblseries.series_IDchipset
      WHERE tblchipset.chipset_Type = 1";

  if ($_POST['numselectcpu'] != 0) {
  for ($i=0; $i < $_POST['numselectcpu']; $i++) {
    if ($i == 0) {
      $sql_socket .= " AND socket_IDchipset = '".$Select_chip[$i]."'";
    }else {
      $sql_socket .= " OR socket_IDchipset = '".$Select_chip[$i]."'";
    }
  }
}

  if ($_POST['seriescpu'] != 0) {
    $sql_socket .= " AND series_ID = '".$_POST['seriescpu']."'";
  }
        $result_socket = mysql_query($sql_socket) or die(mysql_error());
        while ($row_socket = mysql_fetch_array($result_socket)) { ?>
  <option value="<?php echo $row_socket['socket_ID']; ?>" ><?php echo $row_socket['socket_Name']; ?></option>
  <?php }
?>
