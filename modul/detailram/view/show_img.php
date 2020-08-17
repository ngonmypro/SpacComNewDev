<?php include "../../../connect/connect_mysql.php";
 #echo $_POST['CPUId']; ?>
 <script type="text/javascript">
 //-----------------------------------------------------------------------------------------------
   $('#imgcputb').DataTable({
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
 $('#imgcputb tfoot th').each( function () {
   var title = $(this).text();
   if((title != 'No') && (title != 'Management')){
     $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
   }else{
     $(this).html(' ');
   }
 } );
 //-------------------------------------------------------------
 // Apply the search ค้นหาจาก footer ------------------------
 $('#imgcputb').DataTable().columns().every( function () {
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
  var table = $('#imgcputb').DataTable();

 //--End of Customize Function -------------------------
 function changeCursor(el, cursor)
 {
 el.style.cursor = cursor;
 }

 function OpenAdminAddForm(){
 }
 </script>

 <table id="imgcputb" class="display" cellspacing="0" width="100%"> <!--display nowrap-->
     <thead>
         <tr>
             <th style="text-align:center; width:5%; font-size:16px;"></th>
             <th style="text-align:center; width:25%; font-size:16px;">Image</th>
             <th style="text-align:center; width:15%; font-size:16px;">Management</th>
         </tr>
     </thead>
     <tbody>

     <?php $rowint = 1;
      $sql_imgram = " SELECT * FROM tblimgram WHERE imgram_IDdetailram = '".$_POST['RAMId']."'";
      $result_imgram = mysql_query($sql_imgram)or die(mysql_error());
      while ($row_imgram = mysql_fetch_array($result_imgram)) {
     ?>
         <tr style="cursor:pointer;">
             <td style="text-align:center; font-size:16px;"><?php echo $rowint;?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="upload/imagesRAM/<?php echo $row_imgram['imgram_Nameimg']; ?>" width="100px" height="100px" alt=""> </td>
             <td style="text-align:center;">
               <?php if ($row_imgram['imgram_Statusmain'] == 0) { ?>
                 <button type="button" class="btn btn-primary btn-xs" title="Set Main" onClick="javascript:MainImgRAM('<?php echo $row_imgram['imgram_ID'];?>', '<?php echo $_POST['RAMId']; ?>', 'MainImg');"><i class="glyphicon glyphicon-ok"></i></button>
                 <?php if ($row_imgram['imgram_Status'] == 1) { ?>
                   <button type="button" class="btn btn-success btn-xs" onClick="javascript:HideImgRAM('<?php echo $row_imgram['imgram_ID'];?>', '<?php echo $_POST['RAMId']; ?>', 'HideImg');"><i class="glyphicon glyphicon-eye-open"></i></button>
                 <?php }else{ ?>
                   <button type="button" class="btn btn-dark btn-xs" onClick="javascript:ShowImgRAM('<?php echo $row_imgram['imgram_ID'];?>', '<?php echo $_POST['RAMId']; ?>', 'ShowImg');"><i class="glyphicon glyphicon-eye-close"></i></button>
                 <?php } ?>
                 <button type="button" class="btn btn-danger btn-xs" onClick="javascript:DelImgRAM('<?php echo $row_imgram['imgram_ID'];?>', '<?php echo $_POST['RAMId']; ?>','DelImg');"><i class="glyphicon glyphicon-trash"></i></button>
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
