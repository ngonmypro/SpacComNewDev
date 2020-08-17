-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `computer_db`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblbrand`
-- 

CREATE TABLE `tblbrand` (
  `brand_ID` int(11) NOT NULL auto_increment,
  `brand_Name` varchar(200) NOT NULL,
  `brand_CreateBy` varchar(100) NOT NULL,
  `brand_CreateTime` datetime NOT NULL,
  `brand_UpdateBy` varchar(100) default NULL,
  `brand_UpdateTime` datetime default NULL,
  `brand_Type` tinyint(1) NOT NULL,
  `brand_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`brand_ID`),
  KEY `brand_ID` (`brand_ID`,`brand_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- dump ตาราง `tblbrand`
-- 

INSERT INTO `tblbrand` VALUES (1, 'ASROCK', 'Adminstator', '2020-07-17 11:28:42', NULL, NULL, 1, 1);
INSERT INTO `tblbrand` VALUES (2, 'ASUS', 'Adminstator', '2020-07-17 11:28:51', NULL, NULL, 1, 1);
INSERT INTO `tblbrand` VALUES (3, 'GIGABYTE', 'Adminstator', '2020-07-17 11:28:59', NULL, NULL, 1, 1);
INSERT INTO `tblbrand` VALUES (4, 'MSI', 'Adminstator', '2020-07-17 11:29:08', NULL, NULL, 1, 1);
INSERT INTO `tblbrand` VALUES (5, 'CORSAIR', 'Adminstator', '2020-07-17 11:29:29', NULL, NULL, 2, 1);
INSERT INTO `tblbrand` VALUES (6, 'KINGSTON', 'Adminstator', '2020-07-17 11:29:41', NULL, NULL, 2, 1);
INSERT INTO `tblbrand` VALUES (7, 'Thermaltake', 'Adminstator', '2020-07-17 11:29:56', NULL, NULL, 2, 1);
INSERT INTO `tblbrand` VALUES (8, 'ASUS', 'Adminstator', '2020-07-17 11:30:12', NULL, NULL, 3, 1);
INSERT INTO `tblbrand` VALUES (9, 'GIGABYTE', 'Adminstator', '2020-07-17 11:30:52', NULL, NULL, 3, 1);
INSERT INTO `tblbrand` VALUES (10, 'MSI', 'Adminstator', '2020-07-17 11:31:06', NULL, NULL, 3, 1);
INSERT INTO `tblbrand` VALUES (11, 'GALAX', 'Adminstator', '2020-07-17 11:31:26', NULL, NULL, 3, 1);
INSERT INTO `tblbrand` VALUES (12, 'Zotac', 'Adminstator', '2020-07-17 11:31:40', NULL, NULL, 3, 1);
INSERT INTO `tblbrand` VALUES (13, 'SEAGATE', 'Adminstator', '2020-07-17 11:31:54', NULL, NULL, 4, 1);
INSERT INTO `tblbrand` VALUES (14, 'Toshiba', 'Adminstator', '2020-07-17 11:32:03', NULL, NULL, 4, 1);
INSERT INTO `tblbrand` VALUES (15, 'Western Digital', 'Adminstator', '2020-07-17 11:32:13', NULL, NULL, 4, 1);
INSERT INTO `tblbrand` VALUES (16, 'SAMSUNG', 'Adminstator', '2020-07-17 11:32:27', NULL, NULL, 4, 1);
INSERT INTO `tblbrand` VALUES (17, 'KINGSTON', 'Adminstator', '2020-07-17 11:32:39', NULL, NULL, 4, 1);
INSERT INTO `tblbrand` VALUES (18, 'THERMALTAKE', '', '2020-07-17 12:03:54', NULL, NULL, 5, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblbusram`
-- 

CREATE TABLE `tblbusram` (
  `busram_ID` int(11) NOT NULL auto_increment,
  `busram_IDtyperam` int(11) NOT NULL,
  `busram_Name` varchar(200) NOT NULL,
  `busram_CreateBy` varchar(100) NOT NULL,
  `busram_CreateTime` datetime NOT NULL,
  `busram_UpdateBy` varchar(100) default NULL,
  `busram_UpdateTime` datetime default NULL,
  `busram_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`busram_ID`),
  KEY `busram_ID` (`busram_ID`,`busram_Name`,`busram_IDtyperam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `tblbusram`
-- 

INSERT INTO `tblbusram` VALUES (1, 1, '2400', 'Adminstator', '2020-07-17 11:34:14', NULL, NULL, 1);
INSERT INTO `tblbusram` VALUES (2, 1, '2666', 'Adminstator', '2020-07-17 11:34:25', NULL, NULL, 1);
INSERT INTO `tblbusram` VALUES (3, 1, '3000', 'Adminstator', '2020-07-17 11:34:33', NULL, NULL, 1);
INSERT INTO `tblbusram` VALUES (4, 1, '3200', 'Adminstator', '2020-07-17 11:34:43', NULL, NULL, 1);
INSERT INTO `tblbusram` VALUES (5, 1, '3600', 'Adminstator', '2020-07-17 11:34:51', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblcapacityhdd`
-- 

CREATE TABLE `tblcapacityhdd` (
  `capacityhdd_ID` int(11) NOT NULL auto_increment,
  `capacityhdd_Name` varchar(200) NOT NULL,
  `capacityhdd_CreateBy` varchar(100) NOT NULL,
  `capacityhdd_CreateTime` datetime NOT NULL,
  `capacityhdd_UpdateBy` varchar(100) default NULL,
  `capacityhdd_UpdateTime` datetime default NULL,
  `capacityhdd_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`capacityhdd_ID`),
  KEY `capacityhdd_ID` (`capacityhdd_ID`,`capacityhdd_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `tblcapacityhdd`
-- 

INSERT INTO `tblcapacityhdd` VALUES (1, '128 gb', 'Adminstator', '2020-07-17 11:35:08', NULL, NULL, 1);
INSERT INTO `tblcapacityhdd` VALUES (2, '250 gb', 'Adminstator', '2020-07-17 11:35:20', NULL, NULL, 1);
INSERT INTO `tblcapacityhdd` VALUES (3, '500 gb', 'Adminstator', '2020-07-17 11:35:26', NULL, NULL, 1);
INSERT INTO `tblcapacityhdd` VALUES (4, '1 tb', 'Adminstator', '2020-07-17 11:35:35', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblchipset`
-- 

CREATE TABLE `tblchipset` (
  `chipset_ID` int(11) NOT NULL auto_increment,
  `chipset_Name` varchar(200) NOT NULL,
  `chipset_CreateBy` varchar(100) NOT NULL,
  `chipset_CreateTime` datetime NOT NULL,
  `chipset_UpdateBy` varchar(100) default NULL,
  `chipset_UpdateTime` datetime default NULL,
  `chipset_Type` tinyint(1) NOT NULL,
  `chipset_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`chipset_ID`),
  KEY `chipset_ID` (`chipset_ID`,`chipset_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `tblchipset`
-- 

INSERT INTO `tblchipset` VALUES (1, 'amd', 'Adminstator', '2020-07-17 11:20:25', NULL, NULL, 1, 1);
INSERT INTO `tblchipset` VALUES (2, 'intel', 'Adminstator', '2020-07-17 11:20:34', NULL, NULL, 1, 1);
INSERT INTO `tblchipset` VALUES (3, 'nvidia', 'Adminstator', '2020-07-17 11:20:45', NULL, NULL, 2, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbldetailcpu`
-- 

CREATE TABLE `tbldetailcpu` (
  `detailcpu_ID` int(11) NOT NULL auto_increment,
  `detailcpu_IDseries` int(11) NOT NULL,
  `detailcpu_IDsocket` int(11) NOT NULL,
  `detailcpu_Model` varchar(200) NOT NULL,
  `detailcpu_Core` varchar(10) default NULL,
  `detailcpu_Thread` varchar(10) default NULL,
  `detailcpu_Frequency` varchar(20) default NULL,
  `detailcpu_Turbo` varchar(20) default NULL,
  `detailcpu_CacheL2` varchar(20) default NULL,
  `detailcpu_CacheL3` varchar(20) default NULL,
  `detailcpu_TDP` varchar(20) default NULL,
  `detailcpu_Price` int(11) NOT NULL,
  `detailcpu_Warranty` varchar(10) default NULL,
  `detailcpu_CreateBy` varchar(100) NOT NULL,
  `detailcpu_CreateTime` datetime NOT NULL,
  `detailcpu_UpdateBy` varchar(100) default NULL,
  `detailcpu_UpdateTime` datetime default NULL,
  `detailcpu_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`detailcpu_ID`),
  KEY `detailcpu_ID` (`detailcpu_ID`,`detailcpu_IDseries`,`detailcpu_IDsocket`,`detailcpu_Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `tbldetailcpu`
-- 

INSERT INTO `tbldetailcpu` VALUES (1, 6, 1, 'AMD Ryzen 3 3100', '4', '8', '3.60', '3.90', '2', '16', '65w', 3790, '3', 'Adminstator', '2020-07-17 11:38:10', NULL, NULL, 1);
INSERT INTO `tbldetailcpu` VALUES (2, 10, 3, 'INTEL Core i3-10320', '4', '8', '3.80', '4.60', '1', '8', '65w', 5990, '3', 'Adminstator', '2020-07-17 11:42:43', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbldetailhdd`
-- 

CREATE TABLE `tbldetailhdd` (
  `detailhdd_ID` int(11) NOT NULL auto_increment,
  `detailhdd_IDcapacity` int(11) NOT NULL,
  `detailhdd_IDtypehdd` int(11) NOT NULL,
  `detailhdd_IDbrand` int(11) NOT NULL,
  `detailhdd_Model` varchar(200) NOT NULL,
  `detailhdd_Interface` varchar(200) NOT NULL,
  `detailhdd_Price` int(11) NOT NULL,
  `detailhdd_warranty` varchar(10) NOT NULL,
  `detailhdd_CreateBy` varchar(100) NOT NULL,
  `detailhdd_CreateTime` datetime NOT NULL,
  `detailhdd_UpdateBy` varchar(100) default NULL,
  `detailhdd_UpdateTime` datetime default NULL,
  `detailhdd_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`detailhdd_ID`),
  KEY `detailhdd_ID` (`detailhdd_ID`,`detailhdd_IDcapacity`,`detailhdd_IDtypehdd`,`detailhdd_IDbrand`,`detailhdd_Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tbldetailhdd`
-- 

INSERT INTO `tbldetailhdd` VALUES (1, 4, 1, 13, 'SEAGATE FIRECUDA 1TB', 'SATA III', 2790, '5', '', '2020-07-17 12:02:36', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbldetailmb`
-- 

CREATE TABLE `tbldetailmb` (
  `detailmb_ID` int(11) NOT NULL auto_increment,
  `detailmb_IDsocket` int(11) NOT NULL,
  `detailmb_IDbrand` int(11) NOT NULL,
  `detailmb_Model` varchar(200) NOT NULL,
  `detailmb_Graphic` varchar(200) NOT NULL,
  `detailmb_Audio` varchar(200) NOT NULL,
  `detailmb_Sata` varchar(200) NOT NULL,
  `detailmb_M2` varchar(200) NOT NULL,
  `detailmb_Slot` varchar(200) NOT NULL,
  `detailmb_Lanspeed` varchar(200) NOT NULL,
  `detailmb_Usb2` varchar(200) NOT NULL,
  `detailmb_Usb3` varchar(200) NOT NULL,
  `detailmb_DVIport` varchar(200) NOT NULL,
  `detailmb_HDMIport` varchar(200) NOT NULL,
  `detailmb_Audioport` varchar(200) NOT NULL,
  `detailmb_Lanport` varchar(200) NOT NULL,
  `detailmb_FromFactor` varchar(200) NOT NULL,
  `detailmb_warranty` varchar(10) NOT NULL,
  `detailmb_Price` int(11) NOT NULL,
  `detailmb_CreateBy` varchar(100) NOT NULL,
  `detailmb_CreateTime` datetime NOT NULL,
  `detailmb_UpdateBy` varchar(100) default NULL,
  `detailmb_UpdateTime` datetime default NULL,
  `detailmb_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`detailmb_ID`),
  KEY `detailmb_ID` (`detailmb_ID`,`detailmb_IDsocket`,`detailmb_IDbrand`,`detailmb_Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `tbldetailmb`
-- 

INSERT INTO `tbldetailmb` VALUES (1, 1, 4, 'MSI PRESTIGE X570 CREATION', 'None', 'Realtek ALC1220 Audio Codec', '6', '2', '4', '10/100/1000', '0', '6', '0', '0', '5', '1', 'E-ATX', '3', 15900, 'Adminstator', '2020-07-17 11:47:23', '', '2020-07-17 11:50:10', 1);
INSERT INTO `tbldetailmb` VALUES (2, 2, 3, 'GIGABYTE H370 AORUS Gaming 3 WIFI', 'Integrated Graphics Processor', 'Realtek ALC1220 Audio Codec', '6', '2', '4', '10/100/1000', '4', '0', '1', '1', '6', '1', 'ATX', '3', 4390, '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tbldetailmb` VALUES (3, 3, 3, 'GIGABYTE Z490 Aorus Master', 'Integrated Graphics Processor', 'Realtek ALC1220   DAC ESS ES9118 Sabre', '6', '3', '4', '10/100/1000', '4', '0', '0', '1', '5', '1', 'ATX', '3', 12500, '', '2020-07-17 11:56:38', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbldetailpw`
-- 

CREATE TABLE `tbldetailpw` (
  `detailpw_ID` int(11) NOT NULL auto_increment,
  `detailpw_IDbrand` int(11) NOT NULL,
  `detailpw_IDwattpw` int(11) NOT NULL,
  `detailpw_Model` varchar(200) NOT NULL,
  `detailpw_MBconnector` varchar(200) NOT NULL,
  `detailpw_CPUconnector` varchar(200) NOT NULL,
  `detailpw_PCIExconnector` varchar(200) NOT NULL,
  `detailpw_SATAconnector` varchar(200) NOT NULL,
  `detailpw_MOLEXconnector` varchar(200) NOT NULL,
  `detailpw_Powerinput` varchar(200) NOT NULL,
  `detailpw_Price` int(11) NOT NULL,
  `detailpw_Warranty` varchar(10) NOT NULL,
  `detailpw_CreateBy` varchar(100) NOT NULL,
  `detailpw_CreateTime` datetime NOT NULL,
  `detailpw_UpdateBy` varchar(100) default NULL,
  `detailpw_UpdateTime` datetime default NULL,
  `detailpw_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`detailpw_ID`),
  KEY `detailpw_ID` (`detailpw_ID`,`detailpw_IDbrand`,`detailpw_IDwattpw`,`detailpw_Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tbldetailpw`
-- 

INSERT INTO `tbldetailpw` VALUES (1, 18, 4, 'THERMALTAKE Smart Pro RGB 850W Bronze', '24', '4', '4 x 6 2', '9', '', '80 PLUS Brozne', 3990, '7', '', '2020-07-17 12:05:08', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbldetailram`
-- 

CREATE TABLE `tbldetailram` (
  `detailram_ID` int(11) NOT NULL auto_increment,
  `detailram_IDbusram` int(11) NOT NULL,
  `detailram_IDbrand` int(11) NOT NULL,
  `detailram_Name` varchar(200) NOT NULL,
  `detailram_warranty` varchar(10) NOT NULL,
  `detailram_Price` int(11) NOT NULL,
  `detailram_CreateBy` varchar(100) NOT NULL,
  `detailram_CreateTime` datetime NOT NULL,
  `detailram_UpdateBy` varchar(100) default NULL,
  `detailram_UpdateTime` datetime default NULL,
  `detailram_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`detailram_ID`),
  KEY `detailram_ID` (`detailram_ID`,`detailram_IDbusram`,`detailram_IDbrand`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tbldetailram`
-- 

INSERT INTO `tbldetailram` VALUES (1, 4, 6, 'KINGSTON Hyper-X Predator RGB DDR4 32GB (16GBx2) 3200', 'LT', 6090, '', '2020-07-17 12:01:14', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbldetailvga`
-- 

CREATE TABLE `tbldetailvga` (
  `detailvga_ID` int(11) NOT NULL auto_increment,
  `detailvga_IDseries` int(11) NOT NULL,
  `detailvga_IDbrand` int(11) NOT NULL,
  `detailvga_Model` varchar(200) NOT NULL,
  `detailvga_GPUspeed` varchar(200) NOT NULL,
  `detailvga_Ramspeed` varchar(200) NOT NULL,
  `detailvga_Capacityram` varchar(200) NOT NULL,
  `detailvga_IDtyperam` int(11) NOT NULL,
  `detailvga_Bus` varchar(100) NOT NULL,
  `detailvga_DVIport` varchar(100) NOT NULL,
  `detailvga_HDMIport` varchar(100) NOT NULL,
  `detailvga_Displayport` varchar(100) NOT NULL,
  `detailvga_TDP` varchar(20) NOT NULL,
  `detailvga_warranty` varchar(10) NOT NULL,
  `detailvga_Price` int(11) NOT NULL,
  `detailvga_CreateBy` varchar(100) NOT NULL,
  `detailvga_CreateTime` datetime NOT NULL,
  `detailvga_UpdateBy` varchar(100) default NULL,
  `detailvga_UpdateTime` datetime default NULL,
  `detailvga_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`detailvga_ID`),
  KEY `detailvga_ID` (`detailvga_ID`,`detailvga_IDseries`,`detailvga_IDbrand`,`detailvga_Model`,`detailvga_IDtyperam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tbldetailvga`
-- 

INSERT INTO `tbldetailvga` VALUES (1, 5, 9, 'GIGABYTE RTX 2080 SUPER GAMING OC', '1845', '15496', '8', 4, '256', '0', '1', '0', '650w', '3', 25500, '', '2020-07-17 11:59:50', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblimgcpu`
-- 

CREATE TABLE `tblimgcpu` (
  `imgcpu_ID` int(11) NOT NULL auto_increment,
  `imgcpu_IDdetailcpu` int(11) NOT NULL,
  `imgcpu_Nameimg` varchar(200) NOT NULL,
  `imgcpu_CreateBy` varchar(100) NOT NULL,
  `imgcpu_CreateTime` datetime NOT NULL,
  `imgcpu_UpdateBy` varchar(100) default NULL,
  `imgcpu_UpdateTime` datetime default NULL,
  `imgcpu_Statusmain` tinyint(1) NOT NULL default '1',
  `imgcpu_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`imgcpu_ID`),
  KEY `imgcpu_ID` (`imgcpu_ID`,`imgcpu_IDdetailcpu`,`imgcpu_Nameimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `tblimgcpu`
-- 

INSERT INTO `tblimgcpu` VALUES (1, 1, 'CPU-20200717-113932-1.png', 'Adminstator', '2020-07-17 11:39:32', NULL, NULL, 0, 1);
INSERT INTO `tblimgcpu` VALUES (2, 2, 'CPU-20200717-114307-2.png', 'Adminstator', '2020-07-17 11:43:07', NULL, NULL, 0, 1);
INSERT INTO `tblimgcpu` VALUES (3, 2, 'CPU-20200717-114342-2.png', 'Adminstator', '2020-07-17 11:43:42', NULL, NULL, 1, 1);
INSERT INTO `tblimgcpu` VALUES (4, 1, 'CPU-20200717-161756-1.png', 'Adminstator', '2020-07-17 16:17:56', NULL, NULL, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblimghdd`
-- 

CREATE TABLE `tblimghdd` (
  `imghdd_ID` int(11) NOT NULL auto_increment,
  `imghdd_IDdetailhdd` int(11) NOT NULL,
  `imghdd_Nameimg` varchar(200) NOT NULL,
  `imghdd_CreateBy` varchar(100) NOT NULL,
  `imghdd_CreateTime` datetime NOT NULL,
  `imghdd_UpdateBy` varchar(100) default NULL,
  `imghdd_UpdateTime` datetime default NULL,
  `imghdd_Statusmain` tinyint(1) NOT NULL default '1',
  `imghdd_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`imghdd_ID`),
  KEY `imghdd_ID` (`imghdd_ID`,`imghdd_IDdetailhdd`,`imghdd_Nameimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tblimghdd`
-- 

INSERT INTO `tblimghdd` VALUES (1, 1, 'HDD-20200717-120247-1.jpg', '', '2020-07-17 12:02:47', NULL, NULL, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblimgmb`
-- 

CREATE TABLE `tblimgmb` (
  `imgmb_ID` int(11) NOT NULL auto_increment,
  `imgmb_IDdetailmb` int(11) NOT NULL,
  `imgmb_Nameimg` varchar(200) NOT NULL,
  `imgmb_CreateBy` varchar(100) NOT NULL,
  `imgmb_CreateTime` datetime NOT NULL,
  `imgmb_UpdateBy` varchar(100) default NULL,
  `imgmb_UpdateTime` datetime default NULL,
  `imgmb_Statusmain` tinyint(1) NOT NULL default '1',
  `imgmb_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`imgmb_ID`),
  KEY `imgmb_ID` (`imgmb_ID`,`imgmb_IDdetailmb`,`imgmb_Nameimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `tblimgmb`
-- 

INSERT INTO `tblimgmb` VALUES (1, 1, 'MB-20200717-114736-1.png', 'Adminstator', '2020-07-17 11:47:36', NULL, NULL, 1, 1);
INSERT INTO `tblimgmb` VALUES (2, 2, 'MB-20200717-115336-2.png', '', '2020-07-17 11:53:36', NULL, NULL, 1, 1);
INSERT INTO `tblimgmb` VALUES (3, 3, 'MB-20200717-115715-3.png', '', '2020-07-17 11:57:15', NULL, NULL, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblimgpw`
-- 

CREATE TABLE `tblimgpw` (
  `imgpw_ID` int(11) NOT NULL auto_increment,
  `imgpw_IDdetailpw` int(11) NOT NULL,
  `imgpw_Nameimg` varchar(200) NOT NULL,
  `imgpw_CreateBy` varchar(100) NOT NULL,
  `imgpw_CreateTime` datetime NOT NULL,
  `imgpw_UpdateBy` varchar(100) default NULL,
  `imgpw_UpdateTime` datetime default NULL,
  `imgpw_Statusmain` tinyint(1) NOT NULL default '1',
  `imgpw_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`imgpw_ID`),
  KEY `imgpw_ID` (`imgpw_ID`,`imgpw_IDdetailpw`,`imgpw_Nameimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tblimgpw`
-- 

INSERT INTO `tblimgpw` VALUES (1, 1, 'PW-20200717-120517-1.png', '', '2020-07-17 12:05:17', NULL, NULL, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblimgram`
-- 

CREATE TABLE `tblimgram` (
  `imgram_ID` int(11) NOT NULL auto_increment,
  `imgram_IDdetailram` int(11) NOT NULL,
  `imgram_Nameimg` varchar(200) NOT NULL,
  `imgram_CreateBy` varchar(100) NOT NULL,
  `imgram_CreateTime` datetime NOT NULL,
  `imgram_UpdateBy` varchar(100) default NULL,
  `imgram_UpdateTime` datetime default NULL,
  `imgram_Statusmain` tinyint(1) NOT NULL default '1',
  `imgram_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`imgram_ID`),
  KEY `imgram_ID` (`imgram_ID`,`imgram_IDdetailram`,`imgram_Nameimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tblimgram`
-- 

INSERT INTO `tblimgram` VALUES (1, 1, 'RAM-20200717-120125-1.png', '', '2020-07-17 12:01:25', NULL, NULL, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblimgvga`
-- 

CREATE TABLE `tblimgvga` (
  `imgvga_ID` int(11) NOT NULL auto_increment,
  `imgvga_IDdetailvga` int(11) NOT NULL,
  `imgvga_Nameimg` varchar(200) NOT NULL,
  `imgvga_CreateBy` varchar(100) NOT NULL,
  `imgvga_CreateTime` datetime NOT NULL,
  `imgvga_UpdateBy` varchar(100) default NULL,
  `imgvga_UpdateTime` datetime default NULL,
  `imgvga_Statusmain` tinyint(1) NOT NULL default '1',
  `imgvga_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`imgvga_ID`),
  KEY `imgvga_ID` (`imgvga_ID`,`imgvga_IDdetailvga`,`imgvga_Nameimg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `tblimgvga`
-- 

INSERT INTO `tblimgvga` VALUES (1, 1, 'VGA-20200717-120005-1.png', '', '2020-07-17 12:00:05', NULL, NULL, 1, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblmbbusram`
-- 

CREATE TABLE `tblmbbusram` (
  `mbbusram_ID` int(11) NOT NULL auto_increment,
  `mbbusram_IDbusram` int(11) NOT NULL,
  `mbbusram_IDdetailmb` int(11) NOT NULL,
  `mbbusram_CreateBy` varchar(100) NOT NULL,
  `mbbusram_CreateTime` datetime NOT NULL,
  `mbbusram_UpdateBy` varchar(100) default NULL,
  `mbbusram_UpdateTime` datetime default NULL,
  `mbbusram_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`mbbusram_ID`),
  KEY `mbbusram_ID` (`mbbusram_ID`,`mbbusram_IDbusram`,`mbbusram_IDdetailmb`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- dump ตาราง `tblmbbusram`
-- 

INSERT INTO `tblmbbusram` VALUES (16, 1, 1, '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (17, 2, 1, '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (18, 3, 1, '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (19, 4, 1, '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (20, 5, 1, '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (21, 1, 2, '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (22, 2, 2, '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (23, 3, 2, '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (24, 4, 2, '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (25, 5, 2, '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (26, 1, 3, '', '2020-07-17 11:56:38', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (27, 2, 3, '', '2020-07-17 11:56:38', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (28, 3, 3, '', '2020-07-17 11:56:39', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (29, 4, 3, '', '2020-07-17 11:56:39', NULL, NULL, 1);
INSERT INTO `tblmbbusram` VALUES (30, 5, 3, '', '2020-07-17 11:56:39', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblmbseriescpu`
-- 

CREATE TABLE `tblmbseriescpu` (
  `mbseriescpu_ID` int(11) NOT NULL auto_increment,
  `mbseriescpu_IDseries` int(11) NOT NULL,
  `mbseriescpu_IDDetailMB` varchar(200) NOT NULL,
  `mbseriescpu_CreateBy` varchar(100) NOT NULL,
  `mbseriescpu_CreateTime` datetime NOT NULL,
  `mbseriescpu_UpdateBy` varchar(100) default NULL,
  `mbseriescpu_UpdateTime` datetime default NULL,
  `mbseriescpu_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`mbseriescpu_ID`),
  KEY `mbseriescpu_ID` (`mbseriescpu_ID`,`mbseriescpu_IDseries`,`mbseriescpu_IDDetailMB`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- dump ตาราง `tblmbseriescpu`
-- 

INSERT INTO `tblmbseriescpu` VALUES (13, 6, '1', '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (14, 7, '1', '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (15, 8, '1', '', '2020-07-17 11:50:10', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (16, 9, '1', '', '2020-07-17 11:50:11', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (17, 10, '2', '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (18, 11, '2', '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (19, 12, '2', '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (20, 13, '2', '', '2020-07-17 11:53:18', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (21, 10, '3', '', '2020-07-17 11:56:39', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (22, 11, '3', '', '2020-07-17 11:56:39', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (23, 12, '3', '', '2020-07-17 11:56:39', NULL, NULL, 1);
INSERT INTO `tblmbseriescpu` VALUES (24, 13, '3', '', '2020-07-17 11:56:39', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblseries`
-- 

CREATE TABLE `tblseries` (
  `series_ID` int(11) NOT NULL auto_increment,
  `series_IDchipset` int(11) NOT NULL,
  `series_Name` varchar(200) NOT NULL,
  `series_CreateBy` varchar(100) NOT NULL,
  `series_CreateTime` datetime NOT NULL,
  `series_UpdateBy` varchar(100) default NULL,
  `series_UpdateTime` datetime default NULL,
  `series_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`series_ID`),
  KEY `series_ID` (`series_ID`,`series_IDchipset`,`series_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- dump ตาราง `tblseries`
-- 

INSERT INTO `tblseries` VALUES (4, 3, 'gtx', 'Adminstator', '2020-07-17 11:21:54', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (5, 3, 'rtx', 'Adminstator', '2020-07-17 11:22:01', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (6, 1, 'ryzen 3', 'Adminstator', '2020-07-17 11:22:40', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (7, 1, 'ryzen 5', 'Adminstator', '2020-07-17 11:22:55', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (8, 1, 'ryzen 7', 'Adminstator', '2020-07-17 11:23:03', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (9, 1, 'ryzen 9', 'Adminstator', '2020-07-17 11:23:10', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (10, 2, 'core i3', 'Adminstator', '2020-07-17 11:23:22', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (11, 2, 'core i5', 'Adminstator', '2020-07-17 11:23:29', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (12, 2, 'core i7', 'Adminstator', '2020-07-17 11:23:39', NULL, NULL, 1);
INSERT INTO `tblseries` VALUES (13, 2, 'core i9', 'Adminstator', '2020-07-17 11:23:47', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblsocket`
-- 

CREATE TABLE `tblsocket` (
  `socket_ID` int(11) NOT NULL auto_increment,
  `socket_IDchipset` int(11) NOT NULL,
  `socket_Name` varchar(200) NOT NULL,
  `socket_CreateBy` varchar(100) NOT NULL,
  `socket_CreateTime` datetime NOT NULL,
  `socket_UpdateBy` varchar(100) default NULL,
  `socket_UpdateTime` datetime default NULL,
  `socket_Type` tinyint(1) NOT NULL,
  `socket_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`socket_ID`),
  KEY `socket_ID` (`socket_ID`,`socket_IDchipset`,`socket_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `tblsocket`
-- 

INSERT INTO `tblsocket` VALUES (1, 1, 'am4', 'Adminstator', '2020-07-17 11:26:34', NULL, NULL, 1, 1);
INSERT INTO `tblsocket` VALUES (2, 2, 'lga1151-v2', 'Adminstator', '2020-07-17 11:26:48', NULL, NULL, 1, 1);
INSERT INTO `tblsocket` VALUES (3, 2, 'lga1200', 'Adminstator', '2020-07-17 11:26:58', NULL, NULL, 1, 1);
INSERT INTO `tblsocket` VALUES (4, 2, 'lga 1151-v2', 'Adminstator', '2020-07-17 11:27:28', 'Adminstator', '2020-07-17 11:27:51', 2, 1);
INSERT INTO `tblsocket` VALUES (5, 2, 'lga 1200', 'Adminstator', '2020-07-17 11:27:44', NULL, NULL, 2, 1);
INSERT INTO `tblsocket` VALUES (6, 1, 'am 4', 'Adminstator', '2020-07-17 11:28:03', NULL, NULL, 2, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbltypehdd`
-- 

CREATE TABLE `tbltypehdd` (
  `typehdd_ID` int(11) NOT NULL auto_increment,
  `typehdd_Name` varchar(200) NOT NULL,
  `typehdd_CreateBy` varchar(100) NOT NULL,
  `typehdd_CreateTime` datetime NOT NULL,
  `typehdd_UpdateBy` varchar(100) default NULL,
  `typehdd_UpdateTime` datetime default NULL,
  `typehdd_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`typehdd_ID`),
  KEY `typehdd_ID` (`typehdd_ID`,`typehdd_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `tbltypehdd`
-- 

INSERT INTO `tbltypehdd` VALUES (1, 'sata III', 'Adminstator', '2020-07-17 11:35:50', NULL, NULL, 1);
INSERT INTO `tbltypehdd` VALUES (2, 'm.2', 'Adminstator', '2020-07-17 11:35:57', NULL, NULL, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tbltyperam`
-- 

CREATE TABLE `tbltyperam` (
  `typeram_ID` int(11) NOT NULL auto_increment,
  `typeram_Name` varchar(200) NOT NULL,
  `typeram_CreateBy` varchar(100) NOT NULL,
  `typeram_CreateTime` datetime NOT NULL,
  `typeram_UpdateBy` varchar(100) default NULL,
  `typeram_UpdateTime` datetime default NULL,
  `typeram_Type` tinyint(1) NOT NULL,
  `typeram_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`typeram_ID`),
  KEY `typeram_ID` (`typeram_ID`,`typeram_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `tbltyperam`
-- 

INSERT INTO `tbltyperam` VALUES (1, 'DDR4', 'Adminstator', '2020-07-17 11:32:54', NULL, NULL, 1, 1);
INSERT INTO `tbltyperam` VALUES (2, 'GDDR5', 'Adminstator', '2020-07-17 11:33:10', NULL, NULL, 2, 1);
INSERT INTO `tbltyperam` VALUES (3, 'GDDR5X', 'Adminstator', '2020-07-17 11:33:20', NULL, NULL, 2, 1);
INSERT INTO `tbltyperam` VALUES (4, 'GDDR6', 'Adminstator', '2020-07-17 11:33:39', NULL, NULL, 2, 1);
INSERT INTO `tbltyperam` VALUES (5, 'DDR5', 'Adminstator', '2020-07-17 11:33:47', NULL, NULL, 2, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `tblwattpw`
-- 

CREATE TABLE `tblwattpw` (
  `wattpw_ID` int(11) NOT NULL auto_increment,
  `wattpw_Name` varchar(200) NOT NULL,
  `wattpw_CreateBy` varchar(100) NOT NULL,
  `wattpw_CreateTime` datetime NOT NULL,
  `wattpw_UpdateBy` varchar(100) default NULL,
  `wattpw_UpdateTime` datetime default NULL,
  `wattpw_Status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`wattpw_ID`),
  KEY `wattpw_ID` (`wattpw_ID`,`wattpw_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `tblwattpw`
-- 

INSERT INTO `tblwattpw` VALUES (1, '550w', 'Adminstator', '2020-07-17 11:36:17', NULL, NULL, 1);
INSERT INTO `tblwattpw` VALUES (2, '650w', 'Adminstator', '2020-07-17 11:36:23', NULL, NULL, 1);
INSERT INTO `tblwattpw` VALUES (3, '750w', 'Adminstator', '2020-07-17 11:36:28', NULL, NULL, 1);
INSERT INTO `tblwattpw` VALUES (4, '850w', 'Adminstator', '2020-07-17 11:36:33', NULL, NULL, 1);
