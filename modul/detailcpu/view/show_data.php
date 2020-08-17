<?php include "../../../connect/connect_mysql.php"; ?>
 <script type="text/javascript">
 //-----------------------------------------------------------------------------------------------
   $('#cputb').DataTable({
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
 $('#cputb tfoot th').each( function () {
   var title = $(this).text();
   if((title != 'No') && (title != 'Management')){
     $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
   }else{
     $(this).html(' ');
   }
 } );
 //-------------------------------------------------------------
 // Apply the search ค้นหาจาก footer ------------------------
 $('#cputb').DataTable().columns().every( function () {
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
  var table = $('#cputb').DataTable();

 //--End of Customize Function -------------------------
 function changeCursor(el, cursor)
 {
 el.style.cursor = cursor;
 }

 function OpenAdminAddForm(){
 }
 </script>
    <button type="button" class="btn btn-success" onClick="javascript:AddCPU('add');"><i class="glyphicon glyphicon-plus"></i> Add</button>

 <table id="cputb" class="display" cellspacing="0" width="100%"> <!--display nowrap-->
     <thead>
         <tr>
             <th style="text-align:center; width:5%; font-size:16px;"></th>
             <th style="text-align:center; width:25%; font-size:16px;">Name</th>
             <th style="text-align:center; width:25%; font-size:16px;">Series</th>
             <th style="text-align:center; width:25%; font-size:16px;">Socket</th>
             <th style="text-align:center; width:20%; font-size:16px;">Status</th>
             <th style="text-align:center; width:15%; font-size:16px;">Management</th>
         </tr>
     </thead>
     <tfoot>
       <tr>
           <th style="text-align:center;">No</th>
           <th style="text-align:center;"></th>
           <th style="text-align:center;"></th>
           <th style="text-align:center;"></th>
           <th style="text-align:center;"></th> <!-- admin , requestor, approver, visitor -->
           <th style="text-align:center;">Management</th>
       </tr>
     </tfoot>
     <tbody>

     <?php $rowint = 1;
      $sql_cpu = " SELECT *, series_Name, socket_Name FROM tbldetailcpu
          INNER JOIN tblseries ON tbldetailcpu.detailcpu_IDseries = tblseries.series_ID
          INNER JOIN tblsocket ON tbldetailcpu.detailcpu_IDsocket = tblsocket.socket_ID";
      $result_cpu = mysql_query($sql_cpu)or die(mysql_error());
      while ($row_cpu = mysql_fetch_array($result_cpu)) {
     ?>
         <tr style="cursor:pointer;">
             <td style="text-align:center; font-size:16px;"><?php echo $rowint;?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_cpu['detailcpu_Model'];?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_cpu['series_Name'];?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_cpu['socket_Name'];?></td>
             <td style="font-size:16px; text-align:center;"><?php if ($row_cpu['detailcpu_Status'] == 1) {
               echo "Active";
             }else {
               echo "Inactive";
             }?></td>
             <td style="text-align:center;">
               <button type="button" class="btn btn-warning btn-xs" onClick="javascript:EditCPU('<?php echo $row_cpu['detailcpu_ID'];?>','edit');"><i class="glyphicon glyphicon-cog"></i> Edit</button>
               <button type="button" class="btn btn-danger btn-xs" onClick="javascript:DelCPU('<?php echo $row_cpu['detailcpu_ID'];?>','<?php echo $row_cpu['detailcpu_Model'];?>','delete');"><i class="glyphicon glyphicon-trash"></i> Delete</button>
               <?php if ($row_cpu['detailcpu_Status'] == 1) {?>
               <button type="button" class="btn btn-info btn-xs" onClick="javascript:ImgCPU('<?php echo $row_cpu['detailcpu_ID'];?>','<?php echo $row_cpu['detailcpu_Model'];?>');"><i class="glyphicon glyphicon-picture"></i> Image</button>
               <button type="button" class="btn btn-primary btn-xs" onClick="javascript:DetailCPU('<?php echo $row_cpu['detailcpu_ID'];?>','<?php echo $row_cpu['detailcpu_Model'];?>');"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>
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
