-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Ağu 2020, 11:32:12
-- Sunucu sürümü: 5.7.29-0ubuntu0.18.04.1
-- PHP Sürümü: 7.0.33-29+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ng_otmkayteks`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otm_cari`
--

CREATE TABLE `otm_cari` (
  `ID` int(11) NOT NULL,
  `personel_ID` int(11) DEFAULT '0',
  `temsilciPersonel_ID` int(11) NOT NULL DEFAULT '0',
  `firma_ID` int(11) DEFAULT '0',
  `map_ID` int(11) DEFAULT NULL,
  `nesne_IDrehberGrup` int(11) DEFAULT '0',
  `nesne_IDcariTipi` int(11) DEFAULT '0',
  `nesne_IDmusteriTipi` int(11) DEFAULT '0',
  `nesne_IDtedarikciTipi` int(11) DEFAULT '0',
  `nesne_IDbanka` int(11) DEFAULT '0',
  `artanSayi` int(11) DEFAULT '0',
  `cinsiyet` int(11) DEFAULT '0',
  `arsiv` tinyint(1) DEFAULT '0',
  `durum` tinyint(1) DEFAULT '0',
  `tip` tinyint(1) DEFAULT '0',
  `tarih` datetime NOT NULL,
  `tarihArsiv` datetime DEFAULT NULL,
  `tarihDogum` datetime DEFAULT NULL,
  `kontak1Ad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontak1Mail` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontak1Tel` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontak2Ad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontak2Mail` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontak2Tel` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soyad` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faxNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eposta` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ozelkod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `araciKurum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temsilciPersonel` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vergiNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vergiDairesi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mersisNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `odemeSartlari` text COLLATE utf8_unicode_ci,
  `bankaBilgileri` text COLLATE utf8_unicode_ci,
  `adres` text COLLATE utf8_unicode_ci,
  `aciklama` text COLLATE utf8_unicode_ci,
  `markalar` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `otm_cari`
--
ALTER TABLE `otm_cari`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `otm_cari`
--
ALTER TABLE `otm_cari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
