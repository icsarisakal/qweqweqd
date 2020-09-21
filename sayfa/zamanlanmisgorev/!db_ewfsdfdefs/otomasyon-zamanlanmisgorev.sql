-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2019 at 01:57 PM
-- Server version: 5.6.27-log
-- PHP Version: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `otomasyon`
--

-- --------------------------------------------------------

--
-- Table structure for table `otm_zamanlanmisgorev`
--

CREATE TABLE IF NOT EXISTS `otm_zamanlanmisgorev` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `personel_ID` int(11) DEFAULT '0',
  `arsiv` tinyint(1) DEFAULT '0',
  `durum` tinyint(1) DEFAULT '0',
  `oncelik` tinyint(1) DEFAULT '0',
  `parcaAdet` int(11) DEFAULT '0',
  `bitmisAdet` int(11) DEFAULT '0',
  `tarih` datetime NOT NULL,
  `tarihCalismaZamani` datetime DEFAULT NULL,
  `tarihDurum` datetime DEFAULT NULL,
  `tarihArsiv` datetime DEFAULT NULL,
  `tarihSonHareket` datetime DEFAULT NULL,
  `gorevTipi` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `parcaDizi` text COLLATE utf32_unicode_ci,
  `bitmisDizi` text COLLATE utf32_unicode_ci,
  `ortakIcerik` text COLLATE utf32_unicode_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `otm_zamanlanmisgorev`
--

INSERT INTO `otm_zamanlanmisgorev` (`ID`, `personel_ID`, `arsiv`, `durum`, `oncelik`, `parcaAdet`, `bitmisAdet`, `tarih`, `tarihCalismaZamani`, `tarihDurum`, `tarihArsiv`, `tarihSonHareket`, `gorevTipi`, `parcaDizi`, `bitmisDizi`, `ortakIcerik`) VALUES
(1, 0, 0, 0, 0, 2, 0, '2019-07-24 00:00:00', '2019-07-25 00:00:00', NULL, NULL, NULL, 'epostaGonder', '[{"eposta":"aaa@bbb.com","isim":"Aaa Bbb"},{"eposta":"ddd@eee.net","isim":"Ddd Eee"}]', NULL, '{"konu":"Herkese bu konu g\\u00f6nderilecek","icerik":"Merhaba say\\u0131n kullan\\u0131c\\u0131. Bu bir deneme mail g\\u00f6nderimidir."}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
