<?php include "../../../../connect/connect_mysql.php"; ?>
 <script type="text/javascript">
 //-----------------------------------------------------------------------------------------------
   $('#ypehddtb').DataTable({
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
 $('#ypehddtb tfoot th').each( function () {
   var title = $(this).text();
   if((title != 'No') && (title != 'Management')){
     $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
   }else{
     $(this).html(' ');
   }
 } );
 //-------------------------------------------------------------
 // Apply the search ค้นหาจาก footer ------------------------
 $('#ypehddtb').DataTable().columns().every( function () {
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
  var table = $('#ypehddtb').DataTable();

 //--End of Customize Function -------------------------
 function changeCursor(el, cursor)
 {
 el.style.cursor = cursor;
 }

 function OpenAdminAddForm(){
 }
 </script>
    <button type="button" class="btn btn-success" onClick="javascript:AddTypehdd('add');"><i class="glyphicon glyphicon-plus"></i> Add</button>

 <table id="ypehddtb" class="display" cellspacing="0" width="100%"> <!--display nowrap-->
     <thead>
         <tr>
             <th style="text-align:center; width:5%; font-size:16px;"></th>
             <th style="text-align:center; width:25%; font-size:16px;">Name</th>
             <th style="text-align:center; width:20%; font-size:16px;">Status</th>
             <th style="text-align:center; width:15%; font-size:16px;">Management</th>
         </tr>
     </thead>
     <tfoot>
       <tr>
           <th style="text-align:center;">No</th>
           <th style="text-align:center;"></th>
           <th style="text-align:center;"></th> <!-- admin , requestor, approver, visitor -->
           <th style="text-align:center;">Management</th>
       </tr>
     </tfoot>
     <tbody>

     <?php $rowint = 1;
      $sql_typehdd = " SELECT typehdd_ID, typehdd_Name, typehdd_Status FROM tbltypehdd";
      $result_typehdd = mysql_query($sql_typehdd)or die(mysql_error());
      while ($row_typehdd = mysql_fetch_array($result_typehdd)) {
     ?>
         <tr style="cursor:pointer;">
             <td style="text-align:center; font-size:16px;"><?php echo $rowint;?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_typehdd['typehdd_Name'];?></td>
             <td style="font-size:16px; text-align:center;"><?php if ($row_typehdd['typehdd_Status'] == 1) {
               echo "Active";
             }else {
               echo "Inactive";
             }?></td>
             <td style="text-align:center;">
               <button type="button" class="btn btn-warning btn-xs" onClick="javascript:EditTypehdd('<?php echo $row_typehdd['typehdd_ID'];?>','edit');"><i class="glyphicon glyphicon-cog"></i> Edit</button>
               <button type="button" class="btn btn-danger btn-xs" onClick="javascript:DelTypehdd('<?php echo $row_typehdd['typehdd_ID'];?>','<?php echo $row_typehdd['typehdd_Name'];?>','delete');"><i class="glyphicon glyphicon-trash"></i> Delete</button>
             </td>
         </tr>
       <?php $rowint = $rowint + 1;
       } //while ?>
     </tbody>
 </table>

 <?php
 	#mysql_close($c); //close connection
 ?>
