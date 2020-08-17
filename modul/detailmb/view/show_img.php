<?php include "../../../connect/connect_mysql.php";
 #echo $_POST['MBId']; ?>
 <script type="text/javascript">
 //-----------------------------------------------------------------------------------------------
   $('#imgmbtb').DataTable({
   "createdRow": function ( row, data, index ) { //กำหนดเงือนไขเปลี่ยน style ของคอลัมน์หรือแถว
     if ( data[5]=='0' ) {
       $('td', row).eq(5).addClass('highlight'); //กำหนดสีของ คอลัมน์ที่ 5 ตาม style class ขื่อ highlight
     }
   },
   dom: 'Bfrtip',
     lengthMenu: [
         [ 25, 50, 100, -1 ],
         [ '25 rows', '50 rows', '100 rows', 'Show all' ]
     ],
     buttons: [{
       extend: 'pageLength'
       },
   ],

 });

 //กำหนดข้อความส่วนหัว --------------------------------------------------
   $("div.toolbar").html('');
 //------------------------------------------------------------------

 //กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
 $('#imgmbtb tfoot th').each( function () {
   var title = $(this).text();
   if((title != 'No') && (title != 'Management')){
     $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
   }else{
     $(this).html(' ');
   }
 } );
 //-------------------------------------------------------------
 // Apply the search ค้นหาจาก footer ------------------------
 $('#imgmbtb').DataTable().columns().every( function () {
   var that = this;
   //ค้นหาจาก footer
   $( 'input', this.footer() ).on( 'keyup change', function () {
     if ( that.search() !== this.value ) {
       that
         .search( this.value )
         .draw();
     }
   } );
 } );
 //----------------------------------------------------------

 // delete row ----------------------------------------------
  var table = $('#imgmbtb').DataTable();

 //--End of Customize Function -------------------------
 function changeCursor(el, cursor)
 {
 el.style.cursor = cursor;
 }

 function OpenAdminAddForm(){
 }
 </script>

 <table id="imgmbtb" class="display" cellspacing="0" width="100%"> <!--display nowrap-->
     <thead>
         <tr>
             <th style="text-align:center; width:5%; font-size:16px;"></th>
             <th style="text-align:center; width:25%; font-size:16px;">Image</th>
             <th style="text-align:center; width:15%; font-size:16px;">Management</th>
         </tr>
     </thead>
     <tbody>

     <?php $rowint = 1;
      $sql_imgmb = " SELECT * FROM tblimgmb WHERE imgmb_IDdetailmb = '".$_POST['MBId']."'";
      $result_imgmb = mysql_query($sql_imgmb)or die(mysql_error());
      while ($row_imgmb = mysql_fetch_array($result_imgmb)) {
     ?>
         <tr style="cursor:pointer;">
             <td style="text-align:center; font-size:16px;"><?php echo $rowint;?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="upload/imagesMB/<?php echo $row_imgmb['imgmb_Nameimg']; ?>" width="100px" height="100px" alt=""> </td>
             <td style="text-align:center;">
               <?php if ($row_imgmb['imgmb_Statusmain'] == 0) { ?>
                 <button type="button" class="btn btn-primary btn-xs" title="Set Main" onClick="javascript:MainImgMB('<?php echo $row_imgmb['imgmb_ID'];?>', '<?php echo $_POST['MBId']; ?>', 'MainImg');"><i class="glyphicon glyphicon-ok"></i></button>
                 <?php if ($row_imgmb['imgmb_Status'] == 1) { ?>
                   <button type="button" class="btn btn-success btn-xs" onClick="javascript:HideImgMB('<?php echo $row_imgmb['imgmb_ID'];?>', '<?php echo $_POST['MBId']; ?>', 'HideImg');"><i class="glyphicon glyphicon-eye-open"></i></button>
                 <?php }else{ ?>
                   <button type="button" class="btn btn-dark btn-xs" onClick="javascript:ShowImgMB('<?php echo $row_imgmb['imgmb_ID'];?>', '<?php echo $_POST['MBId']; ?>', 'ShowImg');"><i class="glyphicon glyphicon-eye-close"></i></button>
                 <?php } ?>
                 <button type="button" class="btn btn-danger btn-xs" onClick="javascript:DelImgMB('<?php echo $row_imgmb['imgmb_ID'];?>', '<?php echo $_POST['MBId']; ?>','DelImg');"><i class="glyphicon glyphicon-trash"></i></button>
               <?php }else{ ?>
                <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-home"></i></button>
               <?php } ?>
             </td>
         </tr>
       <?php $rowint = $rowint + 1;
       } //while ?>
     </tbody>
 </table>

 <?php
 	#mysql_close($c); //close connection
 ?>
