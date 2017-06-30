-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2017 at 10:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: al_db
--

-- --------------------------------------------------------

--
-- Table structure for table activations
--

DROP TABLE IF EXISTS activations;
CREATE TABLE activations (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table activations
--

INSERT INTO activations (id, user_id, `code`, completed, completed_at, created_at, updated_at) VALUES
(1, 2, 'a2km0mvBaxeSUJubeFBxH5nbdABIf6YX', 1, '2017-06-26 14:54:09', '2017-06-26 14:50:02', '2017-06-26 14:54:09');

-- --------------------------------------------------------

--
-- Table structure for table adverts_listings
--

DROP TABLE IF EXISTS adverts_listings;
CREATE TABLE adverts_listings (
  `id` mediumint(7) UNSIGNED ZEROFILL NOT NULL,
  `listingID` mediumint(7) UNSIGNED ZEROFILL NOT NULL,
  `type` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table adverts_listings
--

INSERT INTO adverts_listings (id, listingID, `type`, start_date, end_date, date_added) VALUES
(0000001, 0000001, 'featured', '2017-03-16', '2099-12-31', '2017-06-13 20:28:10'),
(0000002, 0000002, 'featured', '2017-03-19', '2099-12-31', '2017-06-13 20:28:10'),
(0000003, 0000003, 'featured', '2017-03-20', '2099-12-31', '2017-06-13 20:28:10'),
(0000004, 0000004, 'featured', '2017-03-20', '2099-12-31', '2017-06-13 20:28:10'),
(0000005, 0000005, 'featured', '2017-03-20', '2099-12-31', '2017-06-13 20:28:10'),
(0000006, 0000006, 'featured', '2017-03-20', '2099-12-31', '2017-06-13 20:28:10'),
(0000007, 0000007, 'featured', '2017-03-20', '2099-12-31', '2017-06-13 20:28:10'),
(0000008, 0000008, 'featured', '2017-03-20', '2099-12-31', '2017-06-13 20:28:10'),
(0000009, 0000009, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000010, 0000010, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000011, 0000011, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000012, 0000012, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000013, 0000013, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000014, 0000014, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000015, 0000015, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000016, 0000016, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000017, 0000017, 'waters', '2017-03-29', '2099-12-31', '2017-06-13 20:28:10'),
(0000019, 0000001, 'newly-arrived', '2017-03-30', '2099-12-31', '2017-06-13 20:28:10'),
(0000020, 0000002, 'newly-arrived', '2017-03-30', '2099-12-31', '2017-06-13 20:28:10'),
(0000021, 0000003, 'monthly-special', '2017-03-30', '2099-12-31', '2017-06-13 20:28:10'),
(0000022, 0000004, 'monthly-special', '2017-03-30', '2099-12-31', '2017-06-13 20:28:10'),
(0000023, 0000005, 'monthly-special', '2017-03-30', '2099-12-31', '2017-06-13 20:28:10'),
(0000024, 0000006, 'monthly-special', '2017-03-30', '2099-12-31', '2017-06-13 20:28:10'),
(0000025, 0000019, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000026, 0000023, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000027, 0000024, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000028, 0000025, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000029, 0000026, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000030, 0000027, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000031, 0000028, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000032, 0000031, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000033, 0000033, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000034, 0000034, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000035, 0000039, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000036, 0000040, 'featured', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000037, 0000031, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000038, 0000033, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000039, 0000034, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000040, 0000039, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000041, 0000040, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000042, 0000041, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000043, 0000042, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000044, 0000043, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000045, 0000044, 'newly-arrived', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000046, 0000019, 'waters', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000047, 0000024, 'waters', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000048, 0000025, 'waters', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000049, 0000026, 'waters', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10'),
(0000050, 0000039, 'waters', '2017-05-01', '2099-12-31', '2017-06-13 20:28:10');

-- --------------------------------------------------------

--
-- Table structure for table ad_photos
--

DROP TABLE IF EXISTS ad_photos;
CREATE TABLE ad_photos (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `listingID` mediumint(7) UNSIGNED ZEROFILL NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` varchar(75) NOT NULL,
  `display_order` tinyint(1) NOT NULL DEFAULT '1',
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table ad_photos
--

INSERT INTO ad_photos (id, listingID, url, alt, display_order, time_added) VALUES
(00001, 0000001, 'img/ads/1_1.jpg', 'Eppendorf DASGIP Bioblock Reactors', 1, '2017-03-17 20:11:48'),
(00002, 0000002, 'img/ads/2_1.jpg', 'Sartorius Stedim ambr 15 Cell Culture Automated Micro Bioreactor for sale b', 1, '2017-03-20 21:38:58'),
(00003, 0000003, 'img/ads/3_1.png', 'Tecan M200 Plate Reader for sale by ALE.', 1, '2017-03-21 18:13:01'),
(00004, 0000004, 'img/ads/4_1.png', 'Biotek Synergy 2 for sale by ALE', 1, '2017-03-21 18:28:57'),
(00005, 0000005, 'img/ads/5_1.png', 'Tecan HydroFlex Strip Washer for sale by ALE', 1, '2017-03-21 18:55:08'),
(00006, 0000006, 'img/ads/6_1.png', 'Biotek ELx405 Plate Washer for sale by ALE', 1, '2017-03-21 18:55:08'),
(00007, 0000007, 'img/ads/7_1.jpg', 'Hamilton STAR for sale by ALE', 1, '2017-03-21 19:45:38'),
(00008, 0000008, 'img/ads/8_1.jpg', 'Hamilton STARlet for sale by ALE', 1, '2017-03-21 19:45:38'),
(00009, 0000009, 'img/ads/9_1--waters-acquity-uplc-system.jpg', 'Waters Acquity UPLC System', 1, '2017-03-30 18:22:13'),
(00010, 0000010, 'img/ads/10_1--waters-acquity-uplc-h-class.jpg', 'Waters Acquity UPLC H Class', 1, '2017-03-30 18:22:13'),
(00011, 0000011, 'img/ads/11_1--waters-acquity-uplc-i-class.jpg', 'Waters Acquity UPLC I Class', 1, '2017-03-30 18:22:13'),
(00012, 0000013, 'img/ads/13_1--waters-refractive-index-detector-ri.jpg', 'Waters Refractive Index (RI) Detector', 1, '2017-03-30 18:22:13'),
(00013, 0000014, 'img/ads/14_1--waters-evaporative-light-scattering-detector-els.jpg', 'Waters Evaporative Light Scattering Detector (ELS)', 1, '2017-03-30 18:22:13'),
(00014, 0000015, 'img/ads/15_1--waters-2465-electrochemical-detector.jpg', 'Waters 2465 Electrochemical Detector', 1, '2017-03-30 18:22:13'),
(00015, 0000016, 'img/ads/16_1--waters-2475-fluorescence-detector-flr.jpg', 'Waters 2475 Fluorescence (FLR) Detector', 1, '2017-03-30 18:22:13'),
(00016, 0000017, 'img/ads/17_1--waters-2489-uv-visible-detector.jpg', 'Waters 2489 UV/Visible (UV/VIS) Detector', 1, '2017-03-30 18:22:13'),
(00017, 0000019, 'img/ads/19_1--abi-3730xl.jpg', 'ABI 3730xl DNA Sequencer for sale by ALE', 1, '2017-04-28 15:42:55'),
(00018, 0000023, 'img/ads/23_1--biotek-elx405.png', 'BIOTEK ELx405 Plate Washer for sale by ALE', 1, '2017-04-28 15:42:55'),
(00019, 0000024, 'img/ads/24_1--illumina-hiseq-2500.jpg', 'Illumina HiSeq 2500 DNA Sequencer for sale by ALE', 1, '2017-04-28 15:42:55'),
(00020, 0000025, 'img/ads/25_1--illumina-miSeq.jpg', 'Illumina MiSeq DNA Sequencer for sale by ALE', 1, '2017-04-28 15:42:55'),
(00021, 0000026, 'img/ads/26_1--illumina-nextseq.jpg', 'Illumina NextSeq DNA Sequencer for sale by ALE', 1, '2017-04-28 15:42:55'),
(00022, 0000027, 'img/ads/27_1--labcyte-echo-550.jpg', 'LABCYTE Echo 550 Liquid Handler for sale by ALE', 1, '2017-04-28 15:42:55'),
(00023, 0000028, 'img/ads/28_1--labcyte-echo-555.jpg', 'LABCYTE Echo 555 Liquid Handler for sale by ALE', 1, '2017-04-28 15:42:55'),
(00024, 0000033, 'img/ads/33_1--agilent-vspin.jpg', 'AGILENT Velocity11 Vspin auotmated centrifuge for sale by ALE', 1, '2017-04-28 15:42:55'),
(00025, 0000034, 'img/ads/34_1--agilent-velocity11-bravo.jpg', 'AGILENT Velocity11 Bravo liquid handler for sale by ALE', 1, '2017-04-28 15:42:55'),
(00026, 0000043, 'img/ads/29_1--tecan-evo-200.jpg', 'Tecan Freedom EVO 200 for sale by ALE', 1, '2017-04-28 16:58:05'),
(00027, 0000044, 'img/ads/30_1--tecan-evo-150.jpg', 'Tecan Freedom EVO 150 for sale by ALE', 1, '2017-04-28 16:58:05'),
(00028, 0000031, 'img/ads/31_1--tecan-m200.png', 'Tecan M200 Plate Reader for sale by ALE', 1, '2017-04-28 16:58:05'),
(00029, 0000042, 'img/ads/32_1--tecan-hydroflex.png', 'Tecan HydroFlex Plate Washer for sale by ALE', 1, '2017-04-28 16:58:05'),
(00030, 0000039, 'img/ads/35_1--abi-3500xl.jpg', 'ABI 3500xl DNA Sequencer for sale by ALE', 1, '2017-04-28 16:58:05'),
(00031, 0000040, 'img/ads/36_1--beckman-coulter-nxp.jpg', 'Beckman Coulter NXP liquid handler for sale by ALE', 1, '2017-04-28 16:58:05'),
(00032, 0000041, 'img/ads/37_1--beckman-fxp.jpg', 'Beckman Coulter FXP liquid handler for sale by ALE', 1, '2017-04-28 16:58:05'),
(00033, 0000045, 'img/ads/45_1--hamilton-star.jpg', 'Hamilton MicroLab Star Liquid Handler for sale by ALE', 1, '2017-05-04 18:28:55'),
(00034, 0000046, 'img/ads/46_1--andrew-alliance-pipetting-robot.jpg', 'Andrew Pipetting Robot for sale by ALE', 1, '2017-05-04 18:28:55'),
(00035, 0000047, 'img/ads/47_1--brooks-automation-xpeel.jpg', 'Brooks Automation XPeel for sale by ALE', 1, '2017-05-04 18:28:55'),
(00036, 0000048, 'img/ads/48_1--velocity11-benchcel-4r.jpg', 'Agilent Velocity11 BenchCel 4R for sale by ALE', 1, '2017-05-04 18:28:55'),
(00037, 0000049, 'img/ads/49_1--ab-sciex-tripletof-5600-system.jpg', 'AB SCIEX TripleTOF 5600+ System for sale by ALE', 1, '2017-05-10 14:19:54'),
(00038, 0000050, 'img/ads/50_1--ab-sciex-4000-qtrap.jpg', 'AB SCIEX 4000 QTRAP for sale by ALE', 1, '2017-05-10 14:19:54'),
(00039, 0000051, 'img/ads/51_1--edc-biosystems-ats-acoustic-dispenser.jpg', 'EDC Biosystems ATS Acoustic Dispenser for sale by ALE', 1, '2017-05-10 14:19:54'),
(00040, 0000052, 'img/ads/52_1--waters-sq-detector-2.jpg', 'WATERS SQ Detector 2 for sale by ALE', 1, '2017-05-10 14:19:54'),
(00041, 0000053, 'img/ads/53_1--waters-lct-premier.jpg', 'WATERS LCT Premier Mass Spectometer for sale by ALE', 1, '2017-05-10 14:19:54'),
(00042, 0000054, 'img/ads/54_1--waters-lct-premier-xe.jpg', 'WATERS LCT Premier XE Mass Spectrometer for sale by ALE', 1, '2017-05-10 14:19:54'),
(00043, 0000055, 'img/ads/55_1--hamilton-star-workstation.jpg', 'HAMILTON MicroLab STAR Liquid Handling Workstation for sale by ALE', 1, '2017-05-10 14:19:54'),
(00044, 0000056, 'img/ads/56_1--ab-sciex-api-4000.jpg', 'AB SCIEX API 4000 LC-MS/MS System for sale by ALE', 1, '2017-05-12 20:25:41'),
(00045, 0000057, 'img/ads/57_1--bruker-ultraflextreme.jpg', 'BRUKER ultrafleXtreme System for sale by ALE', 1, '2017-05-12 20:25:41'),
(00046, 0000058, 'img/ads/58_1--waters-xevo-qtof-ms.jpg', 'Waters Xevo QTOF MS System for sale by ALE', 1, '2017-05-12 20:25:41'),
(00047, 0000059, 'img/ads/59_1--waters-acquity-uplc.jpg', 'Water Acquity UPLC Systems for sale by ALE', 1, '2017-05-12 20:25:41'),
(00048, 0000060, 'img/ads/60_1--agilent-1200-series-hplc.jpg', 'Agilent 1200 Series HPLC Systems for sale by ALE', 1, '2017-05-12 20:25:41'),
(00049, 0000061, 'img/ads/61_1--shimadzu-prominence-hplc.jpg', 'Shimadzu Prominence HPLC Systems for sale by ALE', 1, '2017-05-12 20:25:41');

-- --------------------------------------------------------

--
-- Table structure for table ale_category
--

DROP TABLE IF EXISTS ale_category;
CREATE TABLE ale_category (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ale_category` varchar(30) DEFAULT NULL,
  `ale_subcategory` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table ale_category
--

INSERT INTO ale_category (id, ale_category, ale_subcategory) VALUES
(00001, 'Automation & Robotics', 'Liquid Handlers'),
(00002, 'Automation & Robotics', 'Other'),
(00003, 'Analytical Instruments', 'HPLC Systems & Parts'),
(00004, 'Analytical Instruments', 'Gas Chromatography'),
(00005, 'Analytical Instruments', 'Mass Spectrometers'),
(00006, 'Analytical Instruments', 'Spectrophotometers'),
(00007, 'Automation & Robotics', 'Microplate Stackers'),
(00008, 'Automation & Robotics', 'Microplate Readers'),
(00009, 'Automation & Robotics', 'Microplate Washers'),
(00010, 'Automation & Robotics', 'Microplate Sealers'),
(00011, 'Analytical Instruments', 'Other'),
(00012, 'Centrifuges', 'Benchtop Centrifuges'),
(00013, 'Centrifuges', 'Micro Centrifuges'),
(00014, 'Centrifuges', 'Rotors & Parts'),
(00015, 'Centrifuges', 'Floor Centrifuge'),
(00016, 'Centrifuges', 'Other'),
(00017, 'Cooling Devices', 'Freezers / Refrigerators'),
(00018, 'Cooling Devices', 'Other'),
(00019, 'Cooling Devices', 'Cryogenics'),
(00020, 'Cooling Devices', 'Recirculating Chillers'),
(00022, 'Heating Devices', 'Laboratory Ovens'),
(00023, 'Heating Devices', 'Water Baths'),
(00024, 'Heating Devices', 'Dry Baths'),
(00025, 'Heating Devices', 'Recirculating Heaters'),
(00026, 'Heating Devices', 'Hotplates'),
(00027, 'Heating Devices', 'Other'),
(00028, 'Heating Devices', 'Incubators'),
(00029, 'Imaging', 'Transilluminators'),
(00030, 'Imaging', 'Gel Imagers'),
(00031, 'Imaging', 'Other'),
(00032, 'Microscopes', 'Microscopes'),
(00033, 'Microscopes', 'Light Sources'),
(00034, 'Microscopes', 'Parts'),
(00035, 'Microscopes', 'Other'),
(00036, 'Mixers & Stirrers', 'Stirrers'),
(00037, 'Mixers & Stirrers', 'Hotplate Stirrers'),
(00038, 'Mixers & Stirrers', 'Mixers'),
(00039, 'Mixers & Stirrers', 'Shakers'),
(00040, 'Mixers & Stirrers', 'Vortexers'),
(00041, 'Mixers & Stirrers', 'Other'),
(00043, 'PCR DNA Thermal Cyclers', 'Thermal Cyclers'),
(00044, 'PCR DNA Thermal Cyclers', 'Parts / Heating Blocks'),
(00045, 'PCR DNA Thermal Cyclers', 'Other'),
(00046, 'Electrophoresis', 'Power Supplies'),
(00047, 'Electrophoresis', 'Cells / Chambers'),
(00048, 'Electrophoresis', 'Other'),
(00049, 'Pumps', 'Vacuum Pumps'),
(00050, 'Pumps', 'Peristaltic Pumps'),
(00051, 'Pumps', 'Multistaltic Pumps'),
(00052, 'Pumps', 'Gradient Pumps'),
(00053, 'Pumps', 'Quaternary Pumps'),
(00054, 'Pumps', 'Other'),
(00055, 'Scales & Balances', 'Digital Scales'),
(00056, 'Scales & Balances', 'Balance Scales'),
(00057, 'Scales & Balances', 'Other'),
(00058, 'Other Lab Equipment', 'Service Fixtures & Regulators'),
(00059, 'Other Lab Equipment', 'Recorders & Plotters'),
(00060, 'Other Lab Equipment', 'Other'),
(00061, 'Lab Supplies', 'Disposables'),
(00062, 'Lab Supplies', 'Filtration'),
(00063, 'Lab Supplies', 'Frames, Supports & Clamps'),
(00064, 'Lab Supplies', 'Pipettes'),
(00065, 'Lab Supplies', 'Plasticware'),
(00066, 'Lab Supplies', 'Other'),
(00067, 'DNA Sequencers', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table asset_labels
--

DROP TABLE IF EXISTS asset_labels;
CREATE TABLE asset_labels (
  `label_num` mediumint(5) UNSIGNED NOT NULL,
  `asset_type` varchar(5) NOT NULL,
  `purpose` varchar(75) DEFAULT NULL,
  `serial_num` varchar(60) DEFAULT NULL,
  `yom` year(4) DEFAULT NULL,
  `notes` varchar(120) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `assigned_by` varchar(10) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table asset_labels
--

INSERT INTO asset_labels (label_num, asset_type, purpose, serial_num, yom, notes, `value`, assigned_by, date_added) VALUES
(23376, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23377, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23378, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23379, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23380, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23381, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23382, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23383, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23384, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23385, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23386, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23387, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23388, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23389, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23390, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23391, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23392, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23393, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23394, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23395, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23396, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23397, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23398, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23399, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23400, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23401, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23402, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23403, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23404, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23405, 'ale', 'ALE Stickers', '', NULL, 'Orig. Date: 11/1/16', '', 'JBB', '2017-01-03'),
(23406, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23407, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23408, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23409, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23410, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23411, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23412, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23413, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23414, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23415, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23416, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23417, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23418, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23419, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23420, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23421, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23422, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23423, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23424, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23425, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23426, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23427, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23428, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23429, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23430, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23431, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23432, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23433, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23434, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23435, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23436, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23437, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23438, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23439, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23440, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23441, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23442, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23443, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23444, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23445, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23446, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23447, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23448, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23449, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23450, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23451, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23452, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23453, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23454, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23455, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23456, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23457, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23458, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23459, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23460, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23461, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23462, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23463, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23464, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23465, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23466, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23467, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23468, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23469, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23470, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23471, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23472, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23473, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23474, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23475, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23476, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23477, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23478, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23479, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23480, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23481, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23482, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23483, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23484, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23485, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23486, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23487, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23488, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23489, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23490, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23491, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23492, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23493, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23494, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23495, 'AN', 'AN Stickers', '', NULL, 'Orig. Date: 11/21/16', '', 'JBB', '2017-01-03'),
(23496, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23497, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23498, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23499, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23500, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23501, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23502, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23503, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23504, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23505, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23506, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23507, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23508, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23509, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23510, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23511, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23512, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23513, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23514, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23515, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23516, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23517, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23518, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23519, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23520, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23521, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23522, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23523, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23524, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23525, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23526, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23527, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23528, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23529, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23530, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23531, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23532, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23533, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23534, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23535, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23536, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23537, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23538, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23539, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23540, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23541, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23542, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23543, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23544, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23545, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23546, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23547, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23548, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23549, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23550, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23551, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23552, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23553, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23554, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23555, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23556, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23557, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23558, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23559, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23560, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23561, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23562, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23563, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23564, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23565, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23566, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23567, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23568, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23569, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23570, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23571, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23572, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23573, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23574, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23575, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23576, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23577, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23578, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23579, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23580, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23581, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23582, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23583, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23584, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23585, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23586, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23587, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23588, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23589, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23590, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23591, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23592, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23593, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23594, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23595, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23596, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23597, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23598, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23599, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23600, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23601, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23602, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23603, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23604, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23605, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23606, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23607, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23608, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23609, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23610, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23611, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23612, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23613, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23614, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23615, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23616, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23617, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23618, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23619, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23620, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23621, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23622, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23623, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23624, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23625, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23626, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23627, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23628, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23629, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23630, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23631, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23632, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23633, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23634, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23635, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23636, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23637, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23638, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23639, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23640, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23641, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23642, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23643, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23644, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23645, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23646, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23647, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23648, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23649, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23650, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23651, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23652, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23653, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23654, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23655, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23656, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23657, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23658, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23659, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23660, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23661, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23662, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23663, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23664, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23665, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23666, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23667, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23668, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23669, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23670, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23671, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23672, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23673, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23674, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23675, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23676, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23677, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23678, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23679, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23680, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23681, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23682, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23683, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23684, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23685, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23686, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23687, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23688, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23689, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23690, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23691, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23692, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23693, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23694, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23695, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23696, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23697, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23698, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23699, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23700, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23701, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23702, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23703, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23704, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23705, 'A', 'ALOE Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23706, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23707, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23708, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23709, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23710, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23711, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23712, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23713, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23714, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23715, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23716, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23717, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23718, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23719, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23720, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23721, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23722, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23723, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23724, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23725, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23726, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23727, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23728, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23729, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23730, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23731, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23732, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23733, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23734, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23735, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23736, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23737, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23738, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23739, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23740, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23741, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23742, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23743, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23744, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23745, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23746, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23747, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23748, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23749, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23750, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23751, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23752, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23753, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23754, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23755, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23756, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23757, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23758, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23759, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23760, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23761, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23762, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23763, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23764, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23765, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23766, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23767, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23768, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23769, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23770, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23771, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23772, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23773, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23774, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23775, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23776, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23777, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23778, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23779, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23780, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23781, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23782, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23783, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23784, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23785, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23786, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23787, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23788, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23789, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23790, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23791, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23792, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23793, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23794, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23795, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23796, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23797, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23798, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23799, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23800, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23801, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23802, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23803, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23804, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23805, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23806, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23807, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23808, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23809, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23810, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23811, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23812, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23813, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23814, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23815, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23816, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23817, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23818, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23819, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23820, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23821, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23822, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23823, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23824, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23825, 'N', 'Novartis Stickers', '', NULL, 'Orig. Date: 11/22/16', '', 'JBB', '2017-01-03'),
(23851, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23852, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23853, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23854, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23855, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23856, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23857, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23858, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23859, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23860, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23861, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23862, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23863, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23864, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23865, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23866, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23867, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23868, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23869, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23870, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23871, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23872, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23873, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23874, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23875, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23876, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23877, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23878, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23879, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(23880, 'A', 'GSK Inventory', '', NULL, 'Per Caleb''s request', '', 'JBB', '2017-01-03'),
(25000, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25001, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25002, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25003, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25004, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25005, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25006, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25007, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25008, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25009, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25010, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25011, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25012, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25013, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25014, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25015, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25016, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25017, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25018, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25019, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25020, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25021, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25022, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25023, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25024, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25025, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25026, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25027, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25028, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25029, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25030, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25031, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25032, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25033, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25034, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25035, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25036, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25037, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25038, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25039, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25040, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25041, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25042, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25043, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25044, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24');
INSERT INTO asset_labels (label_num, asset_type, purpose, serial_num, yom, notes, `value`, assigned_by, date_added) VALUES
(25045, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25046, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25047, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25048, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25049, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25050, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25051, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25052, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25053, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25054, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25055, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25056, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25057, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25058, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25059, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25060, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25061, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25062, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25063, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25064, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25065, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25066, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25067, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25068, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25069, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25070, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25071, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25072, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25073, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25074, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25075, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25076, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25077, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25078, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25079, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25080, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25081, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25082, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25083, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25084, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25085, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25086, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25087, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25088, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25089, 'A', 'ALOE/GSK', '', NULL, 'To reduce the possibility of future asset number overlaps I started a new range beginning at 25000', '', 'JBB', '2017-01-24'),
(25090, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25091, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25092, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25093, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25094, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25095, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25096, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25097, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25098, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25099, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25100, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25101, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25102, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25103, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25104, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25105, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25106, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25107, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25108, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25109, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25110, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25111, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25112, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25113, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25114, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25115, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25116, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25117, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25118, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25119, 'A', 'ALOE Stickers', '', NULL, 'Per Clark''s Request', '', 'JBB', '2017-02-17'),
(25120, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25121, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25122, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25123, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25124, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25125, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25126, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25127, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25128, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25129, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25130, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25131, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25132, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25133, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25134, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25135, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25136, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25137, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25138, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25139, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25140, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25141, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25142, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25143, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25144, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25145, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25146, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25147, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25148, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25149, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25150, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25151, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25152, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25153, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25154, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25155, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25156, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25157, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25158, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25159, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25160, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25161, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25162, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25163, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25164, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25165, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25166, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25167, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25168, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25169, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25170, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25171, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25172, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25173, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25174, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25175, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25176, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25177, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25178, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25179, 'N', 'Novartis Item Tags, Per Caleb&#039;s Request', '', NULL, '', '', 'JBB', '2017-03-08'),
(25180, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25181, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25182, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25183, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25184, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25185, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25186, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25187, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25188, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25189, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25190, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25191, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25192, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25193, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25194, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25195, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25196, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25197, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25198, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25199, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25200, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25201, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25202, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25203, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25204, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25205, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25206, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25207, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25208, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25209, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25210, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25211, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25212, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25213, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25214, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25215, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25216, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25217, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25218, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25219, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25220, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25221, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25222, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25223, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25224, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25225, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25226, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25227, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25228, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25229, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25230, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25231, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25232, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25233, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25234, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25235, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25236, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25237, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25238, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25239, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25240, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25241, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25242, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25243, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25244, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25245, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25246, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25247, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25248, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25249, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25250, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25251, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25252, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25253, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25254, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25255, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25256, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25257, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25258, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25259, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25260, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25261, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25262, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25263, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25264, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25265, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25266, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25267, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25268, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25269, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-03-23'),
(25270, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25271, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25272, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25273, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25274, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25275, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25276, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25277, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25278, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25279, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25280, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25281, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25282, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25283, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25284, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25285, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25286, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25287, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25288, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25289, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25290, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25291, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25292, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25293, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25294, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25295, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25296, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25297, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25298, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25299, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25300, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25301, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25302, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25303, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25304, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25305, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25306, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25307, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25308, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25309, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25310, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25311, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25312, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25313, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25314, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25315, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25316, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25317, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25318, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25319, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25320, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25321, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25322, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25323, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25324, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25325, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25326, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25327, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25328, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25329, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25330, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25331, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25332, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25333, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25334, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25335, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25336, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25337, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25338, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25339, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25340, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25341, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25342, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25343, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25344, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25345, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25346, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25347, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25348, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25349, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25350, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25351, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25352, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25353, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25354, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25355, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25356, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25357, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25358, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25359, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25360, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25361, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25362, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25363, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25364, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25365, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25366, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25367, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25368, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25369, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25370, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25371, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25372, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25373, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25374, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25375, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25376, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25377, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25378, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25379, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25380, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25381, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25382, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25383, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25384, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25385, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25386, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25387, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25388, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25389, 'A', 'ALOE Stickers', '', NULL, 'Caleb', '', 'JBB', '2017-04-10'),
(25390, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25391, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25392, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25393, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25394, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25395, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25396, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25397, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25398, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25399, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25400, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25401, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25402, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25403, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25404, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25405, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25406, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25407, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25408, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25409, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25410, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25411, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25412, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25413, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25414, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25415, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25416, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25417, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25418, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25419, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25420, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25421, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25422, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25423, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25424, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25425, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25426, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25427, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25428, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25429, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25430, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25431, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25432, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25433, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25434, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25435, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25436, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25437, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25438, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25439, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25440, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25441, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25442, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25443, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25444, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25445, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25446, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25447, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25448, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25449, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25450, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25451, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25452, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25453, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25454, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25455, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25456, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25457, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25458, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25459, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25460, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25461, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25462, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25463, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25464, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25465, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25466, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25467, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25468, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25469, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25470, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25471, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25472, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25473, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25474, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25475, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25476, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25477, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25478, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25479, 'N', 'Novartis Stickers', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-04-24'),
(25480, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25481, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25482, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25483, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25484, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25485, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25486, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25487, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25488, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25489, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25490, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25491, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25492, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25493, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25494, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25495, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25496, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25497, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25498, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25499, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25500, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25501, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25502, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25503, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25504, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25505, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25506, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25507, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25508, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25509, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25510, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25511, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25512, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25513, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25514, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25515, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25516, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25517, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25518, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25519, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25520, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25521, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25522, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25523, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25524, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25525, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25526, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25527, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25528, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25529, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25530, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25531, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25532, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25533, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25534, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25535, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25536, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25537, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25538, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25539, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25540, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25541, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25542, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25543, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25544, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25545, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25546, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25547, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25548, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25549, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25550, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25551, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25552, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25553, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25554, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25555, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25556, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25557, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25558, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25559, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25560, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25561, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25562, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25563, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25564, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25565, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25566, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25567, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25568, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25569, 'N', 'Caleb', '', NULL, '', '', 'JBB', '2017-05-16'),
(25570, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25571, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25572, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25573, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25574, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25575, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25576, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25577, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25578, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25579, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25580, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25581, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25582, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25583, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25584, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25585, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25586, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25587, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25588, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25589, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25590, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25591, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25592, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25593, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25594, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25595, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25596, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25597, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25598, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25599, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25600, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25601, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25602, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25603, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25604, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25605, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25606, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31');
INSERT INTO asset_labels (label_num, asset_type, purpose, serial_num, yom, notes, `value`, assigned_by, date_added) VALUES
(25607, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25608, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25609, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25610, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25611, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25612, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25613, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25614, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25615, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25616, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25617, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25618, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25619, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25620, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25621, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25622, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25623, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25624, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25625, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25626, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25627, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25628, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25629, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25630, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25631, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25632, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25633, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25634, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25635, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25636, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25637, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25638, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25639, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25640, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25641, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25642, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25643, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25644, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25645, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25646, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25647, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25648, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25649, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25650, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25651, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25652, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25653, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25654, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25655, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25656, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25657, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25658, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31'),
(25659, 'N', 'Novartis Items', '', NULL, 'Per Caleb''s Request', '', 'JBB', '2017-05-31');

-- --------------------------------------------------------

--
-- Table structure for table asset_type
--

DROP TABLE IF EXISTS asset_type;
CREATE TABLE asset_type (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `type` varchar(20) NOT NULL,
  `suffix` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table asset_type
--

INSERT INTO asset_type (id, `type`, suffix) VALUES
(01, 'ALE', ''),
(02, 'Novartis', 'N'),
(03, 'Novartis/ALOE', 'AN'),
(04, 'ALOE', 'A'),
(05, 'Consignment', 'C');

-- --------------------------------------------------------

--
-- Table structure for table brands
--

DROP TABLE IF EXISTS brands;
CREATE TABLE brands (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `brand` varchar(50) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table brands
--

INSERT INTO brands (id, brand, time_added, reviewed, active) VALUES
(00001, 'Velocity11', '2017-04-28 13:45:23', 1, 1),
(00003, 'Isotemp', '2017-06-22 14:46:11', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table cosmetic_status
--

DROP TABLE IF EXISTS cosmetic_status;
CREATE TABLE cosmetic_status (
  `id` tinyint(1) UNSIGNED ZEROFILL NOT NULL,
  `cosmetic` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table cosmetic_status
--

INSERT INTO cosmetic_status (id, cosmetic) VALUES
(1, 'Used'),
(2, 'Like-New'),
(3, 'Refurbished'),
(4, 'New'),
(5, 'Original Packaging');

-- --------------------------------------------------------

--
-- Table structure for table default_fields
--

DROP TABLE IF EXISTS default_fields;
CREATE TABLE default_fields (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `list` varchar(45) NOT NULL,
  `field_name` varchar(80) NOT NULL,
  `field_order` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table default_fields
--

INSERT INTO default_fields (id, `list`, field_name, field_order) VALUES
(00001, 'items', 'itemlist.aleAsset', 4),
(00002, 'items', 'itemlist.quantity', 10),
(00003, 'items', 'itemlist.title_extn', 9),
(00004, 'items', 'itemlist.ale_qb', 12),
(00005, 'items', 'itemlist.nov_qb', 13),
(00006, 'items', 'itemlist.ebay', 0),
(00007, 'items', 'itemlist.date_added', 15),
(00008, 'items', 'users.first_name', 16),
(00009, 'items', 'manufacturers.mnfr', 5),
(00010, 'items', 'models.model', 7),
(00011, 'items', 'brands.brand', 6),
(00012, 'items', 'models.function_desc', 8),
(00013, 'items', 'item_track.suffix', 3),
(00014, 'items', 'inv_batch.batch_name', 11),
(00015, 'items', 'vendors.vendor', 14),
(00016, 'items', 'item_track.track', 10),
(00017, 'listings', 'general_listings.id', 3),
(00018, 'listings', 'manufacturers.mnfr', 4),
(00019, 'listings', 'brands.brand', 5),
(00020, 'listings', 'models.model', 6),
(00021, 'listings', 'models.function_desc', 7),
(00022, 'listings', 'general_listings.title_extn', 8),
(00023, 'listings', 'general_listings.date_added', 10),
(00024, 'listings', 'general_listings.last_update', 9),
(00025, 'mnfr', 'manufacturers.id', 3),
(00026, 'mnfr', 'manufacturers.mnfr', 4),
(00027, 'mnfr', 'subitem_of.subitem_of', 5),
(00028, 'mnfr', 'manufacturers.time_added', 8),
(00029, 'models', 'models.id', 3),
(00030, 'models', 'models.model', 4),
(00031, 'models', 'models.function_desc', 5),
(00032, 'models', 'models.time_added', 8),
(00033, 'brands', 'brands.id', 3),
(00034, 'brands', 'brands.brand', 4),
(00035, 'brands', 'brands.time_added', 7),
(00036, 'subitem_of', 'subitem_of.id', 3),
(00037, 'subitem_of', 'subitem_of.subitem_of', 4),
(00038, 'subitem_of', 'subitem_of.time_added', 8),
(00039, 'vendors', 'vendors.id', 3),
(00040, 'vendors', 'vendors.vendor', 4),
(00041, 'vendors', 'vendors.date_added', 8),
(00042, 'batches', 'inv_batch.id', 3),
(00043, 'batches', 'inv_batch.batch_name', 4),
(00044, 'batches', 'inv_batch.description', 5),
(00045, 'batches', 'inv_batch.date_added', 8),
(00046, 'batches', 'inv_batch.added_by', 9),
(00047, 'gl_ads', 'adverts_listings.id', 3),
(00048, 'gl_ads', 'manufacturers.mnfr', 4),
(00049, 'gl_ads', 'brands.brand', 5),
(00050, 'gl_ads', 'models.model', 6),
(00051, 'gl_ads', 'models.function_desc', 7),
(00052, 'gl_ads', 'general_listings.title_extn', 8),
(00053, 'gl_ads', 'adverts_listings.type', 9),
(00054, 'gl_ads', 'adverts_listings.start_date', 10),
(00055, 'gl_ads', 'adverts_listings.end_date', 11),
(00056, 'gl_ads', 'adverts_listings.date_added', 12),
(00057, 'labels', 'asset_labels.label_num', 3),
(00058, 'labels', 'asset_labels.asset_type', 4),
(00059, 'labels', 'asset_labels.purpose', 5),
(00060, 'labels', 'asset_labels.serial_num', 6),
(00061, 'labels', 'asset_labels.yom', 7),
(00062, 'labels', 'asset_labels.notes', 8),
(00063, 'labels', 'asset_labels.value', 9),
(00064, 'labels', 'asset_labels.assigned_by', 10),
(00065, 'labels', 'asset_labels.date_added', 11),
(00066, 'items', 'users.last_name', 17);

-- --------------------------------------------------------

--
-- Table structure for table emp
--

DROP TABLE IF EXISTS emp;
CREATE TABLE emp (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `aleAsset` smallint(5) NOT NULL,
  `nibr` varchar(8) DEFAULT NULL,
  `tm0` varchar(15) DEFAULT NULL,
  `sap` varchar(15) DEFAULT NULL,
  `status` tinyint(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `category` tinyint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `nbv` smallint(7) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `prev_owner` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT '0005',
  `src_building` varchar(50) DEFAULT NULL,
  `src_floor` varchar(50) DEFAULT NULL,
  `src_room` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table emp
--

INSERT INTO emp (id, aleAsset, nibr, tm0, sap, `status`, category, nbv, img_url, prev_owner, src_building, src_floor, src_room) VALUES
(00001, 23831, NULL, '0020107393', NULL, 01, 078, NULL, NULL, 0005, '250MA', '1', '1'),
(00002, 23830, NULL, NULL, NULL, 01, 078, 0, NULL, 0005, '181MA', '4', '4'),
(00003, 23832, '10006580', NULL, '1002236', 02, 068, 0, NULL, 0005, '181MA', '0', '212'),
(00209, 10003, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', NULL, NULL),
(00210, 10004, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00211, 10005, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00212, 10006, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00213, 10007, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', NULL, NULL),
(00214, 10008, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00215, 10009, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00216, 10010, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00217, 10011, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', ''),
(00218, 10012, '10003130', '2003202', '1012010', 02, NULL, NULL, NULL, 0005, '3D', '', '');

-- --------------------------------------------------------

--
-- Table structure for table emp_category
--

DROP TABLE IF EXISTS emp_category;
CREATE TABLE emp_category (
  `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `category` varchar(30) NOT NULL,
  `subcategory` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table emp_category
--

INSERT INTO emp_category (id, category, subcategory) VALUES
(001, 'Genetic/Protein System', 'Array Detector'),
(002, 'Genetic/Protein System', 'Array Scanner'),
(003, 'Genetic/Protein System', 'Bioanalyzer'),
(004, 'Genetic/Protein System', 'Bioreactor'),
(005, 'Genetic/Protein System', 'Centrifuge'),
(006, 'Genetic/Protein System', 'Calorimetry System'),
(007, 'Genetic/Protein System', 'DNA Analyzer'),
(008, 'Genetic/Protein System', 'DNA Purification System'),
(009, 'Genetic/Protein System', 'Electroporation / Nucleofector Equipment'),
(010, 'Genetic/Protein System', 'Gel Imaging (DNA/Protein)'),
(011, 'Genetic/Protein System', 'Genetic Analyzer'),
(012, 'Genetic/Protein System', 'Next Gen Sequencers'),
(013, 'Genetic/Protein System', 'Other'),
(014, 'Genetic/Protein System', 'PCR System'),
(015, 'Genetic/Protein System', 'PCR System - Real Time'),
(016, 'Genetic/Protein System', 'Peptide Synthesizer'),
(017, 'Genetic/Protein System', 'Protein Array System'),
(018, 'Genetic/Protein System', 'Protein Crystallization'),
(019, 'Genetic/Protein System', 'Protein Digestor'),
(020, 'Genetic/Protein System', 'Protein Ligand Binding'),
(021, 'Genetic/Protein System', 'Protein Purification'),
(022, 'Genetic/Protein System', 'Purification System'),
(023, 'Genetic/Protein System', 'Sample Module'),
(024, 'Genetic/Protein System', 'Sample Prep Automation'),
(025, 'Genetic/Protein System', 'Sequencer - DNA'),
(026, 'Genetic/Protein System', 'Sequencer - Flow Cell'),
(027, 'Genetic/Protein System', 'Sequencer - Pyro'),
(028, 'Genetic/Protein System', 'Thermal Cycler'),
(029, 'Chromatography', 'Analytical HPLC'),
(030, 'Chromatography', 'Autosampler'),
(031, 'Chromatography', 'Capillary LC'),
(032, 'Chromatography', 'Differential Refractometer'),
(033, 'Chromatography', 'Fast Protein Liquid Chromatography (FPLC)'),
(034, 'Chromatography', 'Filtration'),
(035, 'Chromatography', 'Flash Chromatography'),
(036, 'Chromatography', 'Fraction Collector'),
(037, 'Chromatography', 'Gas chromatography'),
(038, 'Chromatography', 'Injector'),
(039, 'Chromatography', 'Ion Chromatography'),
(040, 'Chromatography', 'Medium Pressure Liquid Chromatography (MPLC)'),
(041, 'Chromatography', 'Microfluidizer Processor'),
(042, 'Chromatography', 'Nanodispenser'),
(043, 'Chromatography', 'Nanoscale HPLC'),
(044, 'Chromatography', 'Other'),
(045, 'Chromatography', 'Preparative HPLC'),
(046, 'Chromatography', 'Protein Purification System'),
(047, 'Chromatography', 'Pump'),
(048, 'Chromatography', 'Solid Phase Extraction System (SPE)'),
(049, 'Chromatography', 'Solvent Delivery System'),
(050, 'Chromatography', 'Supercritical Fluid Chromatography (SFL)'),
(051, 'Chromatography', 'Ultra-High Pressure Liquid Chromatography (UPLC)'),
(052, 'Cell Based Products', 'Automated Cell Culture'),
(053, 'Cell Based Products', 'Blood Cell Counter'),
(054, 'Cell Based Products', 'Cell Analyzer'),
(055, 'Cell Based Products', 'Cell Based Assay System'),
(056, 'Cell Based Products', 'Cell Harvester'),
(057, 'Cell Based Products', 'Cell Sorter'),
(058, 'Cell Based Products', 'Colony Picking and Arraying'),
(059, 'Cell Based Products', 'Fermenter'),
(060, 'Cell Based Products', 'Flow Cytometer System'),
(061, 'Cell Based Products', 'Incubator / Shaker'),
(062, 'Cell Based Products', 'Live Cell Chamber Module'),
(063, 'Cell Based Products', 'Multiplex Analysis'),
(064, 'Cell Based Products', 'Other'),
(065, 'Cell Based Products', 'Patch Clamp System'),
(066, 'Cooling Devices', 'Deep Freezer (-20 C to -40 C)'),
(067, 'Cooling Devices', 'Freezer / Refrigerator (+4 C/-20 C)'),
(068, 'Cooling Devices', 'Liquid Nitrogen Tank'),
(069, 'Cooling Devices', 'Other'),
(070, 'Cooling Devices', 'Refrigerator (+4 C)'),
(071, 'Cooling Devices', 'Ultra Deep Freezer (-80 C)'),
(072, 'Apparatus', 'Autoclave'),
(073, 'Apparatus', 'Liquid Evaporator'),
(074, 'Apparatus', 'Liquid Scintillation Analyzer'),
(075, 'Apparatus', 'Manipulator'),
(076, 'Apparatus', 'Measurer'),
(077, 'Apparatus', 'Mixer'),
(078, 'Apparatus', 'Other'),
(079, 'Apparatus', 'Oven'),
(080, 'Apparatus', 'Pipetting System / Pipettes'),
(081, 'Apparatus', 'Plate Handler'),
(082, 'Apparatus', 'Plate Labeler'),
(083, 'Apparatus', 'Plate Processor'),
(084, 'Apparatus', 'Plate Reader'),
(085, 'Apparatus', 'Plate Sealer'),
(086, 'Apparatus', 'Plate Stacker'),
(087, 'Apparatus', 'Pumps'),
(088, 'Apparatus', 'Robotic Arm'),
(089, 'Apparatus', 'Safety Cabinet'),
(090, 'Apparatus', 'Sonicator'),
(091, 'Apparatus', 'Spot Ventilation'),
(092, 'Apparatus', 'Sterilizer'),
(093, 'Apparatus', 'Vacuum'),
(094, 'Apparatus', 'Ventilating Device'),
(095, 'Apparatus', 'Washing Equipment'),
(096, 'Apparatus', 'Autoradiography Film'),
(097, 'Apparatus', 'Processor'),
(098, 'Apparatus', 'Balance'),
(099, 'Apparatus', 'Bar Coding'),
(100, 'Apparatus', 'Capper / Decapper'),
(101, 'Apparatus', 'Chiller'),
(102, 'Apparatus', 'Gas Generator'),
(103, 'Apparatus', 'Gas Tank'),
(104, 'Apparatus', 'Heating Device'),
(105, 'Apparatus', 'Homogenizer'),
(106, 'Apparatus', 'Laminar'),
(107, 'Automation', 'Automated Sample Storage'),
(108, 'Automation', 'Automation Platform'),
(109, 'Automation', 'Robotic Arm'),
(110, 'Automation', 'Robotic Workstation'),
(111, 'Automation', 'Scheduling Software'),
(112, 'Imaging', 'Bright-Field'),
(113, 'Imaging', 'Camera'),
(114, 'Imaging', 'Computerized Tomography (CT)'),
(115, 'Imaging', 'Confocal Microscopy'),
(116, 'Imaging', 'Diffuse Optical Tomography (DOT)'),
(117, 'Imaging', 'Electron Microscopy'),
(118, 'Imaging', 'Fluorescent Microscopy'),
(119, 'Imaging', 'High-Content Imaging'),
(120, 'Imaging', 'In-Vivo'),
(121, 'Imaging', 'Laser'),
(122, 'Imaging', 'Live Cell Imaging'),
(123, 'Imaging', 'Magnetic Resonance Imaging (MRI)'),
(124, 'Imaging', 'Microinjection'),
(125, 'Imaging', 'Microscope (simple compound)'),
(126, 'Imaging', 'Microscope (simple inverted)'),
(127, 'Imaging', 'Optical Coherence Tomography (OCT)'),
(128, 'Imaging', 'Other'),
(129, 'Imaging', 'Positron Emission Tomography (PET)'),
(130, 'Imaging', 'Single Photon Emission Computed Tomography (SPECT)'),
(131, 'Imaging', 'Ultrasound Imaging'),
(132, 'Imaging', 'Whole-body Imaging'),
(133, 'Optical Spectrophotometer', 'Circular Dichroism (UV/Vis)'),
(134, 'Optical Spectrophotometer', 'Fluorescence'),
(135, 'Optical Spectrophotometer', 'IR and Microscope'),
(136, 'Optical Spectrophotometer', 'Light / Particle Scattering Detector'),
(137, 'Optical Spectrophotometer', 'Luminescence'),
(138, 'Optical Spectrophotometer', 'Multilabel Counter'),
(139, 'Optical Spectrophotometer', 'Multilabel Plate Reader'),
(140, 'Optical Spectrophotometer', 'Other'),
(141, 'Optical Spectrophotometer', 'Radioactive'),
(142, 'Optical Spectrophotometer', 'RAMAN'),
(143, 'Optical Spectrophotometer', 'UV Spectrometer'),
(144, 'Optical Spectrophotometer', 'Vibrational Circular Dichroism (VCD)'),
(145, 'Chemistry', 'Other'),
(146, 'Chemistry', 'Reactor (Microwave, H- Cube)'),
(147, 'Liquid Handling System', 'Channel Pipettor'),
(148, 'Liquid Handling System', 'Dispenser - Acoustic'),
(149, 'Liquid Handling System', 'Dispenser - Aspirate'),
(150, 'Liquid Handling System', 'Dispenser - Bulk Liquid'),
(151, 'Liquid Handling System', 'Dispensing Head'),
(152, 'Liquid Handling System', 'HTS Platform'),
(153, 'Liquid Handling System', 'Liquid Handling System'),
(154, 'Liquid Handling System', 'Other'),
(155, 'Liquid Handling System', 'Pin Based Liquid Handling System'),
(156, 'Liquid Handling System', 'Plate Washer'),
(157, 'Liquid Handling System', 'Storage / Retrieval System'),
(158, 'Liquid Handling System', 'Tip Washer'),
(159, 'Not Equipment', 'Exposure System'),
(160, 'Not Equipment', 'Furnishing'),
(161, 'Not Equipment', 'GC/MS'),
(162, 'Not Equipment', 'Infrastructure Related'),
(163, 'Not Equipment', 'Lab Bench'),
(164, 'Not Equipment', 'Other'),
(165, 'Not Equipment', 'Storage Related'),
(166, 'Xray Equipment', 'Irradiator'),
(167, 'Xray Equipment', 'Microsource (Cu/CCD)'),
(168, 'Xray Equipment', 'Other'),
(169, 'Xray Equipment', 'Power Diffraction (XRPD)'),
(170, 'Xray Equipment', 'Rotating Anode (Cu/CCD)'),
(171, 'Xray Equipment', 'Single Crystal Diffraction (SCD)'),
(172, 'Histology', 'Cassette Labeler'),
(173, 'Histology', 'Coverslipper'),
(174, 'Histology', 'Cryo Console'),
(175, 'Histology', 'Cryostat'),
(176, 'Histology', 'Digital Slide Scanner'),
(177, 'Histology', 'Embedding Center'),
(178, 'Histology', 'Immunostaining System'),
(179, 'Histology', 'Laser Caputure Microdissection'),
(180, 'Histology', 'Microtome'),
(181, 'Histology', 'Other'),
(182, 'Histology', 'Slide Labeler'),
(183, 'Histology', 'Slide Staining System'),
(184, 'Histology', 'Vibratome');

-- --------------------------------------------------------

--
-- Table structure for table emp_prev_owners
--

DROP TABLE IF EXISTS emp_prev_owners;
CREATE TABLE emp_prev_owners (
  `id` smallint(4) UNSIGNED ZEROFILL NOT NULL,
  `prev_owner` varchar(50) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `reviewed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table emp_prev_owners
--

INSERT INTO emp_prev_owners (id, prev_owner, active, reviewed, date_added) VALUES
(0001, 'Shawn Salesky', 1, 1, '2017-05-24 15:53:15'),
(0002, 'Nathaniel Kirkpatric', 1, 1, '2017-05-24 15:53:15'),
(0003, 'Daniel Wall', 1, 1, '2017-05-24 15:53:15'),
(0004, 'Hetal Katakia', 1, 1, '2017-05-24 15:53:15'),
(0005, 'N/A', 1, 1, '2017-05-24 15:53:15');

-- --------------------------------------------------------

--
-- Table structure for table emp_status
--

DROP TABLE IF EXISTS emp_status;
CREATE TABLE emp_status (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `status` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table emp_status
--

INSERT INTO emp_status (id, `status`, description) VALUES
(01, 'Available for Purchase', 'Item may be purchased by ALE from Novartis; ALE may sell this item.'),
(02, 'Ready for Upload', 'Item is ready to be listed on EMP.'),
(03, 'Requires Testing for EMP', 'Item is ready to be listed on EMP, but will need to be tested if reserved.'),
(04, 'Not an EMP Item', 'Item is not for EMP.');

-- --------------------------------------------------------

--
-- Table structure for table field_map
--

DROP TABLE IF EXISTS field_map;
CREATE TABLE field_map (
  `id` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `field_name` varchar(150) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table field_map
--

INSERT INTO field_map (id, field_name, label, time_added) VALUES
(001, 'itemlist.aleAsset', 'Asset', '2017-05-15 14:50:08'),
(002, 'itemlist.addtl_model', 'Addtl. Model', '2017-05-15 14:50:08'),
(003, 'itemlist.serial_num', 'Serial Num.', '2017-05-15 14:50:08'),
(004, 'itemlist.price', 'Price', '2017-05-15 14:50:08'),
(005, 'itemlist.mpn', 'MPN', '2017-05-15 14:50:08'),
(006, 'itemlist.wh_location', 'Location', '2017-05-15 14:50:08'),
(007, 'itemlist.quantity', 'Quant.', '2017-05-15 14:50:08'),
(008, 'itemlist.yom', 'YOM', '2017-05-15 14:50:08'),
(009, 'itemlist.condition_note', 'Condition Note', '2017-05-15 14:50:08'),
(010, 'itemlist.weight', 'Weight', '2017-05-15 14:50:08'),
(011, 'itemlist.ale_qb', 'ALE QB', '2017-05-15 14:50:08'),
(012, 'itemlist.nov_qb', 'Nov. QB', '2017-05-15 14:50:08'),
(013, 'itemlist.ebay', 'eBay', '2017-05-15 14:50:08'),
(014, 'itemlist.active', 'Active', '2017-05-15 14:50:08'),
(015, 'itemlist.complete', 'Complete', '2017-05-15 14:50:08'),
(016, 'itemlist.date_received', 'Received', '2017-05-15 14:50:08'),
(017, 'itemlist.date_added', 'Date Added', '2017-05-15 14:50:08'),
(018, 'itemlist.last_update', 'Last Update', '2017-05-15 14:50:08'),
(019, 'manufacturers.mnfr', 'Manufacturer', '2017-05-15 14:50:08'),
(020, 'subitem_of.subitem_of', 'Subitem Of', '2017-05-15 14:50:08'),
(021, 'models.model', 'Model', '2017-05-15 14:50:08'),
(022, 'models.function_desc', 'Function', '2017-05-15 14:50:08'),
(023, 'brands.brand', 'Brand', '2017-05-15 14:50:08'),
(024, 'manufacturers.time_added', 'Date Added', '2017-05-15 14:50:08'),
(025, 'manufacturers.reviewed', 'Reviewed', '2017-05-15 14:50:08'),
(026, 'models.time_added', 'Date Added', '2017-05-15 14:50:08'),
(027, 'models.reviewed', 'Reviewed', '2017-05-15 14:50:08'),
(028, 'models.active', 'Active', '2017-05-15 14:50:08'),
(029, 'manufacturers.active', 'Active', '2017-05-15 14:50:08'),
(030, 'brands.time_added', 'Date Added', '2017-05-15 14:50:08'),
(031, 'brands.reviewed', 'Reviewed', '2017-05-15 14:50:08'),
(032, 'brands.active', 'Active', '2017-05-15 14:50:08'),
(033, 'inv_batch.batch_name', 'Batch', '2017-05-25 19:39:10'),
(034, 'itemlist.modified_by', 'Modified By', '2017-05-25 19:39:36'),
(035, 'vendors.vendor', 'Vendor', '2017-05-26 13:27:56'),
(036, 'item_track.track', 'Track', '2017-05-26 13:57:17'),
(037, 'general_listings.date_added', 'Date Added', '2017-06-12 19:46:14'),
(038, 'general_listings.id', 'Listing ID', '2017-06-12 19:47:37'),
(039, 'general_listings.last_update', 'Date Modified', '2017-06-13 13:23:11'),
(040, 'manufacturers.id', 'Mnfr. ID', '2017-06-13 16:18:40'),
(041, 'models.id', 'Model ID', '2017-06-13 18:04:53'),
(042, 'brands.id', 'Brand ID', '2017-06-13 18:30:55'),
(043, 'subitem_of.id', 'ID', '2017-06-13 18:58:00'),
(044, 'subitem_of.time_added', 'Date Added', '2017-06-13 18:58:22'),
(045, 'vendors.id', 'Vendor ID', '2017-06-13 19:05:35'),
(047, 'vendors.date_added', 'Date Added', '2017-06-13 19:05:35'),
(048, 'inv_batch.id', 'Batch ID', '2017-06-13 19:05:35'),
(050, 'inv_batch.description', 'Description', '2017-06-13 19:05:35'),
(051, 'inv_batch.date_added', 'Date Added', '2017-06-13 19:05:35'),
(052, 'inv_batch.added_by', 'Added By', '2017-06-13 19:05:35'),
(053, 'adverts_listings.id', 'Ad ID', '2017-06-13 20:34:30'),
(054, 'adverts_listings.type', 'Ad Type', '2017-06-13 20:34:30'),
(055, 'adverts_listings.start_date', 'Start Date', '2017-06-13 20:34:30'),
(056, 'adverts_listings.end_date', 'End Date', '2017-06-13 20:34:30'),
(057, 'adverts_listings.date_added', 'Date Added', '2017-06-13 20:34:30'),
(058, 'asset_labels.label_num', 'Label(s)', '2017-06-14 15:15:27'),
(059, 'asset_labels.asset_type', 'Type', '2017-06-14 15:15:27'),
(060, 'asset_labels.purpose', 'Purpose', '2017-06-14 15:15:27'),
(061, 'asset_labels.serial_num', 'Serial Num.', '2017-06-14 15:15:27'),
(062, 'asset_labels.yom', 'YoM', '2017-06-14 15:15:27'),
(063, 'asset_labels.notes', 'Notes', '2017-06-14 15:15:27'),
(064, 'asset_labels.value', 'Value', '2017-06-14 15:15:27'),
(065, 'asset_labels.assigned_by', 'Assigned By', '2017-06-14 15:15:27'),
(066, 'asset_labels.date_added', 'Date Added', '2017-06-14 15:15:27');

-- --------------------------------------------------------

--
-- Table structure for table general_listings
--

DROP TABLE IF EXISTS general_listings;
CREATE TABLE general_listings (
  `id` mediumint(7) UNSIGNED ZEROFILL NOT NULL,
  `mnfrID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `modelID` smallint(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `brandID` smallint(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `title_extn` varchar(65) DEFAULT NULL,
  `description` text,
  `price` decimal(9,2) UNSIGNED DEFAULT NULL,
  `item_condition` varchar(15) DEFAULT NULL,
  `testing` varchar(15) DEFAULT NULL,
  `warranty` varchar(150) DEFAULT NULL,
  `components` text,
  `condition_note` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `reviewed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table general_listings
--

INSERT INTO general_listings (id, mnfrID, modelID, brandID, title_extn, description, price, item_condition, testing, warranty, components, condition_note, active, reviewed, date_added, last_update) VALUES
(0000001, 00001, 00001, NULL, 'Bioblock', 'Industry standard design and comprehensive control options are prerequisite for establishing scalable processes. Eppendorfs autoclavable DASGIP Benchtop Bioreactors offer highest flexibility regarding instrumentation and setup. 16 industry-standard ports, direct overhead drives and pitched-blade impellers ensure optimal conditions for advanced cell culture research and process development. All parts are laser-labelled with part numbers and have certificates of origin available.', NULL, 'Like-New', NULL, NULL, NULL, 'Like-New Instrument, Excellent Condition.\n\nFully serviced and tested, with 90-Day complete parts and labor warranty.', 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000002, 00003, 00002, NULL, NULL, 'The ambr 15 cell culture is an automated microscale bioreactor system that replicates classical laboratory-scale bioreactors. It is widely used by major Pharma and biologics companies, academic and research institutes as a reliable microscale model for a range of upstream processes.', '1995.00', 'Used', 'Tested', '90-Day Complete Parts and Labor', NULL, 'Almost brand-new, from a working facility.', 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000003, 00004, 00003, NULL, NULL, 'Modes of detection included: Absorbance, Top and Bottom Fluoresence, Luminescence.', '10500.00', NULL, NULL, NULL, 'iControl Operating Software, Windows 7 Computer, Monitor.', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000004, 00005, 00004, NULL, NULL, 'Modes of detection included: Absorbance, Top and Bottom Fluorescence, Luminescence', '10500.00', NULL, NULL, NULL, 'Includes: Gen5 Data Software, Windows 7 Computer, Monitor.', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000005, 00004, 00005, NULL, NULL, 'The HydroFlex microplate washer is a truly flexible platform that provides excellent automated microplate strip washing and vacuum filtration performance for 96-well microplate formats. \n\nThis modular and upgradeable platform is ideal for a wide range of cell-, enzyme- and DNA-based applications in academia, biotech, pharma and clinical diagnostics, reflecting over 30 years of Tecan expertise in advanced liquid handling.', '3500.00', NULL, NULL, NULL, 'Includes: 8-Channel Manifold, Bottle Sets', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000006, 00005, 00006, NULL, NULL, 'The new ELx405T Select Deep Well Microplate Washer is a robot compatible, full plate washer incorporating BioTeks patented Dual-Action manifold with independent filling and evacuation control for precise overfill washing and overflow protection. Available low-flow rates and angled dispensing make the ELx405 particularly useful in cell-based assays.', '3500.00', NULL, NULL, NULL, 'Includes: 96-Channel Manifold, Additional Pump, Additional Bottle Set', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000007, 00006, 00007, NULL, NULL, 'The technologically-advanced Hamilton Microlab STAR series is a popular liquid handling platform used throughout the life science market. The STAR series of liquid handlers utilizes an air displacement pipetting system combined with the unique Compressed O-Ring Expansion (CO-RE) technology for disposable tip addition and ejection. Other technologies included in the MicroLab STAR series is Monitored Air Displacement (MAD), Total Aspirate and Dispense Monitoring (TADM) and Anti-Droplet Control (ADC), all unique features of the Hamilton MicroLab STAR series.<br /><br />The MicroLab STAR series is modular and easily configurable. The option for the number of 1mL pipetting channels (2, 4, 8, 12, or 16) combined with the option for multi-channel pipettors (96 or 384) enables the customer to configure the STAR to maximize the efficiency of the instrument and lab processes. Additionally, the STAR can be configured with an internal plate manipulator (iSWAP), a barcode scanner (Autoload) and the optional but limited plate manipulator, core grippers.<br /><br />The MicroLab STAR workstation is a very reliable liquid handling platform, capable of a wide variety of applications to meet your current and dynamic requirements. Due to the flexibility and reliability of the Hamilton STAR, ALE is able to provide the Hamilton STAR series of liquid handlers with confidence and with the security one desires for their lab equipment.', '42000.00', NULL, NULL, NULL, 'Includes 12/96 Pipettor, iSWAP Gripper, and Autoload.', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000008, 00006, 00008, NULL, NULL, 'The technologically-advanced Hamilton Microlab STAR series is a popular liquid handling platform used throughout the life science market. The STAR series of liquid handlers utilizes an air displacement pipetting system combined with the unique Compressed O-Ring Expansion (CO-RE) technology for disposable tip addition and ejection. Other technologies included in the MicroLab STAR series is Monitored Air Displacement (MAD), Total Aspirate and Dispense Monitoring (TADM) and Anti-Droplet Control (ADC), all unique features of the Hamilton MicroLab STAR series.<br /><br />The MicroLab STAR series is modular and easily configurable. The option for the number of 1mL pipetting channels (2, 4, 8, 12, or 16) combined with the option for multi-channel pipettors (96 or 384) enables the customer to configure the STAR to maximize the efficiency of the instrument and lab processes. Additionally, the STAR can be configured with an internal plate manipulator (iSWAP), a barcode scanner (Autoload) and the optional but limited plate manipulator, core grippers.<br /><br />The MicroLab STAR workstation is a very reliable liquid handling platform, capable of a wide variety of applications to meet your current and dynamic requirements. Due to the flexibility and reliability of the Hamilton STAR, ALE is able to provide the Hamilton STAR series of liquid handlers with confidence and with the security one desires for their lab equipment.', '27500.00', NULL, NULL, NULL, 'Includes Autoload and iSWAP Gripper', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000009, 00007, NULL, NULL, 'Classic Acquity UPLC System', NULL, NULL, NULL, NULL, NULL, 'Acquity UPLC Binary Solvent Manager, Acquity UPLC Autosampler, Acquity UPLC Column Manager - Right Inlet, Acquity UPLC Column Manager - Left Inlet, Acquity UPLC Sample Organizer, Acquity Column Heater HT, Acquity UPLC Column Heater/Cooler', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000010, 00007, NULL, NULL, 'Acquity UPLC - H Class Components', NULL, NULL, NULL, NULL, NULL, 'Acquity UPLC Sample Manager FTN, Acquity UPLC Sample Organizer with Computer, Acquity H Class Bios', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000011, 00007, NULL, NULL, 'Acquity UPLC - I Class Components', NULL, NULL, NULL, NULL, NULL, 'Acquity UPLC I Class Binary Solvent Manager (BSM), Acquity UPLC I Class Sample Manager FTN, Acquity APC Isocratic Solvent Manager, Acquity Isocratic Solvent Manager', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000012, 00007, NULL, NULL, 'Acquity Detectors', NULL, NULL, NULL, NULL, NULL, 'Acquity UPLC ELSD w/nebulizer, Acquity UPLC Photodiode Array (PDA) Detector TC, Acquity UPLC PDA lambda Detector, Acquity PDA Detector W/Taper Slit, Acquity UPLC TUV Detector TC, Acquity UPLC Fluorescence Detector, Acquity RI Detector, Acquity PDA Flowcell - Analytical 10 mm, Acquity PDA Flowcell - High Sensitivity 25 mm, Acquity TUV Flowcell - Analytical 10 mm, Nano Acquity Auxiliary Solvent Manager - HP, Nano Acquity Sample Manager with Heat Trap Module', NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000013, 00007, 00009, NULL, NULL, 'The 2414 RI Detector is the ideal solution for the analysis and quantification of components with limited or no UV absorption, such as alcohols, sugars, sacharides, fatty acids and polymers.', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000014, 00007, 00010, NULL, NULL, 'The Waters 2424 ELS (ELS) Detector was designed to provide a critical balance in mind to deliver good sensitivity of semi-volatile components and low peak dispersion.', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000015, 00007, 00011, NULL, NULL, 'The Waters 2465 Electrochemical Detector combines sensitivity, reliability, and simplicity for HPLC electrochemical detection. Its versatile detection modes are ideally suited for analyzing a wide range of compounds.', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000016, 00007, 00012, NULL, NULL, 'The 2475 FLR Detector helps achieve high-sensitivity, low-dispersion methods with unsurpassed accuracy, maximum uptime, and complete confidence in the analysis.', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000017, 00007, 00013, NULL, NULL, 'Whether performing routine UV-based applications or pushing the limits of detection with low-level impurity analyses, the Waters 2489 UV/Visible (UV/Vis) Detector is the best detection choice for performance, reliability, and usability.', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-04-26 14:07:02', '2017-06-12 19:40:34'),
(0000019, 00008, 00014, NULL, NULL, 'The Applied Biosystems 3730 Series DNA Analyzers have been developed to meet the growing needs of a broad range of industries and application areasâ€”from core and research laboratories in academic, government, and medical institutions, to biotech, pharmaceutical laboratories, and genome centers. By dramatically improving data quality, significantly reducing total cost per sample, and enabling more runs per day, it allows you to pursue the projects that are important to your laboratoryâ€”even those that used to be considered too large, too complicated, or too expensive.\r\nNew applications demand greater versatility and technical performance from DNA analyzers. Whether your laboratoryâ€™s focus is de novo sequencing, resequencing, microsatellite-based fragment analysis, or SNP genotyping, the fully automated 3730 series enables you to work at unprecedented levels of productivity and efficiency.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 13:51:50', '2017-06-12 19:40:34'),
(0000023, 00005, 00006, NULL, NULL, 'The Biotek ELx405 microplate washers are both efficient and space conscious in all lab settings. The BiotekELx405 platewasher features a patented dual-action manifold to ensure fast operating time and overall cleaning efficiency. Contrary to its small size, the ELx405 plate washer series comes fully loaded with an array of preprogrammed plate washer settings to guarantee optimal performance no matter the microplate type. Among these programs, the ELx405 also employs unique AutoPrime and AutoRinse functions for both speedy maintenance and quick prep times. \r\n\r\nThis Biotek ELx405 microplate washer is in excellent condition and is tested to perform at factory specifications by our technical team at ALE. Â The pump and bottle set is optional based on lab requirements.\r\nPlate Readers Molecular Devices \r\nPlate Readers Perkin Elmer', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 13:58:43', '2017-06-12 19:40:34'),
(0000024, 00011, 00021, NULL, NULL, 'The Illumina HiSeq 2500 v4 has become the undisputed powerhouse of Illumina sequencing systems for high-throughput sequencing applications. To date, millions of samples have been sequenced and thousands of papers have been published utilizing Illumina sequencing technology. With unrivaled data quality, flexible run configurations, and a 10 gigabase (Gb) to 1 terabase (Tb) per run capacity, the HiSeq 2500 has become the production platform of choice for all major Genome Centers and leading institutions around the world.<br />\r\n<br />\r\nThe HiSeq 2500 System delivers the highest daily throughput and total yield of any individually sold sequencer on the market today. With a massive daily throughput of 160 Gb per day or 1 Tb per run, more samples can be simultaneously sequenced at a greater depth than ever before&mdash;producing richer, more meaningful data. Large studies can be completed with reduced hands-on time and reagent cost. In high output mode, the HiSeq 2500 System can process 8 human genomes at 30&times; coverage or 150 human exomes, assuming 4 Gb per exome at 2 &times; 75 bp, per run. The HiSeq 2500 System, in high-output mode, is perfect for production scale projects with large genome sizes or studies with hundreds of samples.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:06:40', '2017-06-12 19:40:34'),
(0000025, 00011, 00022, NULL, NULL, 'The Illumina MiSeq System offers the first end-to-end sequencing solution, integrating cluster generation, amplification, sequencing, and data analysis into a single instrument. Its small footprint&mdash;approximately 2 square feet&mdash;fits easily into virtually any laboratory environment. The MiSeq System leverages Illumina sequencing by synthesis technology (SBS), the most widely used, next-generation sequencing chemistry. With over 750 publications to date, the MiSeq System is the ideal platform for rapid and cost-effective genetic analysis.<br />\r\n<br />\r\nFor results in hours rather than days, the combination of rapid library preparation and the MiSeq System delivers a simple, accelerated turnaround time. Prepare your sequencing library in just 90 minutes with Nextera&reg; library prep reagents, then move to automated clonal amplification, sequencing, and quality-scored base calling in as little as 4 hours on the MiSeq instrument. Sequence alignment can be completed directly on the onboard instrument computer with MiSeq Reporter software or through the BaseSpace platform within 3 hours.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:08:39', '2017-06-12 19:40:34'),
(0000026, 00011, 00023, NULL, NULL, 'A transformative addition to the industry-leading Illumina next-generation sequencing (NGS) system portfolio, the NextSeq Series of systems delivers the power of high-throughput sequencing with the simplicity of a desktop sequencer. Its fast, integrated, sample-to-results workflow enables rapid sequencing of exomes, targeted panels, and transcriptomes in a single run, with the flexibility to switch to lower-throughput sequencing as needed. The systems fit seamlessly into research laboratories, with no need for specialized equipment. Illumina scientists are available at every point along the way with support and guidance, enabling researchers to focus on making the next breakthrough discovery.<br />\r\n<br />\r\nThe intuitive user interface and load-and-go operation enable researchers to perform more sequencing applications at the highest depth and resolution. It takes less than 10 minutes to load and set up a NextSeq System. While other platforms require several pieces of specialized equipment, the NextSeq Series integrates cluster generation and sequencing into a single instrument and offers a seamless transition for onsite or cloud-based data analysis. After preparation using a simple, streamlined Illumina library prep kit, libraries are loaded into a NextSeq System where sequencing is automated and fast. Data are generated in as little as 12 hours for a 75-cycle sequencing run and less than 30 hours for paired 150-cycle reads. By employing the Illumina industry-leading sequencing by synthesis (SBS) chemistry and file format conventions, the NextSeq Series offers customers access to the broadest ecosystem of established protocols, workflows, data sets, and data analysis tools', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:09:02', '2017-06-12 19:40:34'),
(0000027, 00013, 00024, NULL, NULL, 'Labcyte has revolutionized liquid handling with an innovative technology that produces faster, more accurate results than traditional methods. Whether you are involved in compound management, genomics, proteomics, diagnostics or other laboratory applications, you will do better science and save money with acoustic droplet ejection (ADE).<br />\r\n<br />\r\nPowerful but gentle in its approach, ADE drives Labcyte Echo&reg; 500-series Liquid Handlers. It focuses ultrasonic acoustic energy at the meniscus of a fluid sample to eject small droplets of liquid from wells and position them precisely onto a surface suspended above the ejection point.<br />\r\nThe Labcyte ECHO 550 is for medium throughput screening and large genomics projects.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:09:37', '2017-06-12 19:40:34'),
(0000028, 00013, 00025, NULL, NULL, 'The Echo 555 Liquid Handler has the speed and flexibility required for a screening lab. With rapid, highly precise nL volume transfers, Echo 555 Liquid Handler can process over 650* compound and over 500* reagent plates per day. Tasks like plate reformatting, hit picking, daughter plate creation, and adding samples and reagents for screening assays are made easy with the Echo 555 Liquid Handler.<br />\r\n<br />\r\nPowerful but gentle in its approach, ADE drives Labcyte Echo&reg; 550-series Liquid Handlers. It focuses ultrasonic acoustic energy at the meniscus of a fluid sample to eject small droplets of liquid from wells and position them precisely onto a surface suspended above the ejection point.<br />\r\nThe Labcyte ECHO 555 is for high throughput screening.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:10:06', '2017-06-12 19:40:34'),
(0000031, 00004, 00003, NULL, NULL, 'The Tecan Infinite M200 is a user-friendly and affordable multimode reader, designed to cater for the needs of today&rsquo;s applications. The Infinite 200 can provide a full range of leading detection methods in one easy-to-use modular instrument, with Quad4 monochromator&trade; . Users can select the desired modules to create the perfect reader for their needs, with the option to upgrade as requirements change. The Infinite M200 &nbsp;offers excellent sensitivity, multiplexing capabilities and high format flexibility, including 6- to 384-well microplates, PCR plates, cuvettes and Tecan&rsquo;s patented NanoQuant Plate&trade; for low sample volumes.<br />\r\n<br />\r\nAs with most multi-mode plate readers, the Tecan M200 is configurable. &nbsp;Please give ALE a call for your desired modes of detection.&nbsp;', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:19:58', '2017-06-12 19:40:34'),
(0000033, 00002, 00028, 00001, NULL, 'The Agilent Microplate Centrifuge is a small robot-accessible automated centrifuge. It also provides both vibration and noise control in a small, low-maintenance package. Ideal for high or medium-throughput applications. The Microplate Centrifuge is capable of rapid acceleration and deceleration (a customizable setting), minimizing the required cycle time. It is excellent for filtration protocols, air bubble removal in high-density microplates and spin-downs including cells and cellular debris. A solid and efficient design allows Microplate Centrifuge units to be stacked to save space. The door design allows for access to the buckets by a range of articulated robots, for high throughput applications. For robots that cannot reach through the door, the Automated Centrifuge Loader allows unobstructed accessibility. With a three second loading time and robust motion control, the Automated Centrifuge Loader can be accessed by most laboratory microplate handlers/robots.<br />\r\nALE fully supports and services the Agilent VSpin.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:31:24', '2017-06-12 19:40:34'),
(0000034, 00002, 00027, 00001, NULL, 'The Agilent Bravo Automated Liquid Handling Platform provides precision, unparalleled versatility, and speed in a compact footprint. With seven different, easy-change liquid handling head types, numerous plate pad options, and over 60 on-deck accessories, the Bravo Platform can be customized for a wide range of assays. The unique, open design of the Bravo Platform permits simple integration with other devices for increased throughput when used with robots or the Agilent BenchCel Microplate Handler. The Bravo Platform&rsquo;s space-saving, nine plate position footprint facilitates biohood placement, enabling liquid transfers for cell-based assays or hazardous reagents. And safety comes standard with the infrared-based, LED safety light curtain provided with all standalone Bravo instruments. <br />\r\n<br />\r\nThe Bravo Platform is powered by the proven Agilent VWorks Automation Control Software, which features dynamic scheduling, an easy-to-use interface, and innovative error recover technology for instrument control that is adaptable to all types of users.<br />\r\nALE provides quality services and support for the Agilent Bravo system.<br />\r\n', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 14:38:29', '2017-06-12 19:40:34'),
(0000039, 00008, 00015, NULL, NULL, 'Applied Biosystems sets a new standard in capillary electrophoresis with the 8-capillary 3500 and 24-capillary 3500xL Genetic Analyzers. The 3500 Series Genetic Analyzers1 are specifically designed to support the demanding performance needs of validated and regulated environments while retaining the unsurpassed application versatility that life science researchers expect from Applied Biosystems.\r<br />\r<br />Key Features:\r<br />\r<br />*8-capillary 3500 System and 24-capillary 3500xL System \r<br />*Advanced thermal system design improves temperature control for demanding DNA fragment analysis applications \r<br />*Single-line 505 nm, solid-state long-life laser&mdash;utilizes a standard power supply; requires no heat removal \r<br />*Significantly improved signal uniformity from instrument to instrument, run to run, and capillary to capillary \r<br />*Powerful, integrated data collection and primary analysis software provide real-time assessment of data quality \r<br />*Radio Frequency Identification (RFID) technology tracks key consumables data and records administrative information \r<br />*Advanced multiplexing capabilities for DNA fragment analysis with up to six unique dyes \r<br />*Unrivaled application flexibility&mdash;one array and one polymer are used for most applications \r<br />*Simple setup, operation, and maintenance&mdash;the easiest-to-run, easiest-to-own DNA sequencer to date', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 18:37:54', '2017-06-12 19:40:34'),
(0000040, 00009, 00019, NULL, NULL, 'The compact and cost effective Biomek NXP is available with two pipetting models &ndash; Multi-channel (96 or 384) or Span 8. Both configurations combine the benefits of a small footprint with the increased efficiency and flexibility of a medium to high throughput instrument. Open-ended flexibility enables integration capability based on your workflow needs.\r<br />Biomek NXP features easy-to-use, icon-driven software and a library of ready-to-run methods. Configure the instrument to your specifications and choose from a wide range of components to build your optimal solution:\r<br /> \r<br />*Multi-channel (96 or 384) or Span 8 pipetting models\r<br />*Precise pipetting from 1 &mu;l - 1000 &mu;l\r<br />*360&deg; rotating gripper provides access to from the left and right as well as integrated devices on the back of the instrument\r<br />*Open-frame design provides additional workspace for on-deck integrations and storage\r<br />*Light curtain pauses instrument operations if a foreign object enters the work area without the loss of data upon restarting a workflow\r<br />*Fly-By barcode reader to track sample IDs\r<br />*Septum piercing and clot detection\r<br />*Heating, cooling and shaking Automated Labware Positioners (ALPs)\r<br />*Benchtop instrument\r<br />\r<br />ALE provides quality automated platforms, fully serviced and tested per Beckman specifications.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 19:31:28', '2017-06-12 19:40:34'),
(0000041, 00009, 00020, NULL, NULL, 'The Beckman Biomek FX system is available in both single arm and dual arm configurations. Biomek FXP provides the speed and performance critical to today&rsquo;s research environments. The flexible platform is available in single and dual pipetting head models combining multi-channel (96 or 384) and Span 8 pipetting. Ideal for high throughput workflows, Biomek FXP accelerates laboratory processing, and is easy to update or integrate as your research needs evolve.\r<br />\r<br />The Beckman Biomek Automated Workstations feature easy-to-use, icon-driven software and a library of ready-to-run methods. Choose from a wide range of components to build a Biomek FXP to your specifications, creating the optimal liquid handling solution for your workflow:\r<br /> \r<br />*Single or dual head pipetting models\r<br />*Multi-channel (96 or 384) with built-in gripper tool and Span 8 pipetting head options\r<br />*Precise pipetting from 1 &mu;l - 1000 &mu;l\r<br />*Pin-tool system for high density replication tasks\r<br />*Open-frame design provides additional workspace for on-deck integrations and storage\r<br />*Light curtain pauses instrument operations if a foreign object enters the work area without the loss of data upon restarting a workflow\r<br />*Fly-By barcode reader to track sample IDs\r<br />*Septum piercing and clot detection\r<br />*Heating, cooling and shaking Automated Labware Positioners (ALPs)\r<br />*Benchtop instrument\r<br />\r<br />ALE provides quality automated platforms, fully serviced and tested per Beckman specifications.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 20:05:51', '2017-06-12 19:40:34'),
(0000042, 00004, 00005, NULL, NULL, 'The HydroFlex microplate washer is a truly flexible platform that provides excellent automated microplate strip washing and vacuum filtration performance for 96-well microplate formats. \r<br />\r<br />This modular and upgradeable platform is ideal for a wide range of cell-, enzyme- and DNA-based applications in academia, biotech, pharma and clinical diagnostics, reflecting over 30 years of Tecan expertise in advanced liquid handling.\r<br />\r<br />HydroFlex features and benefits:\r<br />\r<br />*Compact and modular design, suitable for a range of applications and laboratories\r<br />*Ready for automated washing of ELISAs, cells and protein arrays\r<br />*Automated system for vacuum filtration to waste\r<br />*Magnetic plate carrier for magnetic bead washing\r<br />*Advanced online process controls for safety and reliability\r<br />*Bubble sensor unit that ensures reliable buffer dispensing\r<br />*Multipoint aspiration for flat bottom plates to achieve minimal residual volumes\r<br />*Individual software control of speed settings and wash head positions\r<br />*Suitable for integration onto Freedom EVO and Freedom EVOlyzer workstations\r<br />*Excellent reliability and low service costs', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 20:10:53', '2017-06-12 19:40:34'),
(0000043, 00004, NULL, NULL, 'Freedom EVO Series 200', 'The Freedom EVO series is one of the most popular and reliable systems in the market. The refurbished Freedom EVO platform is very flexible and upgradeable thus able to evolve to your dynamic environment. &nbsp;This proven platform enables you to create your system according to your specific needs with the help of the ALE application team. \r<br />\r<br />The EVO series comes in multiple configurations and with multiple accessories to meet your specific requirements. &nbsp;ALE offers both the airLiHa and Liquid LiHa systems for pipetting as well as the MCA 96 head. &nbsp;Additionally, systems can also be configured with a RoMa, posID3 or Pick/Place arm, if needed.\r<br />\r<br />As the market leader, the Tecan platform is used in a variety of applications:\r<br />*General Liquid Handling\r<br />*Genomics - &nbsp;PCR Set Up, DNA Purifications, NGS\r<br />*Sample Prep for Mass Spec, SPE, Toxicology\r<br />*Cell Biology Applications: &nbsp;Bioprocessing, ADME, \r<br />*ELISA\r<br />\r<br />Whereby the ALE team is able to configure, develop methods and provide post-sales support for all Tecan liquid handlers', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 20:30:52', '2017-06-12 19:40:34'),
(0000044, 00004, NULL, NULL, 'Freedom EVO 150 Liquid Handler', 'The Freedom EVO series is one of the most popular and reliable systems in the market. The refurbished Freedom EVO platform is very flexible and upgradeable thus able to evolve to your dynamic environment. &nbsp;This proven platform enables you to create your system according to your specific needs with the help of the ALE application team. \r<br />The EVO series comes in multiple configurations and with multiple accessories to meet your specific requirements. &nbsp;ALE offers both the airLiHa and Liquid LiHa systems for pipetting as well as the MCA 96 head. Additionally, systems can also be configured with a RoMa, posID3 or Pick/Place arm, if needed.\r<br />\r<br />As the market leader, the Tecan platform is used in a variety of applications:\r<br />*General Liquid Handling\r<br />*Genomics - &nbsp;PCR Set Up, DNA Purifications, NGS\r<br />*Sample Prep for Mass Spec, SPE, Toxicology\r<br />*Cell Biology Applications: &nbsp;Bioprocessing, ADME, \r<br />*ELISA\r<br />\r<br />Whereby the ALE team is able to configure, develop methods and provide post-sales support for all Tecan liquid handlers.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-04-28 20:35:24', '2017-06-12 19:40:34'),
(0000045, 00006, 00007, NULL, NULL, 'The technologically-advanced Hamilton Microlab STAR series is a popular liquid handling platform used throughout the life science market. The STAR series of liquid handlers utilizes an air displacement pipetting system combined with the unique Compressed O-Ring Expansion (CO-RE) technology for disposable tip addition and ejection. Other technologies included in the MicroLab STAR series is Monitored Air Displacement (MAD), Total Aspirate and Dispense Monitoring (TADM) and Anti-Droplet Control (ADC), all unique features of the Hamilton MicroLab STAR series.<br /><br />The MicroLab STAR series is modular and easily configurable. The option for the number of 1mL pipetting channels (2, 4, 8, 12, or 16) combined with the option for multi-channel pipettors (96 or 384) enables the customer to configure the STAR to maximize the efficiency of the instrument and lab processes. Additionally, the STAR can be configured with an internal plate manipulator (iSWAP), a barcode scanner (Autoload) and the optional but limited plate manipulator, core grippers.<br /><br />The MicroLab STAR workstation is a very reliable liquid handling platform, capable of a wide variety of applications to meet your current and dynamic requirements. Due to the flexibility and reliability of the Hamilton STAR, ALE is able to provide the Hamilton STAR series of liquid handlers with confidence and with the security one desires for their lab equipment.', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-04 15:26:03', '2017-06-12 19:40:34'),
(0000046, 00017, 00030, NULL, NULL, NULL, NULL, NULL, 'tested', NULL, NULL, NULL, 1, 1, '2017-05-04 16:05:12', '2017-06-12 19:40:34'),
(0000047, 00018, 00031, NULL, NULL, NULL, NULL, NULL, 'tested', NULL, NULL, NULL, 1, 1, '2017-05-04 16:05:12', '2017-06-12 19:40:34'),
(0000048, 00002, 00032, 00001, NULL, NULL, NULL, NULL, 'tested', NULL, NULL, NULL, 1, 1, '2017-05-04 16:05:12', '2017-06-12 19:40:34'),
(0000049, 00019, 00033, NULL, NULL, 'An accurate-mass, high-resolution LC/MS/MS system for qualitative analysis that has the speed and sensitivity to deliver quantitation like a high-performance triple quad. \r<br />\r<br />*High sensitivity for quantitation at low abundance levels\r<br />*SmartSpeed 100 Hz Acquisition collects 100 spectra/second\r<br />*Dynamic range of greater than 4 orders of magnitude\r<br />*EasyMass accuracy of 1ppm over 24 hours with external calibration\r<br />*Resolution of 25,000 FWHM at low mass, m/z 100 and up to 40,000 at m/z 950, at 100 spectra/sec', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:39:39', '2017-06-12 19:40:34'),
(0000050, 00019, 00034, NULL, NULL, 'The API 4000 LC-MS/MS System delivers high-performance quantitation and identification across a wide range of LC flow rates.\r<br />\r<br />Features:\r<br />*Proven Curtain Gas&trade; Interface technology, combined with improved gas dynamics, reduces maintenance and increases uptime.\r<br />*Enhanced, high-flow-rate performance, reduced ionization suppression, self-cleaning probe design, and reliable interface are combined to produce accelerated productivity and high throughput.\r<br />*Analyst&reg; Software facilitates GLP compliance, including ability to support 21 CFR Part 11 compliance.\r<br />\r<br />Specifications:\r<br />Detector Type: Pluse-counting channel electron multiplier (CEM) detector\r<br />Ionization sources: TurbolonSpray Ion Source; Atmospheric-pressure chemical ionization (APCI) sources; DuoSpray and PhotoSpray Ion Sources\r<br />Scan Types: Q1 MS, Q3 MS, Product Ion, Precursor Ion, Neutral Loss or Gain, MRM', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:42:55', '2017-06-12 19:40:34'),
(0000051, 00020, 00035, NULL, NULL, 'Acoustic Liquid Dispenser uses focused low-energy sound waves to dispense droplets from a source pool of fluid, and then transfers those droplets to destination sites on a target substrate. Droplets can be dispensed from all SBS formats: 96, 384, 1536, and 3456 wellplates.\r<br />\r<br />Manufacturer&rsquo;s Specifications:\r<br />&bull; Drop sizes: 1 - 20 nL \r<br />&bull; Transfer Volumes: 1 nL - 100 &micro;L \r<br />&bull; Accuracy: &lt; 8% CV&#039;s on all dispenses \r<br />&bull; Fluid viscosity: 0 - 100 cps \r<br />&bull; Fluid Surface Tension: 27 - 72 dynes/cm \r<br />&bull; Use a wide range of source and destination wellplates \r<br />&bull; Low starting and dead volumes \r<br />\r<br />Applications:\r<br />&bull; Wellplate reformatting \r<br />&bull; Compound library screening \r<br />&bull; Assay development \r<br />&bull; Cell-based assays \r<br />&bull; Hit-picking / cherry-picking \r<br />&bull; Serial dilutions / dose responses (IC-50s) \r<br />&bull; PCR assays \r<br />&bull; Create MALDI matrixes \r<br />&bull; Arrays \r<br />&bull; Dispense live cells ', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:43:49', '2017-06-12 19:40:34'),
(0000052, 00007, 00036, NULL, NULL, 'Compatible with HPLC, UPLC, UPC2, AutoPurification and SFC. The SQ Detector 2 is the ultimate \r<br />single quadrupole mass detector for chromatography.\r<br />\r<br />Features:\r<br />*IntelliStart&trade; guarantees maximum system performance and usability for reproducible results\r<br />*A wide mass range enables uncompromised analysis of both low and high molecular weight species\r<br />*Versatile chromatographic options ensure compatibility with the broadest range of applications.\r<br />*Universal Ion Source Architecture offers easy compatibility with the widest range of analytes', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:44:39', '2017-06-12 19:40:34'),
(0000053, 00007, 00037, NULL, NULL, 'A bench-top orthogonal acceleration time-of-flight (oa-TOF) LC/MS system that uses ion guide technology for optimum transfer of ions from the source to the orthogonal acceleration time of flight (as-TOF) mass analyzer. Data is acquired by a 4.0 GHz time-to-digital converter (TDC) and histogrammed in an embedded PC. Instrument control and data acquisition is by the MassLynx&trade; software system. \r<br />\r<br />Feataures a ZSpray source with ESI (electrospray ionization) and modular LockSpray&trade; interface. Options include IonSABRE&trade; atmospheric pressure chemical ionization (APCI), atmospheric pressure photoionization (APPI), electrospray chemical ionization (ESCI), NanoLockSpray&trade; and MUX-Technology&trade;. ', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:45:30', '2017-06-12 19:40:34'),
(0000054, 00007, 00038, NULL, NULL, 'A benchtop orthogonal acceleration time-of-flight (oa-TOF) mass spectrometer. The LCT Premier XE benchtop orthogonal acceleration time-of-flight (oa-TOF) mass spectrometer delivers high sensitivity, resolution, and exact mass measurements for LC/MS applications. Its fast data acquisition rates and automated workflow features match the requirements for MS detection under UPLC&reg; conditions. A variety of ion source and software options makes the LCT Premier XE a versatile choice for a range of analytical challenges, from characterizing proteins to screening large compound libraries. \r<br />\r<br />Features: \r<br />*High MS resolution for the selectivity needed to separate analyte spectra from isobaric interferences and background chemical noise\r<br />*High sensitivity for achieving very low detection limits\r<br />*High linear dynamic range, which allows experiments to be carried out across a range of concentration levels\r<br />*Exact mass MS measurements, which give elemental composition information that can be used to identify analyte compounds; you can obtain exact mass on molecular and fragment ions, simplifying the process of spectrum interpretation\r<br />*Versatile ionization options that apply to a range of compound classes\r<br />*Versatile software options for a variety of applications', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:46:09', '2017-06-12 19:40:34'),
(0000055, 00006, 00007, NULL, NULL, 'Hamilton STAR 12/96 Autoload, iSWAP.\r<br />\r<br />Includes: \r<br />*12 (1mL) Air Displacement Pipetting Channels \r<br />*96 Multi-channel Pipetting Device (300uL head)\r<br />*Autoload for 1-d barcode reading\r<br />*iSWAP for plate and tip manipulation on deck', NULL, NULL, 'Tested', NULL, NULL, NULL, 1, 1, '2017-05-09 13:58:07', '2017-06-12 19:40:34'),
(0000056, 00019, 00039, NULL, NULL, 'System delivers high-performance quantitation and identification across a wide range of LC flow rates.<br />*Proven Curtain Gas Interface technology, reduces maintenance therefore increasing uptime.<br />*The patented LINAC Collision Cell, delivers high performance and high productivity with greater confidence in your results.<br />*Enhanced, high-flow-rate performance, reduced ionization suppression, self-cleaning probe design.<br />*API 4000 System ensures low detection limits via efficient ionization and superior ion sampling of the interface result in excellent sensitivity.<br />*Easy-to-use Turbo V Source allows you to quantitate over a wide range of flow rates and to change rapidly between atmospheric-pressure chemical ionization (APCI) and TurboIonSpray Probes. The available optional DuoSpray Ion Source accelerates method development and increases both throughput and data quality. An additional option for APCI, the PhotoSpray Source, expands the range of compounds you can analyze.<br /><br />Detector Type: Pulse-counting channel electron multiplier (CEM) detector.<br />Scan Types: Q1 MS, Q3 MS, Product Ion, Precursor Ion, Neutral Loss or Gain, MRM.<br /><br />Specifications:<br />Mass Range: 5-3,000<br />Dynamic Range: 5 orders of magnitude<br />Ionization Sources: ESI, APCI<br />Mass Accuracy / Stability: 0.1 Da over 8 hours, 0.15 Da over 24 hours<br />Sensitivity MRM Mode: 200 fg Reserpine on column: S/N > 1,200, C.V. < 5%<br /><br />Includes:<br />*AB Sciex API4000 LC/MS/MS<br />*Line transformers<br />*Turbo V Ion Source (with APCI and ESI probes)<br />*Edwards Roughing Pump<br />*Windows 7 Computer loaded w/ Analyst Software', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 20:06:08', '2017-06-12 19:40:34'),
(0000057, 00022, 00040, NULL, NULL, 'Smartbeam-II laser enables ultra-high data aquisition speed in both MS and MS/MS at full systems performance. Smartbeam laser provides superior analytical and matrix flexibility in workflows from protein tissue imaging, intact proteins analysis, glycoproteomics, etc., all fully enabled at 1-2000 Hz repetition rates.<br /><br />Bruker''s patented smartbeam technology is already widely accepted as a superior  MALDI imaging laser technology. Laser focus diameters down to 10um for high spatial resolution imaging without pixel overlap. Importantly, outstanding spectral quality and signal intensity are maintained at even the smallest laser beam diameters. Mass resolving power up to 40,000 enables precision proteomics via Bruker''s unique PAN technology for highest mass resolution across a very broad mass range, not just at a selected optimum.<br /><br />The novel FlashDetector combined with a minimum of 4 GHz digitizer and latest advances in electronics provide mass resolving power up to 40,000 and 1 ppm mass accuracy. Laser-irradiation self-cleaning Ion Source ensures robust, long-term high performance operation. Very long MALDI laser lifetime in combination with automated source cleaning leads to high uptime and low maintenance costs.<br /><br />Latest TOF/TOF technology: The high efficiency and sensitivity of the LID-LIFT process delivers MS/MS spectra with nominal mass resolution for peptides. Typically, full MS/MS data sets can be acquired with up to 1000 Hz laser repetition rate from low fmol levels within seconds. The Bruker bioinformatics software is perfectly adapted to analyze and visualize the match between the raw spectra and annotated peptide and protein structures.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 20:06:08', '2017-06-12 19:40:34'),
(0000058, 00007, 00041, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 20:06:08', '2017-06-12 19:40:34'),
(0000059, 00007, NULL, NULL, 'Acquity UPLC Systems', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 20:06:08', '2017-06-12 19:40:34'),
(0000060, 00002, NULL, NULL, '1200 Series HPLC Systems', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 20:06:08', '2017-06-12 19:40:34'),
(0000061, 00021, NULL, NULL, 'Prominence HPLC Systems', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 20:06:08', '2017-06-12 19:40:34');

-- --------------------------------------------------------

--
-- Table structure for table inv_batch
--

DROP TABLE IF EXISTS inv_batch;
CREATE TABLE inv_batch (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `batch_name` varchar(80) NOT NULL,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` smallint(5) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table inv_batch
--

INSERT INTO inv_batch (id, batch_name, reviewed, added_by, date_added, description) VALUES
(00001, 'Test 1', 0, 00000, '2017-06-23 14:11:57', 'This is test 1'),
(00002, 'Test 2', 0, 00000, '2017-06-23 14:11:57', 'This is test 2'),
(00003, 'Test Batch 3', 0, 00000, '2017-06-23 19:14:24', 'The third test batch.'),
(00004, 'Test 4', 0, 00000, '2017-06-23 19:17:50', 'You know.'),
(00005, 'Test 5', 0, 00000, '2017-06-23 19:33:05', 'Yup'),
(00006, 'Test 6', 0, 00000, '2017-06-26 18:48:52', '6th Test'),
(00007, 'Test 7', 0, 00000, '2017-06-28 18:53:03', 'Test 7777');

-- --------------------------------------------------------

--
-- Table structure for table itemlist
--

DROP TABLE IF EXISTS itemlist;
CREATE TABLE itemlist (
  `aleAsset` mediumint(5) UNSIGNED NOT NULL,
  `track` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `mnfrID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `modelID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `brandID` smallint(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `addtl_model` varchar(40) DEFAULT NULL,
  `serial_num` varchar(30) DEFAULT NULL,
  `title_extn` varchar(80) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `mpn` varchar(30) DEFAULT NULL,
  `wh_location` varchar(30) DEFAULT NULL,
  `quantity` smallint(4) DEFAULT NULL,
  `batch` smallint(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `yom` year(4) DEFAULT NULL,
  `condition_note` varchar(255) DEFAULT NULL,
  `item_condition` tinyint(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `testing` tinyint(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `weight` smallint(4) DEFAULT NULL,
  `ship_class` tinyint(1) UNSIGNED ZEROFILL DEFAULT NULL,
  `cosmetic` tinyint(1) UNSIGNED ZEROFILL DEFAULT NULL,
  `components` text,
  `warranty` tinyint(2) DEFAULT NULL,
  `ale_qb` tinyint(1) NOT NULL DEFAULT '0',
  `nov_qb` tinyint(1) NOT NULL DEFAULT '0',
  `ebay` tinyint(1) NOT NULL DEFAULT '0',
  `img_count` smallint(3) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(2) UNSIGNED ZEROFILL NOT NULL DEFAULT '06',
  `date_received` date DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_completed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table itemlist
--

INSERT INTO itemlist (aleAsset, track, mnfrID, modelID, brandID, addtl_model, serial_num, title_extn, price, mpn, wh_location, quantity, batch, yom, condition_note, item_condition, testing, weight, ship_class, cosmetic, components, warranty, ale_qb, nov_qb, ebay, img_count, active, reviewed, `status`, date_received, date_added, last_update, date_completed, modified_by) VALUES
(10001, 02, 00024, 00043, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 01, 01, NULL, 1, 1, NULL, NULL, 0, 0, 0, 106, 1, 1, 06, NULL, '2017-06-06 20:19:03', '2017-06-27 14:47:48', '2017-06-16 18:47:20', 4),
(10003, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00001, 2004, NULL, 01, 01, 32, 3, 1, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:16', '2017-06-28 12:53:16', '0000-00-00 00:00:00', 4),
(10004, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:16', '2017-06-27 16:38:16', '0000-00-00 00:00:00', 4),
(10005, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:16', '2017-06-27 16:38:16', '0000-00-00 00:00:00', 4),
(10006, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 24, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-30 15:20:13', '0000-00-00 00:00:00', 4),
(10007, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, NULL, 2004, NULL, 01, 01, 32, 3, 1, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-27 17:10:43', '0000-00-00 00:00:00', 4),
(10008, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-27 16:38:17', '0000-00-00 00:00:00', 4),
(10009, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-27 16:38:17', '0000-00-00 00:00:00', 4),
(10010, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-27 16:38:17', '0000-00-00 00:00:00', 4),
(10011, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-27 16:38:17', '0000-00-00 00:00:00', 4),
(10012, 02, 00033, 00052, NULL, '3214', 'JP90232', NULL, '2000.00', '384', '64-D', 1, 00006, 2004, NULL, NULL, NULL, 32, 3, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 06, NULL, '2017-06-27 16:38:17', '2017-06-27 16:38:17', '0000-00-00 00:00:00', 4),
(23830, 02, 00024, 00043, NULL, NULL, 'W113C1496', 'with plastic gable cover', '250.00', NULL, 'NN MC 101 F2', 0, 00004, NULL, 'This unit has been tested and functions normally. CHANGE TESTING VALUE WHEN POSSIBLE', 01, 03, 19, 3, 1, 'Main unit and power cord.', NULL, 0, 0, 0, 6, 1, 1, 06, NULL, '2016-12-16 17:21:44', '2017-06-30 19:06:01', '2016-12-16 17:21:44', 4),
(23831, 05, 00023, 00042, NULL, NULL, 'PY2152Z1302', 'REF PT10027', '0.00', 'PT10027', 'NN 107C', 1, NULL, NULL, 'This unit powers up, but requires further testing', 01, 03, 32, 3, 1, 'Main Unit, Power Cord.', NULL, 0, 0, 0, 6, 1, 1, 06, NULL, '2016-12-16 14:46:29', '2017-06-26 18:19:34', '2016-12-16 14:46:29', 4),
(23832, 02, 00025, 00044, NULL, NULL, '562-013-V7', NULL, NULL, '10K', NULL, 0, NULL, NULL, 'This item has been tested to power up only.', 01, 03, 245, 5, 1, 'Main Unit & Power Cord.', NULL, 0, 0, 0, 6, 1, 1, 06, NULL, '2016-12-16 17:21:54', '2017-06-26 18:19:34', '2016-12-16 17:21:54', 4);

-- --------------------------------------------------------

--
-- Table structure for table item_accounting
--

DROP TABLE IF EXISTS item_accounting;
CREATE TABLE item_accounting (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `aleAsset` mediumint(5) UNSIGNED NOT NULL,
  `vendorID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `cost` mediumint(7) DEFAULT NULL,
  `asset_acct` varchar(50) DEFAULT NULL,
  `cogs_acct` varchar(50) DEFAULT NULL,
  `income_acct` varchar(50) DEFAULT NULL,
  `tax_code` varchar(15) DEFAULT NULL,
  `owned_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table item_accounting
--

INSERT INTO item_accounting (id, aleAsset, vendorID, cost, asset_acct, cogs_acct, income_acct, tax_code, owned_by) VALUES
(00001, 23831, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00002, 23830, 00001, NULL, NULL, NULL, NULL, NULL, NULL),
(00003, 23832, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00218, 10003, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00219, 10004, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00220, 10005, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00221, 10006, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00222, 10007, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00223, 10008, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00224, 10009, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00225, 10010, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00226, 10011, 00001, 0, NULL, NULL, NULL, NULL, NULL),
(00227, 10012, 00001, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table item_category
--

DROP TABLE IF EXISTS item_category;
CREATE TABLE item_category (
  `aleAsset` mediumint(5) UNSIGNED NOT NULL,
  `category` int(5) UNSIGNED ZEROFILL NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table item_category
--

INSERT INTO item_category (aleAsset, category, date_added, last_update, reviewed) VALUES
(23830, 00023, '2017-05-25 14:45:29', '2017-05-25 14:45:29', 0),
(23831, 00060, '2017-05-25 14:45:29', '2017-05-25 14:45:29', 0),
(23832, 00019, '2017-05-25 14:45:30', '2017-05-25 14:45:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table item_condition
--

DROP TABLE IF EXISTS item_condition;
CREATE TABLE item_condition (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `item_condition` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table item_condition
--

INSERT INTO item_condition (id, item_condition) VALUES
(01, 'Used'),
(02, 'New'),
(03, 'Like-New');

-- --------------------------------------------------------

--
-- Table structure for table item_photos
--

DROP TABLE IF EXISTS item_photos;
CREATE TABLE item_photos (
  `id` mediumint(7) UNSIGNED ZEROFILL NOT NULL,
  `aleAsset` mediumint(5) UNSIGNED NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_order` tinyint(2) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table item_photos
--

INSERT INTO item_photos (id, aleAsset, img_url, img_order, date_added, last_update) VALUES
(0000115, 23831, 'img/ale_aloe/N23831_1.jpg', 1, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000116, 23831, 'img/ale_aloe/N23831_2.jpg', 2, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000117, 23831, 'img/ale_aloe/N23831_3.jpg', 3, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000118, 23831, 'img/ale_aloe/N23831_4.jpg', 4, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000119, 23831, 'img/ale_aloe/N23831_5.jpg', 5, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000120, 23831, 'img/ale_aloe/N23831_6.jpg', 6, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000127, 23830, 'img/ale_aloe/N23830_1.jpg', 1, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000128, 23830, 'img/ale_aloe/N23830_2.jpg', 2, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000129, 23830, 'img/ale_aloe/N23830_3.jpg', 3, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000130, 23830, 'img/ale_aloe/N23830_4.jpg', 4, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000131, 23830, 'img/ale_aloe/N23830_5.jpg', 5, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000132, 23830, 'img/ale_aloe/N23830_6.jpg', 6, '2017-05-25 14:45:29', '2017-05-25 14:45:29'),
(0000139, 23832, 'img/ale_aloe/N23832_1.jpg', 1, '2017-05-25 14:45:30', '2017-05-25 14:45:30'),
(0000140, 23832, 'img/ale_aloe/N23832_2.jpg', 2, '2017-05-25 14:45:30', '2017-05-25 14:45:30'),
(0000141, 23832, 'img/ale_aloe/N23832_3.jpg', 3, '2017-05-25 14:45:30', '2017-05-25 14:45:30'),
(0000142, 23832, 'img/ale_aloe/N23832_4.jpg', 4, '2017-05-25 14:45:30', '2017-05-25 14:45:30'),
(0000143, 23832, 'img/ale_aloe/N23832_5.jpg', 5, '2017-05-25 14:45:30', '2017-05-25 14:45:30'),
(0000144, 23832, 'img/ale_aloe/N23832_6.jpg', 6, '2017-05-25 14:45:30', '2017-05-25 14:45:30'),
(0000239, 10001, 'img/ale_aloe/10001_98.jpg', 1, '2017-06-08 20:14:23', '2017-06-08 20:16:14'),
(0000241, 10001, 'img/ale_aloe/10001_100.jpg', 3, '2017-06-08 20:14:23', '2017-06-08 20:14:23'),
(0000242, 10001, 'img/ale_aloe/10001_101.jpg', 4, '2017-06-08 20:14:23', '2017-06-08 20:14:23'),
(0000245, 10001, 'img/ale_aloe/10001_104.jpg', 6, '2017-06-08 20:14:50', '2017-06-08 20:16:14'),
(0000246, 10001, 'img/ale_aloe/10001_105.jpg', 5, '2017-06-08 20:15:42', '2017-06-08 20:15:42'),
(0000247, 10001, 'img/ale_aloe/10001_106.jpg', 2, '2017-06-08 20:15:42', '2017-06-08 20:16:14'),
(0000248, 10006, 'img/ale_aloe/10006_19.jpg', 2, '2017-06-30 15:20:43', '2017-06-30 15:22:05'),
(0000249, 10006, 'img/ale_aloe/10006_20.jpg', 4, '2017-06-30 15:20:43', '2017-06-30 15:22:19'),
(0000250, 10006, 'img/ale_aloe/10006_21.jpg', 3, '2017-06-30 15:20:43', '2017-06-30 15:22:05'),
(0000252, 10006, 'img/ale_aloe/10006_23.jpg', 5, '2017-06-30 15:20:43', '2017-06-30 15:20:43'),
(0000253, 10006, 'img/ale_aloe/10006_24.jpg', 1, '2017-06-30 15:20:43', '2017-06-30 15:22:19');

-- --------------------------------------------------------

--
-- Table structure for table item_status
--

DROP TABLE IF EXISTS item_status;
CREATE TABLE item_status (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `status` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table item_status
--

INSERT INTO item_status (id, `status`, description) VALUES
(01, 'Pending Review', 'Item has been flagged as complete, pending final review.'),
(02, 'Scrap', 'Item has been flagged for disposal.'),
(03, 'Out of Stock', 'Item has been sold or otherwise removed from inventory.'),
(04, 'Lost', 'Item cannot be located.'),
(05, 'Reassess', 'Item requires revised/additional data for completion.'),
(06, 'Normal', 'Item with no special status.'),
(07, 'HVE', 'High Value Equipment.'),
(08, 'Incomplete', 'Item is missing data. Pending completion.');

-- --------------------------------------------------------

--
-- Table structure for table item_track
--

DROP TABLE IF EXISTS item_track;
CREATE TABLE item_track (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `track` varchar(80) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `suffix` varchar(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table item_track
--

INSERT INTO item_track (id, track, description, suffix) VALUES
(01, 'ALOE', 'Items to be sold via the eBay store.', 'A'),
(02, 'Novartis', 'Items owned by Novartis which are not to be sold on ALOE or listed on EMP.', 'N'),
(04, 'EMP', 'Items from Novartis to be listed on their electronic marketplace.', 'N'),
(05, 'Novartis/ALOE', 'Items acquired through Novartis, to be sold via the ALOE eBay store.', 'AN'),
(06, 'Consignment', 'Items to be sold by ALE, consigned by a 3rd party.', 'C'),
(08, 'ALE', 'Items to by sold by ALE. Usually high-value items, or items used in laboratory automation.', '');

-- --------------------------------------------------------

--
-- Table structure for table leads
--

DROP TABLE IF EXISTS leads;
CREATE TABLE leads (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `street_addr` varchar(255) DEFAULT NULL,
  `city` smallint(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `state` smallint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `country` tinyint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table leads
--

INSERT INTO leads (id, fname, lname, email, phone, street_addr, city, state, postal_code, country, newsletter, `status`, date_added, last_update) VALUES
(0000000002, 'Jack', 'Brown', 'jack@atlanticlabequipment.com', '9783984229', NULL, NULL, NULL, NULL, NULL, 0, 0, '2017-04-07 14:49:33', '2017-05-04 21:24:38'),
(0000000003, 'John', 'Doe', 'john@example.com', '978-555-5555', NULL, NULL, NULL, NULL, NULL, 1, 0, '2017-04-12 15:20:14', '2017-05-02 18:46:58'),
(0000000004, 'Victoria', 'Jackson', 'victoria@atlanticlabequipment.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2017-04-25 22:00:46', '2017-05-02 18:46:58'),
(0000000005, 'Hoss', 'Malati', 'Mhshirazi110@gmail.com', '9145624040', NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-02 18:30:28', '2017-05-02 18:30:28'),
(0000000006, 'Thomas', 'Schwartz', 'tus@mit.edu', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-05 13:34:08', '2017-05-05 13:34:08'),
(0000000007, 'Andrew', 'Barry', 'Barrya@neb.com', '9783807441', NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-07 18:50:36', '2017-05-07 18:50:36'),
(0000000008, 'tim', 'McLaren', 'tmclaren@sorensongenomics.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-08 16:03:06', '2017-05-08 16:03:06'),
(0000000009, 'Don', 'Huffman', 'dhuffman@invivoscribe.com', '8582246600', NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-08 19:14:42', '2017-05-08 19:14:42'),
(0000000010, '180', 'fusion', 'test@180fusion.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-10 06:56:47', '2017-05-10 06:56:47'),
(0000000011, 'Marie-Claude', 'Mathieu', 'mcmathieu@reparerx.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-11 12:25:38', '2017-05-17 14:11:33'),
(0000000012, 'Aaron', 'Belli', 'aaron.belli@umassmed.edu', '617-474-3265', NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-12 12:49:58', '2017-05-12 12:49:58'),
(0000000013, 'terry', 'young', 'y.terry@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-12 23:28:29', '2017-05-12 23:28:29'),
(0000000014, 'David', 'Vocadlo', 'davidvoc@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-14 06:07:06', '2017-05-14 08:07:26'),
(0000000015, 'Peter', 'Horevaj', 'peter.horevaj@pioneer.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-17 18:01:53', '2017-05-17 18:01:53'),
(0000000016, 'Max ', 'Williams', 'seo2@googlepositions.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-22 12:08:43', '2017-05-22 12:08:43'),
(0000000017, 'Tom', 'Cujec', 'cujecth@lilly.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-23 19:53:46', '2017-05-23 19:53:46');

-- --------------------------------------------------------

--
-- Table structure for table listing_category
--

DROP TABLE IF EXISTS listing_category;
CREATE TABLE listing_category (
  `listingID` mediumint(7) UNSIGNED ZEROFILL NOT NULL,
  `categoryID` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table listing_category
--

INSERT INTO listing_category (listingID, categoryID) VALUES
(0000001, 00060),
(0000002, 00060),
(0000003, 00008),
(0000004, 00008),
(0000005, 00009),
(0000006, 00009),
(0000007, 00001),
(0000008, 00001),
(0000009, 00003),
(0000010, 00003),
(0000011, 00003),
(0000012, 00003),
(0000013, 00003),
(0000014, 00003),
(0000015, 00003),
(0000016, 00003),
(0000017, 00003),
(0000017, 00006),
(0000019, 00067),
(0000023, 00009),
(0000024, 00067),
(0000025, 00067),
(0000026, 00067),
(0000027, 00001),
(0000028, 00001),
(0000031, 00008),
(0000033, 00002),
(0000033, 00012),
(0000034, 00001),
(0000039, 00067),
(0000040, 00001),
(0000041, 00001),
(0000042, 00009),
(0000043, 00001),
(0000044, 00001),
(0000045, 00001),
(0000046, 00001),
(0000047, 00002),
(0000048, 00007),
(0000049, 00005),
(0000050, 00005),
(0000051, 00002),
(0000052, 00005),
(0000053, 00005),
(0000054, 00005),
(0000055, 00001),
(0000056, 00005),
(0000057, 00005),
(0000058, 00005),
(0000059, 00003),
(0000059, 00005),
(0000060, 00003),
(0000061, 00003);

-- --------------------------------------------------------

--
-- Table structure for table manufacturers
--

DROP TABLE IF EXISTS manufacturers;
CREATE TABLE manufacturers (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `mnfr` varchar(35) NOT NULL,
  `subitem_of` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table manufacturers
--

INSERT INTO manufacturers (id, mnfr, subitem_of, time_added, reviewed, active) VALUES
(00001, 'EPPENDORF', 00001, '2017-03-13 13:31:54', 1, 1),
(00002, 'AGILENT', 00002, '2017-03-13 20:03:02', 1, 1),
(00003, 'SARTORIUS STEDIM', 00003, '2017-03-20 21:24:22', 1, 1),
(00004, 'TECAN', 00004, '2017-03-21 17:53:20', 1, 1),
(00005, 'BIOTEK', 00005, '2017-03-21 17:53:20', 1, 1),
(00006, 'HAMILTON', 00006, '2017-03-21 19:28:44', 1, 1),
(00007, 'WATERS', 00007, '2017-03-30 15:35:50', 1, 1),
(00008, 'ABI', 00008, '2017-04-28 13:37:48', 1, 1),
(00009, 'BECKMAN COULTER', 00009, '2017-04-28 13:38:17', 1, 1),
(00011, 'ILLUMINA', 00015, '2017-04-28 13:42:12', 1, 1),
(00012, 'HETTICH', 00010, '2017-04-28 13:42:30', 1, 1),
(00013, 'LABCYTE', 00003, '2017-04-28 13:42:45', 1, 1),
(00014, 'MOLECULAR DEVICES', 00013, '2017-04-28 13:43:01', 1, 1),
(00015, 'PERKIN ELMER', 00014, '2017-04-28 13:43:35', 1, 1),
(00016, 'THERMO SCIENTIFIC', 00012, '2017-04-28 13:43:55', 1, 1),
(00017, 'ANDREW ALLIANCE', 00003, '2017-05-04 15:53:46', 1, 1),
(00018, 'BROOKS AUTOMATION', 00003, '2017-05-04 15:53:46', 1, 1),
(00019, 'AB SCIEX', 00003, '2017-05-09 13:27:36', 1, 1),
(00020, 'EDC BIOSYSTEMS', 00003, '2017-05-09 13:37:32', 1, 1),
(00021, 'SHIMADZU', 00016, '2017-05-12 19:54:00', 1, 1),
(00022, 'BRUKER', 00003, '2017-05-12 19:54:00', 1, 1),
(00023, 'DAKO', 00003, '2017-05-24 21:33:12', 1, 1),
(00024, 'VWR', 00018, '2017-05-24 21:33:13', 1, 1),
(00025, 'TAYLOR WHARTON', 00003, '2017-05-24 21:33:13', 1, 1),
(00030, 'FISHER', 00003, '2017-06-22 14:46:11', 0, 1),
(00033, 'ZEISS', 00003, '2017-06-22 15:31:40', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table migrator_error
--

DROP TABLE IF EXISTS migrator_error;
CREATE TABLE migrator_error (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `asset` varchar(30) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table migrator_error
--

INSERT INTO migrator_error (id, `type`, asset, note) VALUES
(00001, 'Failed Record', 'N23831', 'Itemlist: execute() failed: Column ''reviewed'' cannot be null'),
(00002, 'Failed Record', 'N23830', 'Itemlist: execute() failed: Column ''reviewed'' cannot be null'),
(00003, 'Failed Record', 'N23832', 'Itemlist: execute() failed: Column ''reviewed'' cannot be null');

-- --------------------------------------------------------

--
-- Table structure for table mnfr_brand
--

DROP TABLE IF EXISTS mnfr_brand;
CREATE TABLE mnfr_brand (
  `mnfrID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `brandID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table mnfr_brand
--

INSERT INTO mnfr_brand (mnfrID, brandID, active, time_added) VALUES
(00002, 00001, 1, '2017-06-09 18:50:00');

-- --------------------------------------------------------

--
-- Table structure for table models
--

DROP TABLE IF EXISTS models;
CREATE TABLE models (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `model` varchar(60) NOT NULL,
  `function_desc` varchar(60) DEFAULT NULL,
  `description` text,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table models
--

INSERT INTO models (id, model, function_desc, description, time_added, reviewed, active) VALUES
(00001, 'DASGIP Benchtop Bioreactor', 'for Cell Culture', NULL, '2017-03-16 15:18:29', 1, 1),
(00002, 'ambr 15', 'Cell Culture Automated Micro Bioreactor, 10-15mL', NULL, '2017-03-20 21:28:14', 1, 1),
(00003, 'M200', 'Plate Reader', 'Teuia\n\nKAsjAsd\n\nAKsdWAIr!)@#I$)#Q04!@#$%^&*()_+=-{}[]":;''|\\?><,./', '2017-03-21 17:55:56', 1, 1),
(00004, 'Synergy 2', 'Plate Reader', NULL, '2017-03-21 17:55:56', 1, 1),
(00005, 'Hydroflex', 'Strip Washer', NULL, '2017-03-21 17:59:25', 1, 1),
(00006, 'ELx405', 'Plate Washer', NULL, '2017-03-21 17:59:25', 1, 1),
(00007, 'Microlab STAR', 'Automated Liquid Handler', NULL, '2017-03-21 19:32:07', 1, 1),
(00008, 'Microlab STARlet', 'Automated Liquid Handler', NULL, '2017-03-21 19:32:07', 1, 1),
(00009, '2414', 'Refractive Index (RI) Detector', NULL, '2017-03-30 17:25:11', 1, 1),
(00010, '2424', 'Evaporative Light Scattering (ELS) Detector', NULL, '2017-03-30 17:25:11', 1, 1),
(00011, '2465', 'Electrochemical Detector for HPLC Systems', NULL, '2017-03-30 17:25:11', 1, 1),
(00012, '2475', 'Fluorescence (FLR) Detector', NULL, '2017-03-30 17:25:11', 1, 1),
(00013, '2489', 'UV/Visible (UV/Vis) Detector', NULL, '2017-03-30 17:25:11', 1, 1),
(00014, '3730xl', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00015, '3500xl', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00016, '7500 Fast real Time PCR', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00017, '9700 Fast Real Time PCR', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00018, 'ViiA7', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00019, 'NXP', 'Liquid Handling Automation Workstation', NULL, '2017-04-28 13:30:19', 1, 1),
(00020, 'FXP', 'Liquid Handling Automation Workstation', NULL, '2017-04-28 13:30:19', 1, 1),
(00021, 'HiSeq 2500 v4', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00022, 'MiSeq', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00023, 'NextSeq', 'DNA Sequencer', NULL, '2017-04-28 13:30:19', 1, 1),
(00024, 'Echo 550', 'Liquid Handler', NULL, '2017-04-28 13:30:19', 1, 1),
(00025, 'Echo 555', 'Liquid Handler', NULL, '2017-04-28 13:30:19', 1, 1),
(00026, 'PlateLoc', 'Plate Sealer', NULL, '2017-04-28 13:30:19', 1, 1),
(00027, 'Bravo', 'Liquid Handler', NULL, '2017-04-28 13:47:42', 1, 1),
(00028, 'Vspin', 'Centrifuge', NULL, '2017-04-28 13:47:42', 1, 1),
(00029, 'Freedom EVO 100', 'Liquid Handler', NULL, '2017-05-04 15:39:52', 1, 1),
(00030, 'Andrew', 'Liquid Handling Robot', NULL, '2017-05-04 16:02:03', 1, 1),
(00031, 'XPeel', 'Automated Microplate Seal Remover', NULL, '2017-05-04 16:02:03', 1, 1),
(00032, 'BenchCel 4R', 'Microplate Handler', NULL, '2017-05-04 16:02:03', 1, 1),
(00033, 'TripleTOF 5600+', 'LC-MS/MS System', NULL, '2017-05-09 13:36:35', 1, 1),
(00034, '4000 QTRAP', 'LC-MS/MS System', NULL, '2017-05-09 13:36:35', 1, 1),
(00035, 'ATS', 'Acoustic Liquid Dispenser', NULL, '2017-05-09 13:36:35', 1, 1),
(00036, 'SQ Detector 2', 'Single Quadrupole Mass Spectrometer', NULL, '2017-05-09 13:36:35', 1, 1),
(00037, 'MicroMass LCT Premier', 'Mass Spectrometer', NULL, '2017-05-09 13:36:35', 1, 1),
(00038, 'MicroMass LCT Premier XE', 'Mass Spectrometer', NULL, '2017-05-09 13:36:35', 1, 1),
(00039, 'API 4000', 'LC-MS/MS System', NULL, '2017-05-12 20:00:05', 1, 1),
(00040, 'ultrafleXtreme', 'MALDI-TOF/TOF Mass Spectrometer', NULL, '2017-05-12 20:00:05', 1, 1),
(00041, 'Xevo QTof', 'Mass Spectrometer', NULL, '2017-05-12 20:00:05', 1, 1),
(00042, 'PTLink', 'Link Rinse Station', 'PT Link allows the entire pre-treatment process of deparaffinization, rehydration and epitope retrieval to be combined into a well-documented, 3-in-1 specimen preparation procedure. \n\nWith PT Link, pathology laboratories can maximize productivity by reducing the number of operations needed in the pre-treatment process, while saving time by using the same slide rack from pre-treatment all the way through the immunohistochemical staining. Quality control reports from the pre-treatment process can be printed directly from the user-friendly software, while additional confidence in the procedures come from features such as no-boil option and low-fluid warning at 5 mm below the frosted label area of a slide. \n\nOptions such as delayed start and preheat mode provides the flexibility that is required to make pre-treatment work in parallel with other processes.', '2017-05-24 21:33:12', 1, 1),
(00043, 'WB10', 'Digital Water Bath', NULL, '2017-05-24 21:33:13', 1, 1),
(00044, 'Kryos', 'Cryostorage System', '', '2017-05-24 21:33:13', 1, 1),
(00049, '100', NULL, NULL, '2017-06-22 14:46:11', 0, 1),
(00052, 'Axiofors', NULL, NULL, '2017-06-22 15:31:40', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table model_brand
--

DROP TABLE IF EXISTS model_brand;
CREATE TABLE model_brand (
  `modelID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `brandID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table model_mnfr
--

DROP TABLE IF EXISTS model_mnfr;
CREATE TABLE model_mnfr (
  `modelID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `mnfrID` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table model_mnfr
--

INSERT INTO model_mnfr (modelID, mnfrID, active, time_added) VALUES
(00001, 00001, 1, '2017-03-16 15:19:14'),
(00002, 00003, 1, '2017-03-20 21:30:15'),
(00003, 00004, 1, '2017-03-21 17:58:12'),
(00004, 00005, 1, '2017-03-21 17:58:12'),
(00005, 00004, 1, '2017-03-21 18:00:49'),
(00006, 00005, 1, '2017-03-21 18:00:49'),
(00006, 00024, 1, '2017-06-09 13:59:28'),
(00007, 00006, 1, '2017-03-21 19:33:11'),
(00008, 00006, 1, '2017-03-21 19:33:11'),
(00008, 00007, 1, '2017-03-30 17:26:51'),
(00009, 00007, 1, '2017-03-30 17:26:51'),
(00010, 00007, 1, '2017-03-30 17:26:51'),
(00011, 00007, 1, '2017-03-30 17:26:51'),
(00012, 00007, 1, '2017-03-30 17:26:51'),
(00043, 00024, 1, '2017-06-09 13:59:28'),
(00044, 00025, 1, '2017-06-29 20:11:25'),
(00052, 00033, 1, '2017-06-27 16:38:16');

-- --------------------------------------------------------

--
-- Table structure for table persistences
--

DROP TABLE IF EXISTS persistences;
CREATE TABLE persistences (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table persistences
--

INSERT INTO persistences (id, user_id, `code`, created_at, updated_at) VALUES
(2, 2, 'S3wD2KYDXWzNRFdcqHdrUxsxYDmZtvdb', '2017-06-26 15:59:07', '2017-06-26 15:59:07'),
(3, 2, 'a3QOuC9MzWCA5e2IKSs6hrrykx4LfvXU', '2017-06-26 18:33:02', '2017-06-26 18:33:02'),
(4, 2, 'CtjCOeL1dl3gd7Mfs7SPT4BWDf3ryctZ', '2017-06-26 20:23:56', '2017-06-26 20:23:56'),
(12, 2, 'eu5ks5dnTttdJABXBnYH71TwGOHgHxB5', '2017-06-27 14:41:27', '2017-06-27 14:41:27'),
(15, 2, 'ObjkuuRNwrF1TmguSUAYlgkzGkOlTh6r', '2017-06-27 16:10:28', '2017-06-27 16:10:28'),
(16, 2, 'opRpZjD5Uw2XYGPPPMMidAOVDL5x4DCa', '2017-06-27 16:14:01', '2017-06-27 16:14:01'),
(17, 2, 'spKGz5qGB010bmwpsIH1I03o6Jog2vTj', '2017-06-27 16:14:54', '2017-06-27 16:14:54'),
(18, 2, 'EiETYyQ1mVC8ASifncSeAKK80G9AHI4t', '2017-06-27 16:28:53', '2017-06-27 16:28:53'),
(19, 2, 'SFzMhnDquglgM99d4x3BqFuYcSOK5Oyk', '2017-06-27 17:04:23', '2017-06-27 17:04:23'),
(20, 2, 'uHrhfbY0MXF9Ga1IwyJ7CggKtWcfYbvd', '2017-06-27 17:08:36', '2017-06-27 17:08:36'),
(23, 2, '68faKmskXiIBqgWeJxoAF0eKFyeTpcU0', '2017-06-27 17:43:13', '2017-06-27 17:43:13'),
(29, 2, 'YHAmBK3lGAqpKZPbm2wLkwOZjlmoOYwR', '2017-06-27 18:01:10', '2017-06-27 18:01:10'),
(30, 2, 'uSyXM1wU4nNWLgCXoRpoBQOgmd7fSTMO', '2017-06-27 19:29:16', '2017-06-27 19:29:16'),
(32, 2, '5B31e7Bpf9zDtaw3TGdHUFq79dbeIDrI', '2017-06-27 19:36:09', '2017-06-27 19:36:09'),
(33, 2, 'vQApJ8azTK1uSbxEx7VDnaUWz9pRyqYX', '2017-06-27 20:08:24', '2017-06-27 20:08:24'),
(34, 2, 'b0IEBvOu1Ude5QlAHPCFWm3HI2zhbuW3', '2017-06-27 20:11:14', '2017-06-27 20:11:14'),
(35, 2, '1aI8cuoyWCAySLFHc4p2a8y3cd5Po8Mz', '2017-06-27 20:25:52', '2017-06-27 20:25:52'),
(36, 2, 'h9xBLSU7g6jRFaSrimTc1bNuKJ0mYh8N', '2017-06-27 20:27:46', '2017-06-27 20:27:46'),
(37, 2, 'oHtPec0zhaaoGkDH5SI5NgBCvtkEkqrZ', '2017-06-27 21:03:58', '2017-06-27 21:03:58'),
(38, 2, 'z8lLVEVYr5mCppxZ0fn4qEIF2IZihtKu', '2017-06-27 21:07:24', '2017-06-27 21:07:24'),
(39, 2, 'xwbH27aPE6tGeA0QxSZCC2rsXSTdl9kz', '2017-06-27 21:13:42', '2017-06-27 21:13:42'),
(40, 2, '6vMJNYAi7VBnWaRhAf9bcPLqQFSZJkzh', '2017-06-27 21:37:24', '2017-06-27 21:37:24'),
(41, 2, 'vRIZtnkyB3KeWUzlpOeNEU7UhFFAt4Cn', '2017-06-27 21:38:32', '2017-06-27 21:38:32'),
(43, 2, 'Ad5D8Ekh2AUvGtnkJrlXSK2MQFKwQ7s6', '2017-06-28 12:46:43', '2017-06-28 12:46:43'),
(44, 2, 'vBvaOZzu9XnbR3HgAVrwwTIrThysXt6S', '2017-06-28 12:52:56', '2017-06-28 12:52:56'),
(46, 2, 'fyNvmxHAb09G66uFIMnEBYxdHLVIycNj', '2017-06-28 20:21:05', '2017-06-28 20:21:05'),
(48, 2, 'PAp4pKgxvjotPUed82Jnl76FTqPpWWfE', '2017-06-29 13:41:23', '2017-06-29 13:41:23'),
(49, 2, 'eTK9fex7q30Ptapev2NxXPkJIwL5mJhF', '2017-06-29 15:58:09', '2017-06-29 15:58:09'),
(50, 2, '1Lu046LcqW8MuBarmA4vYA04rHpKMLuT', '2017-06-29 16:00:47', '2017-06-29 16:00:47'),
(51, 2, 'qTmG42NDvRgAZe3kO3YoBI59L6m7zQ24', '2017-06-29 16:04:13', '2017-06-29 16:04:13'),
(52, 2, 'C5IivvWPJadRpGNgKAjTIrjbSoo1SrQw', '2017-06-29 16:07:03', '2017-06-29 16:07:03'),
(53, 2, 'T9oEDxOm91dD7dok0g7coepGDWP2An1Q', '2017-06-29 16:18:09', '2017-06-29 16:18:09'),
(54, 2, 'QwuK0TVCLrOly1j7JtCUxtqWU2k0E2G6', '2017-06-29 16:22:02', '2017-06-29 16:22:02'),
(55, 2, 'IHwiQtKqy4MishIucRdSX0QCVeCv1jeo', '2017-06-29 16:36:44', '2017-06-29 16:36:44'),
(56, 2, 'YOgazwGbzRrCUV9uEV3eGXVkiHPNJoQ3', '2017-06-29 16:42:00', '2017-06-29 16:42:00'),
(57, 2, 'qZYT2TX5XtC6KiT2XGhXXAURXI4iukOU', '2017-06-29 16:53:34', '2017-06-29 16:53:34'),
(58, 2, '4UbHSjOiTFqHZgu6yDGmFELaYl8NR1og', '2017-06-29 16:59:15', '2017-06-29 16:59:15'),
(59, 2, 'rAvUv04x5yB707ZqlS896bvB8w8ecJuk', '2017-06-29 17:03:58', '2017-06-29 17:03:58'),
(60, 2, 'hVmJHQviBtbCfNYwqdzDoGn6XOM7BMfX', '2017-06-29 17:04:32', '2017-06-29 17:04:32'),
(61, 2, 'wZWLlv0Ak3nxrBcCwBzOCpqaExl2nLLg', '2017-06-29 17:04:50', '2017-06-29 17:04:50'),
(62, 2, '5A1StgB9plGlP5OintCdapZV40lNZd7W', '2017-06-29 19:19:16', '2017-06-29 19:19:16'),
(63, 2, 'Mi62SjyPDGyqh4gvhocz5JeLfmcS6WBM', '2017-06-29 20:08:05', '2017-06-29 20:08:05'),
(64, 2, '2DsfKA52IkyPEuXhY3xLeAirp655rsOS', '2017-06-29 20:30:43', '2017-06-29 20:30:43'),
(65, 2, 'ddBSVdv62ZUuFtlM74ODV3UPTwPsQql2', '2017-06-29 21:12:57', '2017-06-29 21:12:57'),
(66, 2, 'j8Kze1hJWhciLtgIuVL36kYGuYK6TIeE', '2017-06-30 13:18:06', '2017-06-30 13:18:06'),
(67, 2, '9SMAccfktDs2ETARZnflTcm6e6NNcsyG', '2017-06-30 13:26:39', '2017-06-30 13:26:39'),
(68, 2, 'hOr7vHO21yycU9Zr6c9uvxqNQ94Y7gzM', '2017-06-30 13:36:18', '2017-06-30 13:36:18'),
(69, 2, 'WLZau3OvIgYJckQszeAzPsWtgsCZogCU', '2017-06-30 15:01:03', '2017-06-30 15:01:03'),
(70, 2, 'dQkwJpp8Z4L4hDbAxcoRQ7EAu8bCQKCk', '2017-06-30 15:04:21', '2017-06-30 15:04:21'),
(71, 2, 'xdAdiQbTCb15lzcD4IMni7o6Z4Xk6AAe', '2017-06-30 15:17:08', '2017-06-30 15:17:08'),
(72, 2, 'zyT3xfSZqlwbudtkSIyy0w4H2XZtOda0', '2017-06-30 16:20:23', '2017-06-30 16:20:23');

-- --------------------------------------------------------

--
-- Table structure for table reminders
--

DROP TABLE IF EXISTS reminders;
CREATE TABLE reminders (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table roles
--

DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table roles
--

INSERT INTO roles (id, slug, `name`, permissions, created_at, updated_at) VALUES
(1, 'admin', 'Admin', '{"user.delete":true,"user.create":true,"user.view":true,"user.update":true,"itemlist.delete":true}', '2017-06-26 15:53:54', '2017-06-26 20:17:55');

-- --------------------------------------------------------

--
-- Table structure for table role_users
--

DROP TABLE IF EXISTS role_users;
CREATE TABLE role_users (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table role_users
--

INSERT INTO role_users (user_id, role_id, created_at, updated_at) VALUES
(2, 1, '2017-06-26 15:56:49', '2017-06-26 15:56:49');

-- --------------------------------------------------------

--
-- Table structure for table shipping_class
--

DROP TABLE IF EXISTS shipping_class;
CREATE TABLE shipping_class (
  `id` tinyint(1) UNSIGNED ZEROFILL NOT NULL,
  `shipping_class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table shipping_class
--

INSERT INTO shipping_class (id, shipping_class) VALUES
(1, 'LAB-SM'),
(2, 'LAB-MED'),
(3, 'LAB-LG'),
(4, 'LAB-XL'),
(5, 'LAB-LTL');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS status;
CREATE TABLE `status` (
  `aleAsset` mediumint(5) UNSIGNED NOT NULL,
  `status` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `modified_by` smallint(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (aleAsset, `status`, modified_by, date_added) VALUES
(10001, 07, NULL, '2017-06-09 13:38:45'),
(10001, 08, NULL, '2017-06-22 21:01:17'),
(10003, 08, NULL, '2017-06-27 16:38:16'),
(10004, 08, NULL, '2017-06-27 16:38:16'),
(10005, 08, NULL, '2017-06-27 16:38:16'),
(10006, 08, NULL, '2017-06-27 16:38:17'),
(10007, 08, NULL, '2017-06-27 16:38:17'),
(10008, 08, NULL, '2017-06-27 16:38:17'),
(10009, 08, NULL, '2017-06-27 16:38:17'),
(10010, 08, NULL, '2017-06-27 16:38:17'),
(10011, 08, NULL, '2017-06-27 16:38:17'),
(10012, 08, NULL, '2017-06-27 16:38:17'),
(23830, 02, NULL, '2017-06-05 20:47:59'),
(23830, 04, NULL, '2017-06-05 20:47:59');

-- --------------------------------------------------------

--
-- Table structure for table subitem_of
--

DROP TABLE IF EXISTS subitem_of;
CREATE TABLE subitem_of (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `subitem_of` varchar(60) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table subitem_of
--

INSERT INTO subitem_of (id, subitem_of, time_added, reviewed, active) VALUES
(00001, 'EPPENDORF', '2017-03-13 13:30:24', 1, 1),
(00002, 'AGILENT', '2017-03-13 19:18:18', 1, 1),
(00003, 'OTHER', '2017-03-20 21:21:33', 1, 1),
(00004, 'TECAN', '2017-03-21 17:51:42', 1, 1),
(00005, 'BIOTEK', '2017-03-21 17:51:42', 1, 1),
(00006, 'HAMILTON', '2017-03-21 19:28:00', 1, 1),
(00007, 'WATERS', '2017-03-30 15:34:49', 1, 1),
(00008, 'ABI', '2017-04-28 13:36:11', 1, 1),
(00009, 'BECKMAN COULTER', '2017-04-28 13:36:11', 1, 1),
(00010, 'HETTICH', '2017-04-28 13:36:11', 1, 1),
(00012, 'THERMO', '2017-04-28 13:36:11', 1, 1),
(00013, 'MOLECULAR DEVICES', '2017-04-28 13:36:11', 1, 1),
(00014, 'PE', '2017-04-28 13:36:58', 1, 1),
(00015, 'ILLUMINA', '2017-04-28 13:42:00', 1, 1),
(00016, 'SHIMADZU', '2017-05-12 19:52:09', 1, 1),
(00018, 'VWR', '2017-05-24 21:33:12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table support_tickets
--

DROP TABLE IF EXISTS support_tickets;
CREATE TABLE support_tickets (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `leadID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `type` varchar(15) NOT NULL,
  `message` text,
  `instrument` varchar(255) DEFAULT NULL,
  `info_req` varchar(80) DEFAULT NULL,
  `referrer` varchar(80) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table support_tickets
--

INSERT INTO support_tickets (id, leadID, `type`, message, instrument, info_req, referrer, `status`, date_added, last_update) VALUES
(0000000094, 0000000005, 'estimate', 'Also looking for NextSeq 550 1-3 units ', 'ILLUMINA NextSeq DNA Sequencer ', 'all', 'labx', 0, '2017-05-02 18:30:28', '2017-05-02 18:30:28'),
(0000000096, 0000000002, 'contact', 'This is another test of the mail system.', NULL, NULL, NULL, 0, '2017-05-02 19:04:53', '2017-05-02 19:04:53'),
(0000005200, 0000000002, 'contact', 'Sorry to bother you, I\\&#039;m just testing the message/online form system.', NULL, NULL, NULL, 0, '2017-05-04 19:24:38', '2017-05-04 19:24:38'),
(0000005201, 0000000006, 'contact', 'Hi there,\\nI need an AKTA P-900 pump unit for my lab to replace a defective one. \\nLet me know if you have one.\\nThank you,\\nThomas Schwartz.', NULL, NULL, NULL, 0, '2017-05-05 13:34:08', '2017-05-05 13:34:08'),
(0000005202, 0000000007, 'estimate', 'I\\&#039;m interested to understand the pricing of an Agilent Bravo, 96LT head.\\n\\nThanks,\\nAndrew', 'Agilent Bravo', 'all', 'other', 0, '2017-05-07 18:50:36', '2017-05-07 18:50:36'),
(0000005203, 0000000008, 'contact', 'Received a quote #8910 for x2 Bosch tables, but wouldn\\&#039;t let me access to view them. Can you send me a part number or better yet a link with picture and dimensions?', NULL, NULL, NULL, 0, '2017-05-08 16:03:06', '2017-05-08 16:03:06'),
(0000005204, 0000000009, 'estimate', NULL, 'ABI 3500xl DNA Sequencer ', 'pricing', 'Please select an option', 0, '2017-05-08 19:14:42', '2017-05-08 19:14:42'),
(0000005205, 0000000010, 'contact', 'For testing', NULL, NULL, NULL, 0, '2017-05-10 06:56:47', '2017-05-10 06:56:47'),
(0000005206, 0000000011, 'estimate', 'Hi, I am Marie-Claude Mathieu, Senior Scientist II at Repare Therapeutics, a start-up biotech company that will be launched in Montreal&rsquo;s (Canada) Technoparc in June 2017.   We are looking for a Biomek FXp instrument equipped with dual pod configuration: 96-well and span-8 heads.   Can you provide with additional information your Biomek instrument?  \\nPrice, instrument details, date of manufacture, for how long it has been used, who was the previous owner,  warranty offer,  cost of installation, shipment fees to Montreal/Canada ...  Thanks', 'BECKMAN COULTER FXP Liquid Handling Automation Workstation ', 'all', 'proRec', 0, '2017-05-11 12:25:38', '2017-05-11 12:25:38'),
(0000005207, 0000000012, 'estimate', 'We just got a used Tecan Evo-2 150 from BioSurplus and installed by Dave Mays. We need formal training on this unit (no one has used one), and would like help writing our first one or two protocols. We would like to arrange for several days of training. Thanks so much! Aaron', 'Tecan Evo-2 150 with LiHa and Roma', 'other', 'proRec', 0, '2017-05-12 12:49:58', '2017-05-12 12:49:58'),
(0000005208, 0000000013, 'estimate', NULL, 'ABI 3500xl DNA Sequencer ', 'pricing', 'googleAd', 0, '2017-05-12 23:28:29', '2017-05-12 23:28:29'),
(0000005209, 0000000014, 'estimate', 'Good morning,\\n\\nI am interested in a VSpin11 with automated plate loader. Could you please advise on the configuration of this instrument as well as the warranty that you offer?\\n\\nThank you,\\ndAvid\\n', 'AGILENT Velocity11 Vspin Centrifuge ', 'pricing', 'searchEngine', 0, '2017-05-14 06:07:06', '2017-05-14 06:07:06'),
(0000005210, 0000000014, 'estimate', 'Good morning,\\n\\nI am interested in a VSpin11 with automated plate loader. Could you please advise on the configuration of this instrument, the pricing, as well as the warranty that you offer?\\n\\nThank you,\\ndAvid\\n', 'AGILENT Velocity11 Vspin Centrifuge ', 'pricing', 'searchEngine', 0, '2017-05-14 06:07:26', '2017-05-14 06:07:26'),
(0000005211, 0000000011, 'estimate', 'Hi,\\n\\nCan I get the price and details about the BIOTEK ELx405 plate washer instrument?  Thanks.  Marie-Claude', 'BIOTEK ELx405 Plate Washer ', 'all', 'proRec', 0, '2017-05-17 12:11:33', '2017-05-17 12:11:33'),
(0000005212, 0000000015, 'estimate', 'This is old hood, 15  years, but functional, HEPA filter still certified - in very good condition. We would like to offer it in auction, but have no idea how much to ask for it.\\nThank you. ', '6ft wide laminar flow EdgeGard hood made by Baker Co (model EG-6320)', 'pricing', 'other', 0, '2017-05-17 18:01:53', '2017-05-17 18:01:53'),
(0000005213, 0000000016, 'contact', ' Hello and good morning\\n\\nI am Katie Smith Marketing Manager with a reputable online marketing company based in India.\\n\\nWe can fairly quickly promote your website to the top of the search rankings with no long term contracts!\\n\\nWe can place your website on top of the Natural Listings on Google, Yahoo and MSN. Our Search Engine Optimization team delivers more top rankings than anyone else and we can prove it. We do not use \\&quot;link farms\\&quot; or \\&quot;black hat\\&quot; methods that Google and the other search engines frown upon and can use to de-list or ban your site. The techniques are proprietary, involving some valuable closely held trade secrets. Our prices are less than half of what other companies charge.\\n\\nWe would be happy to send you a proposal using the top search phrases for your area of expertise. Please contact me at your convenience so we can start saving you some money.\\n\\nIn order for us to respond to your request for information, please include your company&rsquo;s website address (mandatory) and or phone number.\\n\\nSo let me know if you would like me to mail you more details or schedule a call. We\\&#039;ll be pleased to serve you.\\nI look forward to your mail.\\n\\nThanks and Regards\\nKatie Smith\\n', NULL, NULL, NULL, 0, '2017-05-22 12:08:43', '2017-05-22 12:08:43'),
(0000005214, 0000000017, 'estimate', 'Thank you for your help on this. Do you also sell the V-works software?\\nTom', 'AGILENT Velocity11 BenchCel 4R Microplate Handler ', 'all', 'proRec', 0, '2017-05-23 19:53:46', '2017-05-23 19:53:46');

-- --------------------------------------------------------

--
-- Table structure for table testing_status
--

DROP TABLE IF EXISTS testing_status;
CREATE TABLE testing_status (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `testing` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table testing_status
--

INSERT INTO testing_status (id, testing) VALUES
(01, 'Tested'),
(02, 'Not Tested'),
(03, 'Powers Up'),
(04, 'AS-IS');

-- --------------------------------------------------------

--
-- Table structure for table throttle
--

DROP TABLE IF EXISTS throttle;
CREATE TABLE throttle (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table users
--

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table users
--

INSERT INTO users (id, email, `password`, permissions, last_login, first_name, last_name, created_at, updated_at) VALUES
(2, 'jack@atlanticlabequipment.com', '$2y$10$HZgqaearZErKICXnYfhmK.HhER9vUQ7lthpjYBu3.t3HsWCTAqTYO', NULL, '2017-06-30 16:20:23', 'Jack', 'Brown', '2017-06-26 14:31:59', '2017-06-30 16:20:23'),
(4, 'adam@atlanticlabequipment.com', '$2y$10$TkX0r9PCFtkus/WZeDCiYu7RrNfophPn6WvJOV0vOoDXxBEJBiHJe', NULL, NULL, 'Null', 'User', '2017-06-26 18:18:22', '2017-06-26 18:18:22');

-- --------------------------------------------------------

--
-- Table structure for table us_states
--

DROP TABLE IF EXISTS us_states;
CREATE TABLE us_states (
  `id` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` char(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table us_states
--

INSERT INTO us_states (id, `name`, `code`, `status`) VALUES
(001, 'Alabama', 'AL', 1),
(002, 'Alaska', 'AK', 1),
(003, 'Arizona', 'AZ', 1),
(004, 'Arkansas', 'AR', 1),
(005, 'California', 'CA', 1),
(006, 'Colorado', 'CO', 1),
(007, 'Connecticut', 'CT', 1),
(008, 'Delaware', 'DE', 1),
(009, 'District of Columbia', 'DC', 1),
(010, 'Florida', 'FL', 1),
(011, 'Georgia', 'GA', 1),
(012, 'Hawaii', 'HI', 1),
(013, 'Idaho', 'ID', 1),
(014, 'Illinois', 'IL', 1),
(015, 'Indiana', 'IN', 1),
(016, 'Iowa', 'IA', 1),
(017, 'Kansas', 'KS', 1),
(018, 'Kentucky', 'KY', 1),
(019, 'Louisiana', 'LA', 1),
(020, 'Maine', 'ME', 1),
(021, 'Maryland', 'MD', 1),
(022, 'Massachusetts', 'MA', 1),
(023, 'Michigan', 'MI', 1),
(024, 'Minnesota', 'MN', 1),
(025, 'Mississippi', 'MS', 1),
(026, 'Missouri', 'MO', 1),
(027, 'Montana', 'MT', 1),
(028, 'Nebraska', 'NE', 1),
(029, 'Nevada', 'NV', 1),
(030, 'New Hampshire', 'NH', 1),
(031, 'New Jersey', 'NJ', 1),
(032, 'New Mexico', 'NM', 1),
(033, 'New York', 'NY', 1),
(034, 'North Carolina', 'NC', 1),
(035, 'North Dakota', 'ND', 1),
(036, 'Ohio', 'OH', 1),
(037, 'Oklahoma', 'OK', 1),
(038, 'Oregon', 'OR', 1),
(039, 'Pennsylvania', 'PA', 1),
(040, 'Rhode Island', 'RI', 1),
(041, 'South Carolina', 'SC', 1),
(042, 'South Dakota', 'SD', 1),
(043, 'Tennessee', 'TN', 1),
(044, 'Texas', 'TX', 1),
(045, 'Utah', 'UT', 1),
(046, 'Vermont', 'VT', 1),
(047, 'Virginia', 'VA', 1),
(048, 'Washington', 'WA', 1),
(049, 'West Virginia', 'WV', 1),
(050, 'Wisconsin', 'WI', 1),
(051, 'Wyoming', 'WY', 1);

-- --------------------------------------------------------

--
-- Table structure for table vendors
--

DROP TABLE IF EXISTS vendors;
CREATE TABLE vendors (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `vendor` varchar(80) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table vendors
--

INSERT INTO vendors (id, vendor, active, date_added) VALUES
(00001, 'Novartis Inst. of Biomedical Research', 1, '2017-05-24 21:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table activations
--
ALTER TABLE activations
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table adverts_listings
--
ALTER TABLE adverts_listings
  ADD PRIMARY KEY (`id`),
  ADD KEY `listingID` (`listingID`);

--
-- Indexes for table ad_photos
--
ALTER TABLE ad_photos
  ADD PRIMARY KEY (`id`),
  ADD KEY `gen_listing_photos_fk` (`listingID`);

--
-- Indexes for table ale_category
--
ALTER TABLE ale_category
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table asset_labels
--
ALTER TABLE asset_labels
  ADD PRIMARY KEY (`label_num`);

--
-- Indexes for table asset_type
--
ALTER TABLE asset_type
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table brands
--
ALTER TABLE brands
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_brand` (`brand`);
ALTER TABLE brands ADD FULLTEXT KEY `brand_ft` (`brand`);

--
-- Indexes for table cosmetic_status
--
ALTER TABLE cosmetic_status
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table default_fields
--
ALTER TABLE default_fields
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table emp
--
ALTER TABLE emp
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table emp_category
--
ALTER TABLE emp_category
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table emp_prev_owners
--
ALTER TABLE emp_prev_owners
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table emp_status
--
ALTER TABLE emp_status
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table field_map
--
ALTER TABLE field_map
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table general_listings
--
ALTER TABLE general_listings
  ADD PRIMARY KEY (`id`),
  ADD KEY `genlistings_mnfr` (`mnfrID`),
  ADD KEY `genlistings_model` (`modelID`),
  ADD KEY `genlistings_brand` (`brandID`);
ALTER TABLE general_listings ADD FULLTEXT KEY `genlist_desc` (`description`);
ALTER TABLE general_listings ADD FULLTEXT KEY `components_ft` (`components`);
ALTER TABLE general_listings ADD FULLTEXT KEY `title_extn_ft` (`title_extn`);
ALTER TABLE general_listings ADD FULLTEXT KEY `item_condition_ft` (`item_condition`);

--
-- Indexes for table inv_batch
--
ALTER TABLE inv_batch
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_batch` (`batch_name`);

--
-- Indexes for table itemlist
--
ALTER TABLE itemlist
  ADD PRIMARY KEY (`aleAsset`),
  ADD KEY `mnfr_item` (`mnfrID`),
  ADD KEY `model_item` (`modelID`),
  ADD KEY `brand_item` (`brandID`),
  ADD KEY `asset_track` (`track`),
  ADD KEY `asset_status` (`status`),
  ADD KEY `asset_batch` (`batch`),
  ADD KEY `asset_condition` (`item_condition`),
  ADD KEY `asset_testing` (`testing`),
  ADD KEY `asset_ship_class` (`ship_class`),
  ADD KEY `asset_cosmetic` (`cosmetic`),
  ADD KEY `itemlist_user` (`modified_by`);

--
-- Indexes for table item_accounting
--
ALTER TABLE item_accounting
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemlist_accounting` (`aleAsset`);

--
-- Indexes for table item_category
--
ALTER TABLE item_category
  ADD PRIMARY KEY (`aleAsset`,`category`),
  ADD KEY `fk_ic_category` (`category`);

--
-- Indexes for table item_condition
--
ALTER TABLE item_condition
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table item_photos
--
ALTER TABLE item_photos
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_photo` (`aleAsset`);

--
-- Indexes for table item_status
--
ALTER TABLE item_status
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table item_track
--
ALTER TABLE item_track
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table leads
--
ALTER TABLE leads
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_state` (`state`);

--
-- Indexes for table listing_category
--
ALTER TABLE listing_category
  ADD PRIMARY KEY (`listingID`,`categoryID`),
  ADD KEY `lc_category` (`categoryID`);

--
-- Indexes for table manufacturers
--
ALTER TABLE manufacturers
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mnfr` (`mnfr`),
  ADD UNIQUE KEY `unique_mnfr` (`mnfr`),
  ADD KEY `mnfr_subitem` (`subitem_of`);
ALTER TABLE manufacturers ADD FULLTEXT KEY `mnfr_ft` (`mnfr`);

--
-- Indexes for table migrator_error
--
ALTER TABLE migrator_error
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table mnfr_brand
--
ALTER TABLE mnfr_brand
  ADD PRIMARY KEY (`mnfrID`,`brandID`),
  ADD KEY `mnfr_brand_brand` (`brandID`);

--
-- Indexes for table models
--
ALTER TABLE models
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_model` (`model`);
ALTER TABLE models ADD FULLTEXT KEY `model_ft` (`model`);
ALTER TABLE models ADD FULLTEXT KEY `function_desc__ft` (`function_desc`);

--
-- Indexes for table model_brand
--
ALTER TABLE model_brand
  ADD PRIMARY KEY (`modelID`,`brandID`),
  ADD KEY `model_brand_brand` (`brandID`);

--
-- Indexes for table model_mnfr
--
ALTER TABLE model_mnfr
  ADD PRIMARY KEY (`modelID`,`mnfrID`),
  ADD KEY `model_mnfr_mnfr` (`mnfrID`);

--
-- Indexes for table persistences
--
ALTER TABLE persistences
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table reminders
--
ALTER TABLE reminders
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table roles
--
ALTER TABLE roles
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table role_users
--
ALTER TABLE role_users
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table shipping_class
--
ALTER TABLE shipping_class
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`aleAsset`,`status`),
  ADD KEY `status_to_status` (`status`);

--
-- Indexes for table subitem_of
--
ALTER TABLE subitem_of
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_subitem` (`subitem_of`);

--
-- Indexes for table support_tickets
--
ALTER TABLE support_tickets
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_lead` (`leadID`);

--
-- Indexes for table testing_status
--
ALTER TABLE testing_status
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table throttle
--
ALTER TABLE throttle
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table us_states
--
ALTER TABLE us_states
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table vendors
--
ALTER TABLE vendors
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_vendor` (`vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table activations
--
ALTER TABLE activations
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table adverts_listings
--
ALTER TABLE adverts_listings
  MODIFY `id` mediumint(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table ad_photos
--
ALTER TABLE ad_photos
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table ale_category
--
ALTER TABLE ale_category
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table asset_type
--
ALTER TABLE asset_type
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table brands
--
ALTER TABLE brands
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table cosmetic_status
--
ALTER TABLE cosmetic_status
  MODIFY `id` tinyint(1) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table default_fields
--
ALTER TABLE default_fields
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table emp
--
ALTER TABLE emp
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table emp_category
--
ALTER TABLE emp_category
  MODIFY `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table emp_prev_owners
--
ALTER TABLE emp_prev_owners
  MODIFY `id` smallint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table emp_status
--
ALTER TABLE emp_status
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table field_map
--
ALTER TABLE field_map
  MODIFY `id` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table general_listings
--
ALTER TABLE general_listings
  MODIFY `id` mediumint(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table inv_batch
--
ALTER TABLE inv_batch
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table item_accounting
--
ALTER TABLE item_accounting
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table item_condition
--
ALTER TABLE item_condition
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table item_photos
--
ALTER TABLE item_photos
  MODIFY `id` mediumint(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table item_status
--
ALTER TABLE item_status
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table item_track
--
ALTER TABLE item_track
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table leads
--
ALTER TABLE leads
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table manufacturers
--
ALTER TABLE manufacturers
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table migrator_error
--
ALTER TABLE migrator_error
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table models
--
ALTER TABLE models
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table persistences
--
ALTER TABLE persistences
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table reminders
--
ALTER TABLE reminders
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table roles
--
ALTER TABLE roles
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table shipping_class
--
ALTER TABLE shipping_class
  MODIFY `id` tinyint(1) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table subitem_of
--
ALTER TABLE subitem_of
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table support_tickets
--
ALTER TABLE support_tickets
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5215;
--
-- AUTO_INCREMENT for table testing_status
--
ALTER TABLE testing_status
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table throttle
--
ALTER TABLE throttle
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table us_states
--
ALTER TABLE us_states
  MODIFY `id` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table vendors
--
ALTER TABLE vendors
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table adverts_listings
--
ALTER TABLE adverts_listings
  ADD CONSTRAINT `adverts_listings_ibfk_1` FOREIGN KEY (`listingID`) REFERENCES general_listings (`id`);

--
-- Constraints for table ad_photos
--
ALTER TABLE ad_photos
  ADD CONSTRAINT `gen_listing_photos_fk` FOREIGN KEY (`listingID`) REFERENCES general_listings (`id`);

--
-- Constraints for table general_listings
--
ALTER TABLE general_listings
  ADD CONSTRAINT `genlistings_brand` FOREIGN KEY (`brandID`) REFERENCES brands (`id`),
  ADD CONSTRAINT `genlistings_mnfr` FOREIGN KEY (`mnfrID`) REFERENCES manufacturers (`id`),
  ADD CONSTRAINT `genlistings_model` FOREIGN KEY (`modelID`) REFERENCES models (`id`);

--
-- Constraints for table itemlist
--
ALTER TABLE itemlist
  ADD CONSTRAINT `asset_batch` FOREIGN KEY (`batch`) REFERENCES inv_batch (`id`),
  ADD CONSTRAINT `asset_condition` FOREIGN KEY (`item_condition`) REFERENCES item_condition (`id`),
  ADD CONSTRAINT `asset_cosmetic` FOREIGN KEY (`cosmetic`) REFERENCES cosmetic_status (`id`),
  ADD CONSTRAINT `asset_ship_class` FOREIGN KEY (`ship_class`) REFERENCES shipping_class (`id`),
  ADD CONSTRAINT `asset_status` FOREIGN KEY (`status`) REFERENCES item_status (`id`),
  ADD CONSTRAINT `asset_testing` FOREIGN KEY (`testing`) REFERENCES testing_status (`id`),
  ADD CONSTRAINT `asset_track` FOREIGN KEY (`track`) REFERENCES item_track (`id`),
  ADD CONSTRAINT `brand_item` FOREIGN KEY (`brandID`) REFERENCES brands (`id`),
  ADD CONSTRAINT `itemlist_user` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mnfr_item` FOREIGN KEY (`mnfrID`) REFERENCES manufacturers (`id`),
  ADD CONSTRAINT `model_item` FOREIGN KEY (`modelID`) REFERENCES models (`id`);

--
-- Constraints for table item_accounting
--
ALTER TABLE item_accounting
  ADD CONSTRAINT `itemlist_accounting` FOREIGN KEY (`aleAsset`) REFERENCES itemlist (`aleAsset`);

--
-- Constraints for table item_category
--
ALTER TABLE item_category
  ADD CONSTRAINT `fk_ic_aleAsset` FOREIGN KEY (`aleAsset`) REFERENCES itemlist (`aleAsset`),
  ADD CONSTRAINT `fk_ic_category` FOREIGN KEY (`category`) REFERENCES ale_category (`id`);

--
-- Constraints for table item_photos
--
ALTER TABLE item_photos
  ADD CONSTRAINT `asset_photo` FOREIGN KEY (`aleAsset`) REFERENCES itemlist (`aleAsset`);

--
-- Constraints for table leads
--
ALTER TABLE leads
  ADD CONSTRAINT `lead_state` FOREIGN KEY (`state`) REFERENCES us_states (`id`);

--
-- Constraints for table listing_category
--
ALTER TABLE listing_category
  ADD CONSTRAINT `lc_category` FOREIGN KEY (`categoryID`) REFERENCES ale_category (`id`),
  ADD CONSTRAINT `lc_listing` FOREIGN KEY (`listingID`) REFERENCES general_listings (`id`);

--
-- Constraints for table manufacturers
--
ALTER TABLE manufacturers
  ADD CONSTRAINT `mnfr_subitem` FOREIGN KEY (`subitem_of`) REFERENCES subitem_of (`id`);

--
-- Constraints for table mnfr_brand
--
ALTER TABLE mnfr_brand
  ADD CONSTRAINT `mnfr_brand_brand` FOREIGN KEY (`brandID`) REFERENCES brands (`id`),
  ADD CONSTRAINT `mnfr_brand_mnfr` FOREIGN KEY (`mnfrID`) REFERENCES manufacturers (`id`);

--
-- Constraints for table model_brand
--
ALTER TABLE model_brand
  ADD CONSTRAINT `model_brand_brand` FOREIGN KEY (`brandID`) REFERENCES brands (`id`),
  ADD CONSTRAINT `model_brand_model` FOREIGN KEY (`modelID`) REFERENCES models (`id`);

--
-- Constraints for table model_mnfr
--
ALTER TABLE model_mnfr
  ADD CONSTRAINT `model_mnfr_mnfr` FOREIGN KEY (`mnfrID`) REFERENCES manufacturers (`id`),
  ADD CONSTRAINT `model_mnfr_model` FOREIGN KEY (`modelID`) REFERENCES models (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `asset_to_status` FOREIGN KEY (`aleAsset`) REFERENCES itemlist (`aleAsset`),
  ADD CONSTRAINT `status_to_status` FOREIGN KEY (`status`) REFERENCES item_status (`id`);

--
-- Constraints for table support_tickets
--
ALTER TABLE support_tickets
  ADD CONSTRAINT `ticket_lead` FOREIGN KEY (`leadID`) REFERENCES leads (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
