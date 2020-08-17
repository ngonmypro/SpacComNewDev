<?php include "../../../connect/connect_mysql.php"; ?>
 <script type="text/javascript">
 //-----------------------------------------------------------------------------------------------
   $('#mbtb').DataTable({
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
 $('#mbtb tfoot th').each( function () {
   var title = $(this).text();
   if((title != 'No') && (title != 'Management')){
     $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
   }else{
     $(this).html(' ');
   }
 } );
 //-------------------------------------------------------------
 // Apply the search ค้นหาจาก footer ------------------------
 $('#mbtb').DataTable().columns().every( function () {
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
  var table = $('#mbtb').DataTable();

 //--End of Customize Function -------------------------
 function changeCursor(el, cursor)
 {
 el.style.cursor = cursor;
 }

 function OpenAdminAddForm(){
 }
 </script>
    <button type="button" class="btn btn-success" onClick="javascript:AddMB('add');"><i class="glyphicon glyphicon-plus"></i> Add</button>

 <table id="mbtb" class="display" cellspacing="0" width="100%"> <!--display nowrap-->
     <thead>
         <tr>
             <th style="text-align:center; width:5%; font-size:16px;"></th>
             <th style="text-align:center; width:25%; font-size:16px;">Name</th>
             <th style="text-align:center; width:25%; font-size:16px;">Socket</th>
             <th style="text-align:center; width:25%; font-size:16px;">Brand</th>
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
      $sql_mb = " SELECT *, brand_Name, socket_Name FROM tbldetailmb
          INNER JOIN tblbrand ON tbldetailmb.detailmb_IDbrand = tblbrand.brand_ID
          INNER JOIN tblsocket ON tbldetailmb.detailmb_IDsocket = tblsocket.socket_ID";
      $result_mb = mysql_query($sql_mb)or die(mysql_error());
      while ($row_mb = mysql_fetch_array($result_mb)) {
     ?>
         <tr style="cursor:pointer;">
             <td style="text-align:center; font-size:16px;"><?php echo $rowint;?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_mb['detailmb_Model'];?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_mb['socket_Name'];?></td>
             <td style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_mb['brand_Name'];?></td>
             <td style="font-size:16px; text-align:center;"><?php if ($row_mb['detailmb_Status'] == 1) {
               echo "Active";
             }else {
               echo "Inactive";
             }?></td>
             <td style="text-align:center;">
               <button type="button" class="btn btn-warning btn-xs" onClick="javascript:EditMB('<?php echo $row_mb['detailmb_ID'];?>','edit');"><i class="glyphicon glyphicon-cog"></i> Edit</button>
               <button type="button" class="btn btn-danger btn-xs" onClick="javascript:DelMB('<?php echo $row_mb['detailmb_ID'];?>','<?php echo $row_mb['detailmb_Model'];?>','delete');"><i class="glyphicon glyphicon-trash"></i> Delete</button>
               <?php if ($row_mb['detailmb_Status'] == 1) {?>
               <button type="button" class="btn btn-info btn-xs" onClick="javascript:ImgMB('<?php echo $row_mb['detailmb_ID'];?>','<?php echo $row_mb['detailmb_Model'];?>');"><i class="glyphicon glyphicon-picture"></i> Image</button>
               <!-- <button type="button" class="btn btn-primary btn-xs" onClick="javascript:comingsoon();"><i class="glyphicon glyphicon-list-alt"></i> Detail</button> -->
               <button type="button" class="btn btn-primary btn-xs" onClick="javascript:DetailMB('<?php echo $row_mb['detailmb_ID'];?>','<?php echo $row_mb['detailmb_Model'];?>');"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>
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
