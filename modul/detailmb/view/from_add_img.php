<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-8">
    <form  id="frm">
          <div id="" class="form-group">
              <label class="control-label col-md-2">Photo</label>
              <div class="col-md-10">
                <input class="col-md-10" type="file" name="fileToUpload" id="fileToUpload">
              </div>
          </div>
        </form>
  </div>
  <div class="col-md-2">
    <button type="button" class="btn btn-info" onClick="javascript:AddImgMB('<?php echo $_POST['MBId']; ?>');"><i class="glyphicon glyphicon-plus"></i> Add</button>
  </div>
</div>
<hr>

<div class="row">
  <div id="showimg"></div>
</div>


<script type="text/javascript">
   $("#showimg").load("modul/detailmb/view/show_img.php",{MBId:<?php echo $_POST['MBId']; ?>});
      // $("#showimg").load("modul/detailmb/view/show_img.php");
</script>
