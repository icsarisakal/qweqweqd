-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Tem 2020, 10:15:34
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
-- Tablo için tablo yapısı `otm_renkkarti`
--

CREATE TABLE `otm_renkkarti` (
  `ID` int(11) NOT NULL,
  `personel_ID` int(11) DEFAULT 0,
  `cari_ID` int(11) DEFAULT 0,
  `boyabaski_ID` int(11) DEFAULT 0,
  `musteri_ID` int(11) DEFAULT 0,
  `nesne_IDdoviz` int(11) DEFAULT 0,
  `nesne_IDbirimTipi` int(11) DEFAULT 0,
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
-- Tablo döküm verisi `otm_renkkarti`
--

INSERT INTO `otm_renkkarti` (`ID`, `personel_ID`, `cari_ID`, `boyabaski_ID`, `musteri_ID`, `nesne_IDdoviz`, `nesne_IDbirimTipi`, `arsiv`, `tarih`, `tarihArsiv`, `tarihTalep`, `tarihOkey`, `aciklama`, `renkKodu`, `varyant`, `ozelKodu`, `erisimKodu`, `pantoneNo`, `mamulKodu`, `img`, `fiyat`) VALUES
(1, 17, 4, 0, 0, 76, 80, 0, '2020-07-02 00:00:00', NULL, '2020-07-06 00:00:00', '2020-12-11 00:00:00', '                        nbr                                                                                                      ', 'deneme1', 'deneme4', 'deneme5', 'deneme6', 'deneme7', 'deneme8', '', '852.000'),
(2, 17, 5, 5, 8, 74, 0, 0, '2020-05-03 00:00:00', NULL, '2020-08-11 00:00:00', '2020-05-03 00:00:00', '                        Burası bir açıklamadır                                   ', 'RENK 85', '9966888', '22333', '4455', '66777', '88999', '', '0.250'),
(3, 18, 4, 24, 1, 76, 80, 0, '2020-07-03 00:00:00', NULL, '2026-06-03 00:00:00', '2020-07-03 00:00:00', '                        avukatim yapacak                                                                                                                           ', 'B261377-52', '113-Olive', '', '', '', '', '', '1.300'),
(4, 17, 3, 23, 8, 74, 81, 0, '2020-07-03 14:32:58', NULL, '2020-07-03 14:31:29', '2020-07-03 14:31:29', 'denemeler11', '9696', '99666', '', '', '', '', '', '0.100');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `otm_renkkarti`
--
ALTER TABLE `otm_renkkarti`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `otm_renkkarti`
--
ALTER TABLE `otm_renkkarti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
