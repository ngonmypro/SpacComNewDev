<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/" type="image/png" />
    <!--<link rel=“icon” type=“image/png” href=“http://example.com/image.png” />-->

    <title>Spac Computer</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="../vendors/lobipanel/bootstrap/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrapdialog -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrapdialog/dist/css/bootstrap-dialog.min.css">

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="vendors/datatables/jquery.Datatable.css">
    <link rel="stylesheet" type="text/css" href="vendors/datatableexport/buttons.dataTables.min.css">


    <!-- Custom Theme Style -->
    <link href="vendors/build/css/custom.min.css" rel="stylesheet">
		<!--<link href="vendors/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">-->
    <script src="ajax/function.js"></script>

  </head>
  <body class="nav-md" onLoad="Javascript:();">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index_backend.php" class="site_title"> <span> Data Computer</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome</span>
                <h2><?php echo $_SESSION['UName']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General Menu</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Main Data" OnClick="javascripct:();"><i class="fa fa-database" aria-hidden="true"></i> Main Data </a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:;" onClick="javascript:LoadChip();"> Chipset </a></li>
                      <li><a href="javascript:;" onClick="javascript:LoadSeries();"> Series </a></li>
											<li><a href="javascript:;" onClick="javascript:LoadSocket();"> Socket </a></li>
                      <li><a href="javascript:;" onClick="javascript:LoadBrand();"> Brand </a></li>
                      <li><a href="javascript:;" onClick="javascript:LoadTyperam();"> Type Ram </a></li>
											<li><a href="javascript:;" onClick="javascript:LoadBusram();"> Bus Ram </a></li>
                      <li><a href="javascript:;" onClick="javascript:LoadCapacityhdd();"> Capacity HDD </a></li>
                      <li><a href="javascript:;" onClick="javascript:LoadTypehdd();"> Type HDD </a></li>
											<li><a href="javascript:;" onClick="javascript:LoadWattpw();"> Watt Power Supply </a></li>
                    </ul>
                  </li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="CPU" OnClick="javascripct:LoadCPU();"><img src="images/cpu.png" alt=""> CPU </a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Mainboard" OnClick="javascripct:LoadMB();"><img src="images/mb.png" alt=""> Mainboard </a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Graphic Card" OnClick="javascripct:LoadVGA();"><img src="images/vga.png" alt=""> Graphic Card </a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="RAM" OnClick="javascripct:LoadRAM();"><img src="images/ram.png" alt=""> RAM </a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Harddisk" OnClick="javascripct:LoadHDD();"><img src="images/hdd.png" alt=""> Harddisk </a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Power Supply" OnClick="javascripct:LoadPW();"><img src="images/pw.png" alt=""> Power Supply </a></li>
                  <!-- <li><a data-toggle="tooltip" data-placement="bottom" title="ออกระบบ" OnClick="javascripct:logoutuser();"><i class="fa fa-sign-out"></i> Logout </a></li> -->
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="javascript:logoutuser();" style="color:#fff">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
      <div class="right_col" role="main"><br><hr>
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="content"></div>

          </div>
          <!-- /top tiles -->
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright © <a id="footer"></a> All Rights Reserved - Create by <a href="https://www.facebook.com/ngonblackdevil/" target="_blank">Pongpichan Niramitwasu.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
				<script>var d = new Date();document.getElementById("footer").innerHTML = d.getFullYear();</script>
        <!-- /footer content -->
      </div>
    </div>
	</div>


    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="vendors/build/js/custom.min.js"></script>
    <!-- sweetalert -->
    <script src="vendors/sweetalert/sweetalert.min.js"></script>

    <!-- bootstrapdialog -->
    <script src="vendors/bootstrapdialog/dist/js/bootstrap-dialog.min.js"></script>
    <!-- datatable -->
		<script src="vendors/datatables/jquery.Datatable.js"></script>
		<script src="vendors/datatableexport/dataTables.buttons.min.js"></script>
		<script src="vendors/datatableexport/buttons.flash.min.js"></script>
		<script src="vendors/datatableexport/jszip.min.js"></script>
		<script src="vendors/datatableexport/pdfmake.min.js"></script>
		<script src="vendors/datatableexport/vfs_fonts.js"></script>
		<script src="vendors/datatableexport/buttons.html5.min.js"></script>
		<script src="vendors/datatableexport/buttons.print.min.js"></script>
		<script src="vendors/datatableexport/dataTables.fixedHeader.min.js"></script>
		<script src="vendors/datatableexport/buttons.colVis.min.js"></script>

  </body>
</html>
