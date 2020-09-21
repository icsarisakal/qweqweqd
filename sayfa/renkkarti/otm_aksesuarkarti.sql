-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Tem 2020, 10:15:39
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kayteks`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otm_aksesuarkarti`
--

CREATE TABLE `otm_aksesuarkarti` (
  `ID` int(11) NOT NULL,
  `personel_ID` int(11) DEFAULT 0,
  `cari_ID` int(11) DEFAULT 0,
  `boyabaski_ID` int(11) DEFAULT 0,
  `musteri_ID` int(11) DEFAULT 0,
  `nesne_IDdoviz` int(11) DEFAULT 0,
  `nesne_IDbirimTipi` int(11) DEFAULT 0,
  `nesne_IDaksesuargruplari` int(11) DEFAULT 0,
  `arsiv` tinyint(4) DEFAULT 0,
  `tarih` datetime DEFAULT NULL,
  `tarihArsiv` datetime DEFAULT NULL,
  `tarihTalep` datetime DEFAULT NULL,
  `tarihOkey` datetime DEFAULT NULL,
  `aciklama` text DEFAULT NULL,
  `renkKodu` varchar(255) DEFAULT NULL,
  `varyant` varchar(255) DEFAULT NULL,
  `ozelKodu` varchar(255) DEFAULT NULL,
  `erisimKodu` varchar(255) DEFAULT NULL,
  `pantoneNo` varchar(255) DEFAULT NULL,
  `mamulKodu` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `fiyat` decimal(16,3) DEFAULT 0.000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `otm_aksesuarkarti`
--

INSERT INTO `otm_aksesuarkarti` (`ID`, `personel_ID`, `cari_ID`, `boyabaski_ID`, `musteri_ID`, `nesne_IDdoviz`, `nesne_IDbirimTipi`, `nesne_IDaksesuargruplari`, `arsiv`, `tarih`, `tarihArsiv`, `tarihTalep`, `tarihOkey`, `aciklama`, `renkKodu`, `varyant`, `ozelKodu`, `erisimKodu`, `pantoneNo`, `mamulKodu`, `img`, `fiyat`) VALUES
(1, 17, 3, 0, NULL, 76, 80, 224, 0, '2020-07-02 00:00:00', NULL, '2020-07-06 00:00:00', '2020-12-11 00:00:00', '                                                                                                                                    heyy                                                                                        ', 'deneme1', 'deneme4', 'deneme5', 'deneme6', 'deneme7', 'deneme8', '', '852.000'),
(2, 17, 4, 0, NULL, 75, 80, 225, 0, '2020-07-03 00:00:00', NULL, '2020-08-11 00:00:00', '2020-05-03 00:00:00', '                                    avukatim yapacak                        ', 'BEYAZ 3', '9966888', '22333', '4455', '66777', '88999', '', '0.250'),
(3, 17, 5, 0, 0, 74, 80, 224, 0, '2020-07-08 11:00:08', NULL, '2020-07-08 10:59:46', '2020-07-08 10:59:46', 'SELAMLAR', 'DENEME 4', NULL, NULL, NULL, NULL, NULL, '', '5.000');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `otm_aksesuarkarti`
--
ALTER TABLE `otm_aksesuarkarti`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `otm_aksesuarkarti`
--
ALTER TABLE `otm_aksesuarkarti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
