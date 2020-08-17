<?
include "connect_mysql.php";

$sql1 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblchipset` ( ";
$sql1 .= " `chipset_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
$sql1 .= " `chipset_Name` VARCHAR( 200 ) NOT NULL , ";
$sql1 .= " `chipset_CreateBy` VARCHAR( 100 ) NOT NULL , ";
$sql1 .= " `chipset_CreateTime` DATETIME NOT NULL , ";
$sql1 .= " `chipset_UpdateBy` VARCHAR( 100 ) NULL , ";
$sql1 .= " `chipset_UpdateTime` DATETIME NULL , ";
$sql1 .= " `chipset_Type` TINYINT( 1 ) NOT NULL , "; // 1 = CPU , 2 = VGA
$sql1 .= " `chipset_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
$sql1 .= "  INDEX(chipset_ID, chipset_Name) ";
$sql1 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

 $create_tb1 = mysql_query($sql1) or die(mysql_error());


 $sql2 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblseries` ( ";
 $sql2 .= " `series_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
 $sql2 .= " `series_IDchipset` INT NOT NULL , ";
 $sql2 .= " `series_Name` VARCHAR( 200 ) NOT NULL , ";
 $sql2 .= " `series_CreateBy` VARCHAR( 100 ) NOT NULL , ";
 $sql2 .= " `series_CreateTime` DATETIME NOT NULL , ";
 $sql2 .= " `series_UpdateBy` VARCHAR( 100 ) NULL , ";
 $sql2 .= " `series_UpdateTime` DATETIME NULL , ";
 $sql2 .= " `series_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
 $sql2 .= "  INDEX(series_ID, series_IDchipset, series_Name) ";
 $sql2 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

  $create_tb2 = mysql_query($sql2) or die(mysql_error());


  $sql3 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblsocket` ( ";
  $sql3 .= " `socket_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
  $sql3 .= " `socket_IDchipset` INT NOT NULL , ";
  $sql3 .= " `socket_Name` VARCHAR( 200 ) NOT NULL , ";
  $sql3 .= " `socket_CreateBy` VARCHAR( 100 ) NOT NULL , ";
  $sql3 .= " `socket_CreateTime` DATETIME NOT NULL , ";
  $sql3 .= " `socket_UpdateBy` VARCHAR( 100 ) NULL , ";
  $sql3 .= " `socket_UpdateTime` DATETIME NULL , ";
  $sql3 .= " `socket_Type` TINYINT( 1 ) NOT NULL , "; // 1 = CPU , 2 = MB
  $sql3 .= " `socket_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
  $sql3 .= "  INDEX(socket_ID, socket_IDchipset, socket_Name) ";
  $sql3 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

   $create_tb3 = mysql_query($sql3) or die(mysql_error());


   $sql4 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbldetailcpu` ( ";
   $sql4 .= " `detailcpu_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
   $sql4 .= " `detailcpu_IDseries` INT NOT NULL , ";
   $sql4 .= " `detailcpu_IDsocket` INT NOT NULL , ";
   $sql4 .= " `detailcpu_Model` VARCHAR( 200 ) NOT NULL , ";
   $sql4 .= " `detailcpu_Core` VARCHAR( 10 ) NULL , ";
   $sql4 .= " `detailcpu_Thread` VARCHAR( 10 ) NULL , ";
   $sql4 .= " `detailcpu_Frequency` VARCHAR( 20 ) NULL , ";
   $sql4 .= " `detailcpu_Turbo` VARCHAR( 20 ) NULL , ";
   $sql4 .= " `detailcpu_CacheL2` VARCHAR( 20 ) NULL , ";
   $sql4 .= " `detailcpu_CacheL3` VARCHAR( 20 ) NULL , ";
   $sql4 .= " `detailcpu_TDP` VARCHAR( 20 ) NULL , ";
   $sql4 .= " `detailcpu_Price` INT NOT NULL , ";
   $sql4 .= " `detailcpu_Warranty` VARCHAR( 10 ) NULL , ";
   $sql4 .= " `detailcpu_CreateBy` VARCHAR( 100 ) NOT NULL , ";
   $sql4 .= " `detailcpu_CreateTime` DATETIME NOT NULL , ";
   $sql4 .= " `detailcpu_UpdateBy` VARCHAR( 100 ) NULL , ";
   $sql4 .= " `detailcpu_UpdateTime` DATETIME NULL , ";
   $sql4 .= " `detailcpu_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
   $sql4 .= "  INDEX(detailcpu_ID, detailcpu_IDseries, detailcpu_IDsocket, detailcpu_Model) ";
   $sql4 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

    $create_tb4 = mysql_query($sql4) or die(mysql_error());


    $sql5 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblbrand` ( ";
    $sql5 .= " `brand_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
    $sql5 .= " `brand_Name` VARCHAR( 200 ) NOT NULL , ";
    $sql5 .= " `brand_CreateBy` VARCHAR( 100 ) NOT NULL , ";
    $sql5 .= " `brand_CreateTime` DATETIME NOT NULL , ";
    $sql5 .= " `brand_UpdateBy` VARCHAR( 100 ) NULL , ";
    $sql5 .= " `brand_UpdateTime` DATETIME NULL , ";
    $sql5 .= " `brand_Type` TINYINT( 1 ) NOT NULL , "; // 1 = MB , 2 = RAM , 3 = VGA , 4 = HDD , 5 = PW
    $sql5 .= " `brand_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
    $sql5 .= "  INDEX(brand_ID, brand_Name) ";
    $sql5 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

     $create_tb5 = mysql_query($sql5) or die(mysql_error());


     $sql6 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblmbseriescpu` ( ";
     $sql6 .= " `mbseriescpu_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
     $sql6 .= " `mbseriescpu_IDseries` INT NOT NULL , ";
     $sql6 .= " `mbseriescpu_IDDetailMB` VARCHAR( 200 ) NOT NULL , ";
     $sql6 .= " `mbseriescpu_CreateBy` VARCHAR( 100 ) NOT NULL , ";
     $sql6 .= " `mbseriescpu_CreateTime` DATETIME NOT NULL , ";
     $sql6 .= " `mbseriescpu_UpdateBy` VARCHAR( 100 ) NULL , ";
     $sql6 .= " `mbseriescpu_UpdateTime` DATETIME NULL , ";
     $sql6 .= " `mbseriescpu_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
     $sql6 .= "  INDEX(mbseriescpu_ID, mbseriescpu_IDseries, mbseriescpu_IDDetailMB) ";
     $sql6 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

      $create_tb6 = mysql_query($sql6) or die(mysql_error());


      $sql7 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbltyperam` ( ";
      $sql7 .= " `typeram_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
      $sql7 .= " `typeram_Name` VARCHAR( 200 ) NOT NULL , ";
      $sql7 .= " `typeram_CreateBy` VARCHAR( 100 ) NOT NULL , ";
      $sql7 .= " `typeram_CreateTime` DATETIME NOT NULL , ";
      $sql7 .= " `typeram_UpdateBy` VARCHAR( 100 ) NULL , ";
      $sql7 .= " `typeram_UpdateTime` DATETIME NULL , ";
      $sql7 .= " `typeram_Type` TINYINT( 1 ) NOT NULL , "; // 1 = cpu , 2 = VGA
      $sql7 .= " `typeram_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
      $sql7 .= "  INDEX(typeram_ID, typeram_Name) ";
      $sql7 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

       $create_tb7 = mysql_query($sql7) or die(mysql_error());


       $sql8 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblbusram` ( ";
       $sql8 .= " `busram_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
       $sql8 .= " `busram_IDtyperam` INT NOT NULL , ";
       $sql8 .= " `busram_Name` VARCHAR( 200 ) NOT NULL , ";
       $sql8 .= " `busram_CreateBy` VARCHAR( 100 ) NOT NULL , ";
       $sql8 .= " `busram_CreateTime` DATETIME NOT NULL , ";
       $sql8 .= " `busram_UpdateBy` VARCHAR( 100 ) NULL , ";
       $sql8 .= " `busram_UpdateTime` DATETIME NULL , ";
       $sql8 .= " `busram_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
       $sql8 .= "  INDEX(busram_ID, busram_Name, busram_IDtyperam) ";
       $sql8 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

        $create_tb8 = mysql_query($sql8) or die(mysql_error());


        $sql9 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblmbbusram` ( ";
        $sql9 .= " `mbbusram_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
        $sql9 .= " `mbbusram_IDbusram` INT NOT NULL , ";
        $sql9 .= " `mbbusram_IDdetailmb` INT NOT NULL , ";
        $sql9 .= " `mbbusram_CreateBy` VARCHAR( 100 ) NOT NULL , ";
        $sql9 .= " `mbbusram_CreateTime` DATETIME NOT NULL , ";
        $sql9 .= " `mbbusram_UpdateBy` VARCHAR( 100 ) NULL , ";
        $sql9 .= " `mbbusram_UpdateTime` DATETIME NULL , ";
        $sql9 .= " `mbbusram_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
        $sql9 .= "  INDEX(mbbusram_ID, mbbusram_IDbusram, mbbusram_IDdetailmb) ";
        $sql9 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

         $create_tb9 = mysql_query($sql9) or die(mysql_error());


         $sql10 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbldetailmb` ( ";
         $sql10 .= " `detailmb_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
         $sql10 .= " `detailmb_IDsocket` INT NOT NULL , ";
         $sql10 .= " `detailmb_IDbrand` INT NOT NULL , ";
         $sql10 .= " `detailmb_Model` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Graphic` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Audio` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Sata` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_M2` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Slot` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Lanspeed` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Usb2` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Usb3` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_DVIport` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_HDMIport` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Audioport` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_Lanport` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_FromFactor` VARCHAR( 200 ) NOT NULL , ";
         $sql10 .= " `detailmb_warranty` VARCHAR( 10 ) NOT NULL , ";
         $sql10 .= " `detailmb_Price` INT NOT NULL , ";
         $sql10 .= " `detailmb_CreateBy` VARCHAR( 100 ) NOT NULL , ";
         $sql10 .= " `detailmb_CreateTime` DATETIME NOT NULL , ";
         $sql10 .= " `detailmb_UpdateBy` VARCHAR( 100 ) NULL , ";
         $sql10 .= " `detailmb_UpdateTime` DATETIME NULL , ";
         $sql10 .= " `detailmb_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
         $sql10 .= "  INDEX(detailmb_ID, detailmb_IDsocket, detailmb_IDbrand, detailmb_Model) ";
         $sql10 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

          $create_tb10 = mysql_query($sql10) or die(mysql_error());


          $sql11 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbldetailram` ( ";
          $sql11 .= " `detailram_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
          $sql11 .= " `detailram_IDbusram` INT NOT NULL , ";
          $sql11 .= " `detailram_IDbrand` INT NOT NULL , ";
          $sql11 .= " `detailram_Name` VARCHAR( 200 ) NOT NULL , ";
          $sql11 .= " `detailram_warranty` VARCHAR( 10 ) NOT NULL , ";
          $sql11 .= " `detailram_Price` INT NOT NULL , ";
          $sql11 .= " `detailram_CreateBy` VARCHAR( 100 ) NOT NULL , ";
          $sql11 .= " `detailram_CreateTime` DATETIME NOT NULL , ";
          $sql11 .= " `detailram_UpdateBy` VARCHAR( 100 ) NULL , ";
          $sql11 .= " `detailram_UpdateTime` DATETIME NULL , ";
          $sql11 .= " `detailram_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
          $sql11 .= "  INDEX(detailram_ID, detailram_IDbusram, detailram_IDbrand) ";
          $sql11 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

           $create_tb11 = mysql_query($sql11) or die(mysql_error());


           $sql12 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbldetailvga` ( ";
           $sql12 .= " `detailvga_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
           $sql12 .= " `detailvga_IDseries` INT NOT NULL , ";
           $sql12 .= " `detailvga_IDbrand` INT NOT NULL , ";
           $sql12 .= " `detailvga_Model` VARCHAR( 200 ) NOT NULL , ";
           $sql12 .= " `detailvga_GPUspeed` VARCHAR( 200 ) NOT NULL , ";
           $sql12 .= " `detailvga_Ramspeed` VARCHAR( 200 ) NOT NULL , ";
           $sql12 .= " `detailvga_Capacityram` VARCHAR( 200 ) NOT NULL , ";
           $sql12 .= " `detailvga_IDtyperam` INT NOT NULL , ";
           $sql12 .= " `detailvga_Bus` VARCHAR( 100 ) NOT NULL , ";
           $sql12 .= " `detailvga_DVIport` VARCHAR( 100 ) NOT NULL , ";
           $sql12 .= " `detailvga_HDMIport` VARCHAR( 100 ) NOT NULL , ";
           $sql12 .= " `detailvga_Displayport` VARCHAR( 100 ) NOT NULL , ";
           $sql12 .= " `detailvga_TDP` VARCHAR( 20 ) NOT NULL , ";
           $sql12 .= " `detailvga_warranty` VARCHAR( 10 ) NOT NULL , ";
           $sql12 .= " `detailvga_Price` INT NOT NULL , ";
           $sql12 .= " `detailvga_CreateBy` VARCHAR( 100 ) NOT NULL , ";
           $sql12 .= " `detailvga_CreateTime` DATETIME NOT NULL , ";
           $sql12 .= " `detailvga_UpdateBy` VARCHAR( 100 ) NULL , ";
           $sql12 .= " `detailvga_UpdateTime` DATETIME NULL , ";
           $sql12 .= " `detailvga_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
           $sql12 .= "  INDEX(detailvga_ID, detailvga_IDseries, detailvga_IDbrand, detailvga_Model, detailvga_IDtyperam) ";
           $sql12 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

            $create_tb12 = mysql_query($sql12) or die(mysql_error());


            $sql13 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblcapacityhdd` ( ";
            $sql13 .= " `capacityhdd_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
            $sql13 .= " `capacityhdd_Name` VARCHAR( 200 ) NOT NULL , ";
            $sql13 .= " `capacityhdd_CreateBy` VARCHAR( 100 ) NOT NULL , ";
            $sql13 .= " `capacityhdd_CreateTime` DATETIME NOT NULL , ";
            $sql13 .= " `capacityhdd_UpdateBy` VARCHAR( 100 ) NULL , ";
            $sql13 .= " `capacityhdd_UpdateTime` DATETIME NULL , ";
            $sql13 .= " `capacityhdd_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
            $sql13 .= "  INDEX(capacityhdd_ID, capacityhdd_Name) ";
            $sql13 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

             $create_tb13 = mysql_query($sql13) or die(mysql_error());


             $sql14 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbldetailhdd` ( ";
             $sql14 .= " `detailhdd_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
             $sql14 .= " `detailhdd_IDcapacity` INT NOT NULL , ";
             $sql14 .= " `detailhdd_IDtypehdd` INT NOT NULL , ";
             $sql14 .= " `detailhdd_IDbrand` INT NOT NULL , ";
             $sql14 .= " `detailhdd_Model` VARCHAR( 200 ) NOT NULL , ";
             $sql14 .= " `detailhdd_Interface` VARCHAR( 200 ) NOT NULL , ";
             $sql14 .= " `detailhdd_Price` INT NOT NULL , ";
             $sql14 .= " `detailhdd_warranty` VARCHAR( 10 ) NOT NULL , ";
             $sql14 .= " `detailhdd_CreateBy` VARCHAR( 100 ) NOT NULL , ";
             $sql14 .= " `detailhdd_CreateTime` DATETIME NOT NULL , ";
             $sql14 .= " `detailhdd_UpdateBy` VARCHAR( 100 ) NULL , ";
             $sql14 .= " `detailhdd_UpdateTime` DATETIME NULL , ";
             $sql14 .= " `detailhdd_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
             $sql14 .= "  INDEX(detailhdd_ID, detailhdd_IDcapacity, detailhdd_IDtypehdd, detailhdd_IDbrand, detailhdd_Model) ";
             $sql14 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

              $create_tb14 = mysql_query($sql14) or die(mysql_error());


              $sql15 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbltypehdd` ( ";
              $sql15 .= " `typehdd_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
              $sql15 .= " `typehdd_Name` VARCHAR( 200 ) NOT NULL , ";
              $sql15 .= " `typehdd_CreateBy` VARCHAR( 100 ) NOT NULL , ";
              $sql15 .= " `typehdd_CreateTime` DATETIME NOT NULL , ";
              $sql15 .= " `typehdd_UpdateBy` VARCHAR( 100 ) NULL , ";
              $sql15 .= " `typehdd_UpdateTime` DATETIME NULL , ";
              $sql15 .= " `typehdd_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
              $sql15 .= "  INDEX(typehdd_ID, typehdd_Name) ";
              $sql15 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

               $create_tb15 = mysql_query($sql15) or die(mysql_error());


               $sql16 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblwattpw` ( ";
               $sql16 .= " `wattpw_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
               $sql16 .= " `wattpw_Name` VARCHAR( 200 ) NOT NULL , ";
               $sql16 .= " `wattpw_CreateBy` VARCHAR( 100 ) NOT NULL , ";
               $sql16 .= " `wattpw_CreateTime` DATETIME NOT NULL , ";
               $sql16 .= " `wattpw_UpdateBy` VARCHAR( 100 ) NULL , ";
               $sql16 .= " `wattpw_UpdateTime` DATETIME NULL , ";
               $sql16 .= " `wattpw_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
               $sql16 .= "  INDEX(wattpw_ID, wattpw_Name) ";
               $sql16 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                $create_tb16 = mysql_query($sql16) or die(mysql_error());


                $sql17 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tbldetailpw` ( ";
                $sql17 .= " `detailpw_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                $sql17 .= " `detailpw_IDbrand` INT NOT NULL , ";
                $sql17 .= " `detailpw_IDwattpw` INT NOT NULL , ";
                $sql17 .= " `detailpw_Model` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_MBconnector` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_CPUconnector` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_PCIExconnector` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_SATAconnector` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_MOLEXconnector` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_Powerinput` VARCHAR( 200 ) NOT NULL , ";
                $sql17 .= " `detailpw_Price` INT NOT NULL , ";
                $sql17 .= " `detailpw_Warranty` VARCHAR( 10 ) NOT NULL , ";
                $sql17 .= " `detailpw_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                $sql17 .= " `detailpw_CreateTime` DATETIME NOT NULL , ";
                $sql17 .= " `detailpw_UpdateBy` VARCHAR( 100 ) NULL , ";
                $sql17 .= " `detailpw_UpdateTime` DATETIME NULL , ";
                $sql17 .= " `detailpw_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                $sql17 .= "  INDEX(detailpw_ID, detailpw_IDbrand, detailpw_IDwattpw, detailpw_Model) ";
                $sql17 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                 $create_tb17 = mysql_query($sql17) or die(mysql_error());


                 $sql18 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblimgcpu` ( ";
                 $sql18 .= " `imgcpu_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                 $sql18 .= " `imgcpu_IDdetailcpu` INT NOT NULL , ";
                 $sql18 .= " `imgcpu_Nameimg` VARCHAR( 200 ) NOT NULL , ";
                 $sql18 .= " `imgcpu_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                 $sql18 .= " `imgcpu_CreateTime` DATETIME NOT NULL , ";
                 $sql18 .= " `imgcpu_UpdateBy` VARCHAR( 100 ) NULL , ";
                 $sql18 .= " `imgcpu_UpdateTime` DATETIME NULL , ";
                 $sql18 .= " `imgcpu_Statusmain` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
                 $sql18 .= " `imgcpu_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                 $sql18 .= "  INDEX(imgcpu_ID, imgcpu_IDdetailcpu, imgcpu_Nameimg) ";
                 $sql18 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                  $create_tb18 = mysql_query($sql18) or die(mysql_error());


                  $sql19 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblimgmb` ( ";
                  $sql19 .= " `imgmb_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                  $sql19 .= " `imgmb_IDdetailmb` INT NOT NULL , ";
                  $sql19 .= " `imgmb_Nameimg` VARCHAR( 200 ) NOT NULL , ";
                  $sql19 .= " `imgmb_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                  $sql19 .= " `imgmb_CreateTime` DATETIME NOT NULL , ";
                  $sql19 .= " `imgmb_UpdateBy` VARCHAR( 100 ) NULL , ";
                  $sql19 .= " `imgmb_UpdateTime` DATETIME NULL , ";
                  $sql19 .= " `imgmb_Statusmain` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
                  $sql19 .= " `imgmb_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                  $sql19 .= "  INDEX(imgmb_ID, imgmb_IDdetailmb, imgmb_Nameimg) ";
                  $sql19 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                   $create_tb19 = mysql_query($sql19) or die(mysql_error());


                   $sql20 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblimgram` ( ";
                   $sql20 .= " `imgram_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                   $sql20 .= " `imgram_IDdetailram` INT NOT NULL , ";
                   $sql20 .= " `imgram_Nameimg` VARCHAR( 200 ) NOT NULL , ";
                   $sql20 .= " `imgram_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                   $sql20 .= " `imgram_CreateTime` DATETIME NOT NULL , ";
                   $sql20 .= " `imgram_UpdateBy` VARCHAR( 100 ) NULL , ";
                   $sql20 .= " `imgram_UpdateTime` DATETIME NULL , ";
                   $sql20 .= " `imgram_Statusmain` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
                   $sql20 .= " `imgram_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                   $sql20 .= "  INDEX(imgram_ID, imgram_IDdetailram, imgram_Nameimg) ";
                   $sql20 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                    $create_tb20 = mysql_query($sql20) or die(mysql_error());


                    $sql21 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblimgvga` ( ";
                    $sql21 .= " `imgvga_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                    $sql21 .= " `imgvga_IDdetailvga` INT NOT NULL , ";
                    $sql21 .= " `imgvga_Nameimg` VARCHAR( 200 ) NOT NULL , ";
                    $sql21 .= " `imgvga_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                    $sql21 .= " `imgvga_CreateTime` DATETIME NOT NULL , ";
                    $sql21 .= " `imgvga_UpdateBy` VARCHAR( 100 ) NULL , ";
                    $sql21 .= " `imgvga_UpdateTime` DATETIME NULL , ";
                    $sql21 .= " `imgvga_Statusmain` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
                    $sql21 .= " `imgvga_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                    $sql21 .= "  INDEX(imgvga_ID, imgvga_IDdetailvga, imgvga_Nameimg) ";
                    $sql21 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                     $create_tb21 = mysql_query($sql21) or die(mysql_error());


                     $sql22 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblimghdd` ( ";
                     $sql22 .= " `imghdd_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                     $sql22 .= " `imghdd_IDdetailhdd` INT NOT NULL , ";
                     $sql22 .= " `imghdd_Nameimg` VARCHAR( 200 ) NOT NULL , ";
                     $sql22 .= " `imghdd_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                     $sql22 .= " `imghdd_CreateTime` DATETIME NOT NULL , ";
                     $sql22 .= " `imghdd_UpdateBy` VARCHAR( 100 ) NULL , ";
                     $sql22 .= " `imghdd_UpdateTime` DATETIME NULL , ";
                     $sql22 .= " `imghdd_Statusmain` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
                     $sql22 .= " `imghdd_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                     $sql22 .= "  INDEX(imghdd_ID, imghdd_IDdetailhdd, imghdd_Nameimg) ";
                     $sql22 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                      $create_tb22 = mysql_query($sql22) or die(mysql_error());


                      $sql23 = " CREATE TABLE IF NOT EXISTS `computer_db`.`tblimgpw` ( ";
                      $sql23 .= " `imgpw_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , "; //id
                      $sql23 .= " `imgpw_IDdetailpw` INT NOT NULL , ";
                      $sql23 .= " `imgpw_Nameimg` VARCHAR( 200 ) NOT NULL , ";
                      $sql23 .= " `imgpw_CreateBy` VARCHAR( 100 ) NOT NULL , ";
                      $sql23 .= " `imgpw_CreateTime` DATETIME NOT NULL , ";
                      $sql23 .= " `imgpw_UpdateBy` VARCHAR( 100 ) NULL , ";
                      $sql23 .= " `imgpw_UpdateTime` DATETIME NULL , ";
                      $sql23 .= " `imgpw_Statusmain` TINYINT( 1 ) NOT NULL DEFAULT  '1' , ";
                      $sql23 .= " `imgpw_Status` TINYINT( 1 ) NOT NULL DEFAULT  '1' , "; // 1 = active , 0 = inactive
                      $sql23 .= "  INDEX(imgpw_ID, imgpw_IDdetailpw, imgpw_Nameimg) ";
                      $sql23 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci ";

                       $create_tb23 = mysql_query($sql23) or die(mysql_error());
?>
