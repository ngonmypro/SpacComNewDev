<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Spac Computer</title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- bootstrapdialog -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrapdialog/dist/css/bootstrap-dialog.min.css">

    <!-- Custom Theme Style -->
    <!-- <link href="build/css/custom.min.css" rel="stylesheet"> -->

    <script src="ajax/function.js"></script>
     <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <style media="screen">
    .bk {
      margin-left: 20px;
      height: 60px;
      width: 90%;
      color: rgb(111, 110, 110);
      border-style:solid;
      border-width:0px 0px 1px;
      border-color:rgb(195, 195, 195);
    }

    .total {
      margin-left: 20px;
      height: 75px;
      width: 90%;
      background-color: rgb(240, 240, 240);
      color: rgb(111, 110, 110);
      border-style:solid;
      border-width:0px 0px 1px;
      border-color:rgb(195, 195, 195);

    }

    #bkhover :hover {
      background-color:rgb(219, 221, 228);
      cursor: pointer;
      color: rgb(249, 135, 53);
    }

    .dot {
  margin-top: 17.5px;
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

/* #admin {
  margin-left: 20px;
  color: rgb(255, 255, 255);
} */

/* #adminhover :hover {
  color: rgb(13, 0, 164);
} */
    </style>
  </head>
  <body>

    <div align="left" id="adminhover">
      <a href="modul/login/login.php" id="admin">Admin</a>
    </div>
    <br>

    <div class="col-md-3">
      <!-- CPU -->
      <div class="row" id="bkhover" >
        <div class="col-md-12 bk" id="cpuselect" OnClick="JavaScript:LoadData('cpu');">
          <div class="col-md-3">
            <img class="dot" id="" src="images/cpu.png" alt="" />
          </div>
          <div class="col-md-9">
            <h4 style="margin-top: 23px">CPU</h4>
          </div>
        </div>

        <div class="col-md-12 bk" id="cpushow" OnClick="JavaScript:LoadData('cpu');">
          <div class="col-md-3">
            <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imgcpu" />
          </div>
          <div class="col-md-7">
            <h6 style="margin-top: 23px" id="namecpu"></h6>
          </div>
          <div class="col-md-2">
            <div class="row">
              <h6 style="margin-top: 2px" align="right" id="removecpu" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelCPUSpec('cpu');"></span></h6>
            </div>
            <div class="row">
              <h6 style="margin-top: -3px" id="pricecpu"></h6>
            </div>
          </div>
        </div>
        <input type="hidden" id="idcpusocketselect">
      </div>

      <!-- MB -->
      <div class="row" id="bkhover">
        <div class="col-md-12 bk" id="mbselect" OnClick="JavaScript:LoadData('mb');">
          <div class="col-md-3">
            <img class="dot" id="" src="images/mb.png" alt="" />
          </div>
          <div class="col-md-9">
            <h4 style="margin-top: 23px">Mainboard</h4>
          </div>
        </div>

        <div class="col-md-12 bk" id="mbshow" OnClick="JavaScript:LoadData('mb');">
          <div class="col-md-3">
            <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imgmb" />
          </div>
          <div class="col-md-7">
            <h6 style="margin-top: 23px" id="namemb"></h6>
          </div>
          <div class="col-md-2">
            <div class="row">
              <h6 style="margin-top: 2px" align="right" id="removemb" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelMBSpec('mb');"></span></h6>
            </div>
            <div class="row">
              <h6 style="margin-top: -3px" id="pricemb"></h6>
            </div>
          </div>
        </div>
        <input type="hidden" id="idmbselect">
        <input type="hidden" id="idmbsocketselect">
      </div>

      <!-- VGA -->
      <div class="row" id="bkhover">
        <div class="col-md-12 bk" id="vgaselect" OnClick="JavaScript:LoadData('vga');">
          <div class="col-md-3">
            <img class="dot" id="" src="images/vga.png" alt="" />
          </div>
          <div class="col-md-9">
            <h4 style="margin-top: 23px">VGA Card</h4>
          </div>
        </div>

        <div class="col-md-12 bk" id="vgashow" OnClick="JavaScript:LoadData('vga');">
          <div class="col-md-3">
            <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imgvga" />
          </div>
          <div class="col-md-7">
            <h6 style="margin-top: 23px" id="namevga"></h6>
          </div>
          <div class="col-md-2">
            <div class="row">
              <h6 style="margin-top: 2px" align="right" id="removevga" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelVGASpec('vga');"></span></h6>
            </div>
            <div class="row">
              <h6 style="margin-top: -3px" id="pricevga"></h6>
            </div>
          </div>
        </div>
      </div>

      <!-- RAM -->
      <div class="row" id="bkhover">
        <div class="col-md-12 bk" id="ramselect" OnClick="JavaScript:LoadData('ram');">
          <div class="col-md-3">
            <img class="dot" id="" src="images/ram.png" alt="" />
          </div>
          <div class="col-md-9">
            <h4 style="margin-top: 23px">Memory</h4>
          </div>
        </div>

        <div class="col-md-12 bk" id="ramshow" OnClick="JavaScript:LoadData('ram');">
          <div class="col-md-3">
            <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imgram" />
          </div>
          <div class="col-md-7">
            <h6 style="margin-top: 23px" id="nameram"></h6>
          </div>
          <div class="col-md-2">
            <div class="row">
              <h6 style="margin-top: 2px" align="right" id="removeram" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelRAMSpec('ram');"></span></h6>
            </div>
            <div class="row">
              <h6 style="margin-top: -3px" id="priceram"></h6>
            </div>
          </div>
        </div>
      </div>

      <!-- HDD -->
        <!-- 1 -->
      <div class="row" id="bkhover">
        <div class="col-md-12 bk" id="hddselect" OnClick="JavaScript:LoadData('hdd');">
          <div class="col-md-3">
            <img class="dot" id="" src="images/hdd.png" alt="" />
          </div>
          <div class="col-md-9">
            <h4 style="margin-top: 23px">Harddisk</h4>
          </div>
        </div>

        <div class="col-md-12 bk" id="hddshow" OnClick="JavaScript:LoadData('hdd');">
          <div class="col-md-3">
            <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imghdd" />
          </div>
          <div class="col-md-7">
            <h6 style="margin-top: 23px" id="namehdd"></h6>
          </div>
          <div class="col-md-2">
            <div class="row">
              <h6 style="margin-top: 2px" align="right" id="removehdd" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelHDDSpec('hdd');"></span></h6>
            </div>
            <div class="row">
              <h6 style="margin-top: -3px" id="pricehdd"></h6>
            </div>
          </div>
        </div>
      </div>

      <!-- 2 -->
    <div class="row" id="bkhover">
      <div class="col-md-12 bk" id="hddselect2" OnClick="JavaScript:LoadData('hdd2');">
        <div class="col-md-3">
          <img class="dot" id="" src="images/hdd.png" alt="" />
        </div>
        <div class="col-md-9">
          <h4 style="margin-top: 23px">Harddisk2</h4>
        </div>
      </div>

      <div class="col-md-12 bk" id="hddshow2" OnClick="JavaScript:LoadData('hdd2');">
        <div class="col-md-3">
          <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imghdd2" />
        </div>
        <div class="col-md-7">
          <h6 style="margin-top: 23px" id="namehdd2"></h6>
        </div>
        <div class="col-md-2">
          <div class="row">
            <h6 style="margin-top: 2px" align="right" id="removehdd2" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelHDDSpec2('hdd2');"></span></h6>
          </div>
          <div class="row">
            <h6 style="margin-top: -3px" id="pricehdd2"></h6>
          </div>
        </div>
      </div>
    </div>

    <!-- 3 -->
  <div class="row" id="bkhover">
    <div class="col-md-12 bk" id="hddselect3" OnClick="JavaScript:LoadData('hdd3');">
      <div class="col-md-3">
        <img class="dot" id="" src="images/hdd.png" alt="" />
      </div>
      <div class="col-md-9">
        <h4 style="margin-top: 23px">Harddisk3</h4>
      </div>
    </div>

    <div class="col-md-12 bk" id="hddshow3" OnClick="JavaScript:LoadData('hdd3');">
      <div class="col-md-3">
        <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imghdd3" />
      </div>
      <div class="col-md-7">
        <h6 style="margin-top: 23px" id="namehdd3"></h6>
      </div>
      <div class="col-md-2">
        <div class="row">
          <h6 style="margin-top: 2px" align="right" id="removehdd3" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelHDDSpec3('hdd3');"></span></h6>
        </div>
        <div class="row">
          <h6 style="margin-top: -3px" id="pricehdd3"></h6>
        </div>
      </div>
    </div>
  </div>

      <!-- PW -->
      <div class="row" id="bkhover">
        <div class="col-md-12 bk" id="pwselect" OnClick="JavaScript:LoadData('pw');">
          <div class="col-md-3">
            <img class="dot" id="" src="images/pw.png" alt="" />
          </div>
          <div class="col-md-9">
            <h4 style="margin-top: 23px">Powersupply</h4>
          </div>
        </div>

        <div class="col-md-12 bk" id="pwshow" OnClick="JavaScript:LoadData('pw');">
          <div class="col-md-3">
            <img style="margin-top: 10px; height: 40px; width: 40px;" src="" id="imgpw" />
          </div>
          <div class="col-md-7">
            <h6 style="margin-top: 23px" id="namepw"></h6>
          </div>
          <div class="col-md-2">
            <div class="row">
              <h6 style="margin-top: 2px" align="right" id="removepw" style="color:rgb(255, 255, 255);"><span class="glyphicon glyphicon-remove" OnClick="JavaScript:DelPWSpec('pw');"></span></h6>
            </div>
            <div class="row">
              <h6 style="margin-top: -3px" id="pricepw"></h6>
            </div>
          </div>
        </div>
      </div>

      <input type="hidden" value="0" id="varpricecpu">
      <input type="hidden" value="0" id="varpricemb">
      <input type="hidden" value="0" id="varpricevga">
      <input type="hidden" value="0" id="varpriceram">
      <input type="hidden" value="0" id="varpricehdd">
      <input type="hidden" value="0" id="varpricehdd2">
      <input type="hidden" value="0" id="varpricehdd3">
      <input type="hidden" value="0" id="varpricepw">

        <div class="row" id="total1">
          <div class="col-md-12 total" style="">
            <div class="col-md-3">
              <h4 style="margin-top: 40px;" id="totaltitle"></h4>
            </div>
            <div class="col-md-9">
              <h2 style="margin-top: 30px;" align="right"><b id="TotelPrice"></b></h2>
            </div>
          </div>
          <input type="hidden" id="numPrice" value="0">
        </div>

        <div class="row" id="total2">
          <div class="col-md-12 total" style="">
            <h3 style="margin-top: 30px;" align="center"><b id="">Select Components</b></h3>
          </div>
          <input type="hidden" id="numPrice" value="0">
        </div>
      </div>


    </div>

      <div class="col-md-9">
        <div class="" id="show_accessory"></div>
      </div>

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Copyright © <a id="footer"></a> All Rights Reserved - Create by <a href="https://www.facebook.com/ngonblackdevil/" target="_blank">Pongpichan Niramitwasu.</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <script>var d = new Date();document.getElementById("footer").innerHTML = d.getFullYear();</script>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- sweetalert -->
    <script src="vendors/sweetalert/sweetalert.min.js"></script>

    <!-- bootstrapdialog -->
    <script src="vendors/bootstrapdialog/dist/js/bootstrap-dialog.min.js"></script>
  </body>

</html>

<script type="text/javascript">
$("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:'cpu'});

$(document).ready(function(){
  //
  // CPU
  //
  $("#cpushow").hover(function(){
    document.getElementById("removecpu").style.color = "rgb(249, 135, 53)";
    }, function(){
    document.getElementById("removecpu").style.color = "#ffffff";
  });

  $("#cpushow").hide();
  document.getElementById("removecpu").style.color = "#ffffff";

  //
  // MB
  //
  $("#mbshow").hover(function(){
    document.getElementById("removemb").style.color = "rgb(249, 135, 53)";
    }, function(){
    document.getElementById("removemb").style.color = "#ffffff";
  });

  $("#mbshow").hide();
  document.getElementById("removemb").style.color = "#ffffff";

  //
  // VGA
  //
  $("#vgashow").hover(function(){
    document.getElementById("removevga").style.color = "rgb(249, 135, 53)";
    }, function(){
    document.getElementById("removevga").style.color = "#ffffff";
  });

  $("#vgashow").hide();
  document.getElementById("removeram").style.color = "#ffffff";

  //
  // Ram
  //
  $("#ramshow").hover(function(){
    document.getElementById("removeram").style.color = "rgb(249, 135, 53)";
    }, function(){
    document.getElementById("removeram").style.color = "#ffffff";
  });

  $("#ramshow").hide();
  document.getElementById("removeram").style.color = "#ffffff";

  //
  // HDD
  //
  $("#hddshow").hover(function(){
    document.getElementById("removehdd").style.color = "rgb(249, 135, 53)";
    }, function(){
    document.getElementById("removehdd").style.color = "#ffffff";
  });

  $("#hddshow").hide();
  document.getElementById("removehdd").style.color = "#ffffff";

    //
    // HDD2
    //
    $("#hddshow2").hover(function(){
      document.getElementById("removehdd2").style.color = "rgb(249, 135, 53)";
      }, function(){
      document.getElementById("removehdd2").style.color = "#ffffff";
    });

    $("#hddselect2").hide();
    $("#hddshow2").hide();
    document.getElementById("removehdd2").style.color = "#ffffff";

      //
      // HDD3
      //
      $("#hddshow3").hover(function(){
        document.getElementById("removehdd3").style.color = "rgb(249, 135, 53)";
        }, function(){
        document.getElementById("removehdd3").style.color = "#ffffff";
      });

      $("#hddselect3").hide();
      $("#hddshow3").hide();
      document.getElementById("removehdd3").style.color = "#ffffff";

  //
  // PW
  //
  $("#pwshow").hover(function(){
    document.getElementById("removepw").style.color = "rgb(249, 135, 53)";
    }, function(){
    document.getElementById("removepw").style.color = "#ffffff";
  });

  $("#pwshow").hide();
  document.getElementById("removepw").style.color = "#ffffff";

});

// Total
$("#total1").hide();
</script>
