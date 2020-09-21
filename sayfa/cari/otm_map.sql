-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 24 Tem 2020, 15:11:15
-- Sunucu sürümü: 5.7.29-0ubuntu0.18.04.1
-- PHP Sürümü: 7.0.33-29+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mysql`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otm_map`
--

CREATE TABLE `otm_map` (
  `ID` int(11) NOT NULL,
  `cari_ID` int(11) DEFAULT NULL,
  `place_id` varchar(555) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `map_lat` double DEFAULT NULL,
  `map_long` double DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `full_address` varchar(555) CHARACTER SET utf16 COLLATE utf16_turkish_ci NOT NULL,
  `country` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tarih` datetime DEFAULT NULL,
  `arsiv` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `otm_map`
--
ALTER TABLE `otm_map`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `otm_map`
--
ALTER TABLE `otm_map`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
